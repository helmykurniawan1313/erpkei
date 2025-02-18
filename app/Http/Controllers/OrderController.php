<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Profile;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use PDF;
use Illuminate\Support\Facades\View;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Division;

use Carbon\Carbon;


class OrderController extends Controller
{
    protected $division_name;
    protected $division;
    protected $user;
    protected $profile;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->division_name = auth()->user()->division->division_name;
            $this->division = auth()->user()->division_id;
            $this->user = auth()->user()->name;
            $this->profile = Profile::get();

            // Share variables with all views
            View::share('division_name', $this->division_name);
            View::share('division', $this->division);
            View::share('user', $this->user);
            View::share('profile', $this->profile);

            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getDivision = auth()->user()->division_id;

        $orders = Order::with(['customer', 'company', 'orderDetails.product'])
            ->whereHas('customer', function ($query) use ($getDivision) {
                $query->where('division_id', $getDivision);
            })
            ->get();

        return view('dashboard.orders.index', [
            'orders' => $orders,
            'departments' => Department::get(),
            'page_title' => 'Sales Order ' . $this->division_name,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create()
    {
        // Get the division ID of the authenticated user
        $getDivision = auth()->user()->division_id;

        // Get customers that belong to the user's division
        $customers = Customer::where('division_id', $getDivision)->get();

        $products = Product::all();
        $divisions = Division::all();
        return view('dashboard.orders.create', [
            'customers' => $customers,
            'products' => $products,
            'divisiondatas' => $divisions,
            'page_title' => 'Tambah Sales Order',
            'companies' => Company::all()
        ]);
    }


    public function store(Request $request)
    {
        $request['order_date'] = Carbon::createFromFormat('m/d/Y', $request->order_date)->format('Y-m-d');
        $inputMethod = $request->has('input_method_checkbox') ? 'product_details' : 'total_amount';

        if (is_null($request['total_amount'])) {
            $request['total_amount'] = $request['total_amount_display'];
            $request['total_amount'] = str_replace(['Rp', 'RP', 'rp', 'Rp ', 'RP ', 'rp '], '', $request['total_amount']);
            $request['total_amount'] = str_replace(['.00', ',00', '.'], '', $request['total_amount']);
            $request['total_amount'] = trim($request['total_amount']);
        }

        if ($inputMethod === 'product_details') {
            $request->validate([
                'order_date' => 'max:255',
                'customer_id' => 'max:255',
                'company_id' => 'max:255',
                'so_number' => 'string|max:255',
                'total_amount' => 'numeric|nullable',
                'products' => 'array',
                'products.*.product_id' => 'max:255',
                'products.*.quantity' => 'max:255|integer',
            ]);

            if (empty($request->products)) {
                return response()->json(['error' => 'Tambahkan Produk Minimal Satu.'], 400);
            }

            // Remaining code will not be executed if products is empty

        } else {
            $request['total_amount'] = str_replace(['Rp', 'RP', 'rp', 'Rp ', 'RP ', 'rp '], '', $request['total_amount']);
            $request['total_amount'] = str_replace(['.00', ',', '.00'], '', $request['total_amount']);
            $request['total_amount'] = trim($request['total_amount']);

            $request->validate([
                'order_date' => 'max:255',
                'customer_id' => 'max:255',
                'company_id' => 'max:255',
                'so_number' => 'string|max:255',
                'total_amount' => 'numeric|required'
            ]);

            $request->request->remove('products');
        }

        $order = Order::create([
            'order_date' => $request->order_date,
            'customer_id' => $request->customer_id,
            'company_id' => $request->company_id,
            'so_number' => $request->so_number,
            'total_amount' => $request->total_amount,
        ]);

        if ($inputMethod === 'product_details') {

            foreach ($request->products as $productData) {
                $unitPrice = str_replace(',', '', $productData['unit_price']);

                $order->orderDetails()->create([
                    'product_id' => $productData['product_id'],
                    'quantity' => $productData['quantity'],
                    'unit_price' => $unitPrice,
                    'total_price' => $productData['quantity'] * $unitPrice,
                ]);

                $product = Product::find($productData['product_id']);
                $product->stock -= $productData['quantity'];
                $product->save();
            }
        }

        return redirect('/dashboard/orders')->with('success', 'Order Berhasil Dibuat');
    }


    public function edit($id)
    {
        // Fetch the order with its details, customer, company, and products from order details
        $order = Order::with(['customer', 'company', 'orderDetails.product'])->findOrFail($id);

        // Check if there are any order details with products
        $hasOrderDetails = $order->orderDetails->where('product', '!=', null)->isNotEmpty();
        if ($hasOrderDetails == true) {
            $hasOrderDetails = 'checked';
        } else {
            $hasOrderDetails = '';
        }


        // Fetch all customers, products, and companies for dropdowns
        $customers = Customer::all();
        $products = Product::all();
        $companies = Company::all();

        return view('dashboard.orders.edit', [
            'order' => $order,
            'customers' => $customers,
            'products' => $products,
            'companies' => $companies,
            'page_title' => 'Edit Sales Order',
            'hasOrderDetails' => $hasOrderDetails,
        ]);
    }


    public function update(Request $request, $id)
    {
        // Fetch the order
        $order = Order::findOrFail($id);

        // Convert and validate order date
        $request['order_date'] = Carbon::createFromFormat('m/d/Y', $request->order_date)->format('Y-m-d');

        // Determine input method
        $inputMethod = $request->has('input_method_checkbox') ? 'product_details' : 'total_amount';

        // Format and validate total amount
        // if (is_null($request['total_amount'])) {
        //     $request['total_amount'] = $request['total_amount_display'];
        // }
        // $request['total_amount'] = $this->formatPrice($request['total_amount']);

        // Validate request based on input method
        $validationRules = [
            'order_date' => 'required|date',
            'customer_id' => 'required|exists:customers,id',
            'company_id' => 'required|exists:companies,id',
            'so_number' => 'required|string|max:255|unique:orders,so_number,' . $order->id,
        ];
        if ($inputMethod === 'product_details') {

            $request['total_amount'] = str_replace(['Rp', 'RP', 'rp', 'Rp ', 'RP ', 'rp '], '', $request['total_amount']);
            $request['total_amount'] = str_replace([',00', '.'], '', $request['total_amount']);
            $request['total_amount'] = trim($request['total_amount']);
            $request['total_amount'] = $request['total_amount_display'];
            $validationRules['products'] = 'required|array';
            $validationRules['products.*.product_id'] = 'required|exists:products,id';
            $validationRules['products.*.quantity'] = 'required|integer|min:1';
        } else {

            $request['total_amount'] = str_replace(['Rp', 'RP', 'rp', 'Rp ', 'RP ', 'rp '], '', $request['total_amount']);
            $request['total_amount'] = str_replace([',00', '.'], '', $request['total_amount']);
            $request['total_amount'] = trim($request['total_amount']);
            $validationRules['total_amount'] = 'required|numeric|min:0';
        }

        $request->validate($validationRules);

        // Update order within a transaction
        DB::transaction(function () use ($request, $order, $inputMethod) {
            // Update order details


            $order->update([
                'order_date' => $request->order_date,
                'customer_id' => $request->customer_id,
                'company_id' => $request->company_id,
                'so_number' => $request->so_number,
                'total_amount' => $request->total_amount,
            ]);

            // Delete existing order details
            $order->orderDetails()->delete();

            // Add new order details if input method is 'product_details'
            if ($inputMethod === 'product_details') {
                foreach ($request->products as $productData) {
                    // Remove commas from unit_price
                    $unit_price = str_replace(',', '', $productData['unit_price']);
                    $order->orderDetails()->create([
                        'product_id' => $productData['product_id'],
                        'quantity' => $productData['quantity'],
                        'unit_price' => $unit_price,
                        'total_price' => $productData['quantity'] * $unit_price,
                    ]);

                    // Update product stock (optional)
                    $product = Product::find($productData['product_id']);
                    $product->stock -= $productData['quantity'];
                    $product->save();
                }
            }
        });

        return redirect('/dashboard/orders')->with('success', 'Order Berhasil Diupdate');
    }



    public function getProductPrice($id)
    {
        $product = Product::find($id);
        return response()->json(['unit_price' => $product->unit_price]);
    }

    public function checkSoNumber(Request $request)
    {
        $so_number = $request->so_number;
        $exists = Order::where('so_number', $so_number)->exists();

        return response()->json(['success' => !$exists]);
    }

    public function addProduct(Request $request)
    {
        $request['unit_price'] = str_replace(['Rp', 'RP', 'rp', 'Rp ', 'RP ', 'rp '], '', $request['unit_price']);
        $request['unit_price'] = str_replace(['.', ',00'], '', $request['unit_price']);
        $request['unit_price'] = trim($request['unit_price']);

        $request->validate([
            'name' => 'required|string|max:255',
            'product_code' => 'string',
            'description' => 'nullable|string',
            'stock' => 'required|integer',
            'unit_price' => 'required|numeric',
        ]);

        $product = Product::create([
            'name' => $request->name,
            'product_code' => $request->product_code,
            'description' => $request->description,
            'stock' => $request->stock,
            'unit_price' => $request->unit_price,
        ]);

        return response()->json(['success' => true, 'message' => ' Produk Baru Berhasil Ditambahkan']);
    }

    public function checkProductCode(Request $request)
    {
        $validatedData = $request->validate([
            'product_code' => 'required|string|max:255',
        ]);

        $exists = Product::where('product_code', $validatedData['product_code'])->exists();

        return response()->json(['success' => !$exists]);
    }


    public function getProducts()
    {
        $products = Product::all();
        return response()->json(['products' => $products]);
    }
}
