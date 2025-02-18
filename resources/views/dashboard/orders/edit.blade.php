@extends('dashboard.layouts.mains')

@section('container')


<style>
    .styled-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 10px; /* Space between cells */
    }

    .styled-table th, .styled-table td {
        padding: 10px; /* Padding inside cells */
        border: 0px solid #ddd;
    }
</style>
{{-- start product row --}}
<script src="https://unpkg.com/feather-icons"></script>
<script>
function addProductRow() {
    const productTable = document.getElementById('productTable');
    const rowCount = productTable.rows.length - 1; // Adjust for the total row
    const row = productTable.insertRow(rowCount);

    const cell1 = row.insertCell(0);
    const cell2 = row.insertCell(1);
    const cell3 = row.insertCell(2);
    const cell4 = row.insertCell(3);
    const cell5 = row.insertCell(4);

    const selectElementId = `selectProduct${rowCount}`;

    cell1.innerHTML = `<select id="${selectElementId}" name="products[${rowCount}][product_id]" class="form-control select2 products-select" onchange="fetchUnitPrice(this, ${rowCount})">
        <option value="">Pilih Produk</option>
        @foreach ($products as $product)
            <option value="{{ $product->id }}">{{ $product->name }}</option>
        @endforeach
    </select>`;

    $(`#${selectElementId}`).select2();


    
        cell2.innerHTML = `<input type="number" class="form-control" name="products[${rowCount}][quantity]" min="1" required onchange="calculateTotalPrice(${rowCount});">`;
    
        cell3.innerHTML = `<input type="text" class="form-control" name="products[${rowCount}][unit_price]" step="0.01" required onchange="formatPrice(this); calculateTotalPrice(${rowCount});">`;
    
        cell4.innerHTML = `<input type="text" class="form-control" name="products[${rowCount}][total_price]" step="0.01" readonly>`;
    
        cell5.innerHTML = `<button type="button" class="btn btn-danger" onclick="deleteProductRow(this)"><span><i class="fi-trash"></i></span> Hapus</button>`;
    }
    
    function deleteProductRow(button) {
        const row = button.parentNode.parentNode;
        row.parentNode.removeChild(row);
        calculateTotalAmount(); // Update the total amount after deleting a row
    }
    
    function fetchUnitPrice(selectElement, rowIndex) {
        const productId = selectElement.value;
        fetch(`/get-product-price/${productId}`)
            .then(response => response.json())
            .then(data => {
                const unitPriceInput = document.getElementsByName(`products[${rowIndex}][unit_price]`)[0];
                unitPriceInput.value = formatPriceValue(data.unit_price);
                calculateTotalPrice(rowIndex); // Recalculate total price
            });
    }
    
    function calculateTotalAmount() {
        let totalAmount = 0;
        const totalPrices = document.querySelectorAll('input[name$="[total_price]"]'); // Select all total_price inputs
        totalPrices.forEach(input => {
            totalAmount += parseFloat(input.value.replace(/,/g, '')) || 0;
        });
    
        document.getElementById('totalAmount').value = totalAmount.toFixed(2);
        document.getElementById('totalAmountDisplay').innerText = formatCurrency(totalAmount);
    }
    
    function formatCurrency(amount) {
        return `Rp. ${amount.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}`;
    }
    
    function formatPrice(input) {
        var value = input.value.replace(/,/g, ''); // Remove existing commas
        if (!isNaN(value) && value !== '') {
            input.value = parseFloat(value).toLocaleString('en');
        }
    }
    
    function formatPriceValue(value) {
        value = value.toString().replace(/,/g, ''); // Remove existing commas
        if (!isNaN(value) && value !== '') {
            return parseFloat(value).toLocaleString('en');
        }
        return value;
    }
    
    // Example usage within your existing calculateTotalPrice function
    function calculateTotalPrice(rowIndex) {
        const quantity = document.getElementsByName(`products[${rowIndex}][quantity]`)[0].value;
        const unitPrice = document.getElementsByName(`products[${rowIndex}][unit_price]`)[0].value.replace(/,/g, '');
        const totalPrice = quantity * unitPrice;
        document.getElementsByName(`products[${rowIndex}][total_price]`)[0].value = formatPriceValue(totalPrice.toFixed(2));
        calculateTotalAmount(); // Update the total amount
    }
  </script>
    
  

   <!-- Your select element -->


<!-- Your select element outside the modal -->


<!-- Your modal form -->
<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productModalLabel">Input Product Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="productForm" method="post" data-parsley-validate>
                    @csrf
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label for="modalProductName" class="col-form-label">Nama Produk<span class="text-danger"> *</span></label>
                        <input type="text" class="form-control" id="modalProductName" name="name" required data-parsley-trigger="change">
                    </div>
                    <div class="form-group">
                        <label for="modalProductDescription" class="col-form-label">Deskripsi<span class="text-danger"> *</span></label>
                        <textarea class="form-control" id="modalProductDescription" name="description" required data-parsley-trigger="change"></textarea>
                    </div>
                    <div class="form-group row">
                        <div class="col-6">
                            <label for="modalProductCode" class="col-form-label">Kode Produk<span class="text-danger"> *</span></label>
                            <input type="text" class="form-control" id="modalProductCode" name="product_code" required data-parsley-trigger="change">
                            <div id="productCodeError" class="invalid-feedback"></div>
                        </div>
                        <div class="col-6">
                            <label for="modalProductQuantity" class="col-form-label">Stok<span class="text-danger"> *</span></label>
                            <input type="number" class="form-control" id="modalProductQuantity" name="stock" required data-parsley-trigger="change">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="modalProductPrice" class="col-form-label">Harga Per Unit<span class="text-danger"> *</span></label>
                        <input type="text" class="form-control" id="modalProductPrice" name="unit_price" required data-parsley-trigger="change">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" onclick="addProduct()">Tambah Produk</button>
            </div>
        </div>
    </div>
</div>


<!-- Include jQuery, Parsley.js, and autoNumeric -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/autonumeric@4.6.0/dist/autoNumeric.min.js"></script>

<script>
 $(document).ready(function() {
    // Initialize Parsley when the modal is shown
    $('#productModal').on('shown.bs.modal', function () {
        $('#productForm').parsley();
    });

    // Reset Parsley and form when the modal is hidden
    $('#productModal').on('hidden.bs.modal', function () {
        $('#productForm')[0].reset();
        $('#productForm').parsley().reset();
        AutoNumeric.getAutoNumericElement('#modalProductPrice').clear();
        $('#modalProductCode').removeClass('is-invalid');
        $('#productCodeError').text('');
    });

    // Initialize autoNumeric on the unit_price input field
    new AutoNumeric('#modalProductPrice', {
        currencySymbol: 'Rp. ',
        decimalCharacter: ',',
        digitGroupSeparator: '.',
        decimalPlaces: 2,
        modifyValueOnWheel: false
    });

    // Check product code on change
    $('#modalProductCode').on('input', function() {
        checkProductCode();
        $(this).removeClass('is-invalid');
        $('#productCodeError').text('');
    });
});

function addProduct() {
    const form = $('#productForm');

    if (form.parsley().validate() && !$('#modalProductCode').hasClass('is-invalid')) {
        const formData = new FormData(form[0]);

        $.ajax({
            url: '{{ route("add.product") }}',
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                console.log('Server response:', response); // Log the response for debugging
                if (response.success) {
                    $('#productModal').modal('hide');
                    showAlert(response.message, 'success');
                    updateSelectBox(response.product);
                } else {
                    showAlert('Error adding product.', 'danger');
                }
            },
            error: function(xhr) {
                if (xhr.status === 422) {
                    const errors = xhr.responseJSON.errors;
                    let errorMessages = '';
                    for (const key in errors) {
                        if (errors.hasOwnProperty(key)) {
                            errorMessages += `${errors[key][0]}<br>`;
                        }
                    }
                    showAlert(errorMessages, 'danger');
                } else {
                    showAlert(`An error occurred: ${xhr.responseText}`, 'danger');
                }
            }
        });
    } else {
        console.log('Form is invalid or product code already taken.');
        showAlert('Please correct the errors before submitting.', 'danger');
    }
}
$(document).ready(function() {
    // Call the refreshOptions function when the page loads
    refreshOptions();
});

// Check product code on change
$('#modalProductCode').on('input', function() {
    checkProductCode();
    $(this).removeClass('is-invalid');
    $('#productCodeError').text('');
});

function checkProductCode() {
    const productCode = $('#modalProductCode').val();
    console.log('Checking product code:', productCode); // Log the product code being checked

    $.ajax({
        url: '{{ route("check.product.code") }}',
        method: 'POST',
        data: {
            product_code: productCode,
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            console.log('Check product code response:', response); // Log the response for debugging
            if (!response.success) {
                $('#modalProductCode').addClass('is-invalid');
                $('#productCodeError').text('The product code has already been taken.');
            } else {
                $('#modalProductCode').removeClass('is-invalid');
                $('#productCodeError').text('');
            }
        },
        error: function(xhr) {
            console.error('Error:', xhr); // Log the error for debugging
            showAlert('An error occurred while checking the product code.', 'danger');
        }
    });
}

function refreshOptions() {
    $.ajax({
        url: '{{ route("get.products") }}', // Adjust the route to your actual route for fetching products
        method: 'GET',
        success: function(response) {
            // Select all elements with the class 'products-select' to update
            const selectBoxes = document.querySelectorAll('.products-select');
            selectBoxes.forEach(selectBox => {
                const currentSelection = selectBox.value; // Preserve current selection
                selectBox.innerHTML = '<option value="">Pilih Produk</option>'; // Clear current options
                response.products.forEach(product => {
                    const newOption = new Option(product.name, product.id, false, false);
                    selectBox.add(newOption);
                });
                if (currentSelection) {
                    selectBox.value = currentSelection; // Restore previous selection
                }
                $(selectBox).trigger('change'); // Re-initialize select2
            });
        },
        error: function(xhr) {
            console.error('Error: ', xhr);
            showAlert('An error occurred while fetching products.', 'danger');
        }
    });
}


function showAlert(message, type) {
    const alertContainer = document.getElementById('alertContainer');
    const alert = document.createElement('div');
    alert.className = `alert alert-${type} alert-dismissible fade show`;
    alert.role = 'alert';
    alert.innerHTML = `
        ${message}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    `;
    alertContainer.appendChild(alert);

    // Automatically remove the alert after 5 seconds
    setTimeout(() => {
        $(alert).alert('close');
    }, 5000);
}

function updateSelectBox(product) {
    console.log('Updating select box with product:', product); // Log the product data for debugging
    // Update the specific select box outside the modal
    const selectBox = document.getElementById('selectProduct0');
    const newOption = new Option(product.name, product.id, false, false);
    selectBox.add(newOption);
}

function checkProductCode() {
    const productCode = $('#modalProductCode').val();

    $.ajax({
        url: '{{ route("check.product.code") }}',
        method: 'POST',
        data: {
            product_code: productCode,
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            if (!response.success) {
                $('#modalProductCode').addClass('is-invalid');
                $('#productCodeError').text('The product code has already been taken.');
            } else {
                $('#modalProductCode').removeClass('is-invalid');
                $('#productCodeError').text('');
            }
        },
        error: function(xhr) {
            console.error('Error: ', xhr);
            showAlert('An error occurred while checking the product code.', 'danger');
        }
    });
}



</script>

    


<!-- Include Switchery CSS -->
<link rel="stylesheet" href="/dashboard/plugins/switchery/switchery.min.css">

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">BUAT SALES ORDER</h4>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div id="alertContainer"></div>

            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                      
                        <form method="POST" action="/dashboard/orders/{{ $order->id }}" id="orderForm" class="mb-5" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                                @csrf
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="title" class="col-form-label">Tanggal<span class="text-danger"> *</span></label>
                                    <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker" name="order_date" required value="{{ old('order_date', date("m/d/Y", strtotime($order->order_date))) }}">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="customer" class="col-form-label"> Customer<span class="text-danger"> *</span></label>
                                    <select required class="form-control select" name="customer_id" required>
                                        <option value="">Pilih Customer</option>
                                        @foreach ($customers as $customer)
                                            <option 
                                                value="{{ $customer->id }}" 
                                                {{ old('customer_id', $order->customer_id) == $customer->id ? 'selected' : '' }}
                                            >
                                                {{ $customer->name }}
                                            </option>
                                        @endforeach 
                                    </select>
                                </div>
                                
                                <div class="form-group col-md-3">
                                    <label for="company" class="col-form-label"> Perusahaan<span class="text-danger"> *</span></label>
                                    <select required class="form-control select" name="company_id" required>
                                        <option value="">Pilih Perusahaan</option>
                                        @foreach ($companies as $company)
                                            <option 
                                                value="{{ $company->id }}" 
                                                {{ old('company_id', $order->company_id) == $company->id ? 'selected' : '' }}
                                            >
                                                {{ $company->company_name }}
                                            </option>
                                        @endforeach 
                                    </select>
                                </div>
                                
                                <div class="form-group col-md-3">
                                    <label for="so_number" class="col-form-label">Nomor Sales Order<span class="text-danger"> </span></label>
                                    <input type="text" class="form-control" id="so_number" name="so_number" required autofocus placeholder="Masukkan Nomor Sales Order" value="{{ old('so_number', $order->so_number) }}" disabled>
                                    <span id="soNumberCheck"></span>
                                    <input type="hidden" name="so_number" value="{{ old('so_number', $order->so_number) }}">
                                </div>
                                
            
                                <div class="form-group col-md-4">
                                    <label>Pilih Metode Input</label><br>
                                    <input type="checkbox" id="input_method_checkbox" name="input_method_checkbox" value="1" data-plugin="switchery" data-color="#039cfd" onclick="toggleInputFields()" {{ $hasOrderDetails }}> Menyertakan Detail Produk
                                </div>
                                
                            </div>
                           
                            <!-- Total Amount Input Box -->
                            <div id="total_amount_div">
                                <label for="total_amount">Total Amount</label>
                                <input type="text" name="total_amount" id="total_amount" class="form-control autonumber" data-a-sign="Rp. " data-a-sep="." data-a-dec=","  required value="{{ old('total_amount', $order->total_amount) }}"> 
                            </div>
                           
                            <!-- Product Details Table -->
                            <div id="product_details_div" style="display: none;">
                                <button type="button" class="btn-sm btn-primary waves-effect waves-light" data-toggle="modal" data-target="#productModal"><span style="margin-right: 10px;"><i class="fa fa-plus"></i></span> Tambah Produk</button>
                                <button type="button" class="btn btn-secondary" onclick="refreshOptions()"><span style="margin-right: 10px;"><i class="fa  fa-refresh"></i></span>Refresh</button>

                                <button type="button" class="btn btn-icon" role="button" data-toggle="popover" data-trigger="focus" title="" data-content="Jika produk tidak ada di pilihan, klik tombol tambah produk untuk menambahkan produk" data-original-title="Tambah Produk">
                                  
                                    <span><i class="fa fa-question-circle-o"></i></span>
                                </button>

                                
                                <style>
                          
                                    .btn-icon {
                                        border: none;
                                        background: none;
                                        padding: 0;
                                        margin: 0;
                                        outline: none;
                                        margin-left: 20px; /* Adjust this value as needed */
                                        margin-top: 0px;
                                        font-size: 24px; /* Adjust this value to change the button size */
                                    }


                                    </style>

                                </style>
                                
                                
                                <table id="productTable" class="styled-table">
                                    <thead>
                                        <tr>
                                            <th style="width: 40%;">Nama Produk</th>
                                            <th style="width: 10%;">Kuaniti</th>
                                            <th style="width: 15%;">Harga Unit</th>
                                            <th style="width: 30%;">Total Harga</th>
                                            <th style="width: 5%;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order->orderDetails as $index => $orderDetail)
                                        <tr>
                                            <td>
                                                <select id="selectProduct{{ $index }}" name="products[{{ $index }}][product_id]" class="form-control select2 products-select" onchange="fetchUnitPrice(this, {{ $index }})">
                                                    <option value="">Pilih Produk</option>
                                                    @foreach ($products as $product)
                                                    <option value="{{ $product->id }}" @if($product->id == $orderDetail->product_id) selected @endif>{{ $product->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td><input type="number" class="form-control" name="products[{{ $index }}][quantity]" value="{{ $orderDetail->quantity }}" min="1" onchange="calculateTotalPrice({{ $index }})" required></td>
                                            <td><input type="text" class="form-control" name="products[{{ $index }}][unit_price]" value="{{ number_format($orderDetail->unit_price, 2) }}" step="0.01" onchange="calculateTotalPrice({{ $index }}); formatPrice(this)" required></td>                                            
                                            <td><input type="text" class="form-control" name="products[{{ $index }}][total_price]" value="{{ number_format($orderDetail->total_price, 2) }}" step="0.01" readonly></td>                                            
                                            <td><button type="button" class="btn btn-danger" onclick="deleteProductRow(this)"> <span><i class="fi-trash"></i></span> Hapus</button></td>
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="3" style="text-align: right;"><strong>Total Amount </strong></td>
                                            <td>
                                                <h4><span id="totalAmountDisplay">Rp. {{ number_format($order->total_amount, 2, ',', '.') }}</span></h4>
                                                <input type="number" id="totalAmount" name="total_amount_display" class="form-control" step="0.01" readonly style="display:none;">
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <button type="button" class="btn-sm btn-primary waves-effect waves-light" onclick="addProductRow()"><span style="margin-right: 10px;"><i class="fa fa-plus-square-o"></i></span> Tambah Baris</button>
                               
                            </div>
                           <br></br>


                           <button type="submit" class="btn btn-block btn-primary waves-effect waves-light">
                            Buat Data Sales Order
                            <span style="margin-left: 10px;">
                                <i class="fa fa-paper-plane"></i>                            </span>
                                
                        </button>
                        
                        </form>
                    </div>
                </div>
            </div>
            
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
           
            

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    toggleInputFields();
                
                    document.getElementById('input_method_checkbox').addEventListener('change', function() {
                        toggleInputFields();
                    });
                
                    function toggleInputFields() {
                        var checkbox = document.getElementById('input_method_checkbox');
                        var totalAmountInput = document.getElementById('total_amount');
                        
                        if (checkbox.checked) {
                            totalAmountInput.removeAttribute('required');
                        } else {
                            totalAmountInput.setAttribute('required', 'required');
                        }
                    }
                });
                
            
        
            
            </script>
            
            
            <script>
 
         
            

                function toggleInputFields() {
                    var totalAmountDiv = document.getElementById('total_amount_div');
                    var productDetailsDiv = document.getElementById('product_details_div');
                    var inputMethodCheckbox = document.getElementById('input_method_checkbox');
            
                    if (inputMethodCheckbox.checked) {
                        productDetailsDiv.style.display = 'block';
                        totalAmountDiv.style.display = 'none';
                    } else {
                        productDetailsDiv.style.display = 'none';
                        totalAmountDiv.style.display = 'block';
                    }
                }
                function validateForm() {
                    var inputMethodCheckbox = document.getElementById('input_method_checkbox');
                    var totalAmount = document.getElementById('total_amount').value;
                    var productRows = document.querySelectorAll('#productTable tbody tr');
            
                    if (inputMethodCheckbox.checked && productRows.length === 0) {
                        alert('Please add at least one product.');
                        return false;
                    }
            
                    if (!inputMethodCheckbox.checked && !totalAmount) {
                        alert('Please enter the total amount.');
                        return false;
                    }
            
                    return true;
                }
            

                document.addEventListener('DOMContentLoaded', function() {
                    var elems = Array.prototype.slice.call(document.querySelectorAll('[data-plugin="switchery"]'));
                    elems.forEach(function(html) {
                        if (!html.classList.contains('switchery')) {
                            new Switchery(html);
                        }
                    });
            
                    toggleInputFields();
                    document.getElementById('input_method_checkbox').onchange = function() {
                        toggleInputFields();
                    };
                });
            </script>



            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            
            <script>
                $('#so_number').on('blur', function() {
                    var so_number = $(this).val();
                    if (so_number.length > 0) {
                        $.ajax({
                            url: '{{ route("check.so_number") }}',
                            method: 'POST',
                            data: { so_number: so_number, _token: '{{ csrf_token() }}' },
                            success: function(response) {
                                if (!response.success) {
                                    $('#soNumberCheck').html('<i class="fa fa-times-circle" aria-hidden="true"></i> SO Number is already taken').css('color', 'red');
                                } else {
                                    $('#soNumberCheck').text('SO Number is available').css('color', 'green');
                                }
                            }
                        });
                    } else {
                        $('#soNumberCheck').text('');
                    }
                });
            
            </script>
            
@endsection
