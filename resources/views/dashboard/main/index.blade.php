@extends('dashboard.layouts.mains')

@section('container')
@switch($division) 
@case('1')
@case('2')
<link href="/dashboard/plugins/billboard/billboard.css" rel="stylesheet" />
<!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title float-left">Dashboard {{ $user }}</h4>

                                

                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row">
                            <div class="col-xl-12 col-sm-12">
                                <div class="card-box">
                                   
                                    
                                        <p class="m-0 text-uppercase font-bold font-secondary text-center" title="Statistics">Total Uang Saat Ini</p>
                                    
                                        <h1 class="font-600 text-center">Rp. <span data-plugin="counterup"> {{ number_format($totalsum) }}</span></h1>
                                        <p class="m-0 text-center">{{ $transaction_count }} total transaksi</p>
                                </div>
                            </div><!-- end col -->
                        </div>

                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card-box">
                                    <div class="card" >
                                        <div class="card-header">
                                            <p class="m-0 text-uppercase font-bold font-secondary text-center" title="Statistics">Ringkasan Cash Flow</p>
                                        </div>
                                        <ul class="list-group list-group-flush">
                                          <li class="list-group-item">
                                            <div class="d-flex justify-content-between">
                                                <h5 class="m-0 text  font-bold font-secondary text-left" >Pengeluaran  <small class="text-muted"></small></h5>
                                                
                                                <h5 class="m-0 text-danger font-bold  text-right ">- Rp. <span data-plugin="counterup">{{ number_format($sumexpanse) }}</span> </h5>
                                                </div>
                                                
                                          </li>
                                          <li class="list-group-item">   
                                            <div class="d-flex justify-content-between">
                                            <h5 class="m-0 text  font-bold font-secondary text-left" >Pemasukan  <small class="text-muted"></small></h5>
                    
                                            <h5 class="m-0 text-success font-bold  text-right ">Rp. <span data-plugin="counterup">{{ number_format($sumincome) }}</span> </h5>
                                            </div>
                                            </li>
                                          <li class="list-group-item"> <div class="d-flex justify-content-between">
                                            <h5 class="m-0 text  font-bold font-secondary text-left" > Total  <small class="text-muted"></small></h5>
                    
                                            <h5 class="m-0 text-secondary font-bold  text-right ">Rp.<span data-plugin="counterup">{{ number_format($totalinex) }}</span> </h5>
                                            </div></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card-box">
                                    <div class="card" >
                                        <div class="card-header">
                                            <p class="m-0 text-uppercase font-bold font-secondary text-center" title="Statistics">Ringkasan Hutang Karyawan</p>
                                        </div>
                                        <ul class="list-group list-group-flush">
                                          <li class="list-group-item">
                                            <div class="d-flex justify-content-between">
                                                <h5 class="m-0 text  font-bold font-secondary text-left" >Total Hutang Karyawan  <small class="text-muted"></small></h5>
                                                
                                                <h5 class="m-0 text-danger font-bold  text-right ">- Rp. <span data-plugin="counterup">{{ number_format($sumdebt) }}</span> </h5>
                                                </div>
                                                
                                          </li>
                                          <li class="list-group-item">   
                                            <div class="d-flex justify-content-between">
                                            <h5 class="m-0 text  font-bold font-secondary text-left" >Total Hutang Terbayar  <small class="text-muted"></small></h5>
                    
                                            <h5 class="m-0 text-success font-bold  text-right ">Rp. <span data-plugin="counterup">{{ number_format($sumpaydebt) }}</span> </h5>
                                            </div>
                                            </li>
                                          <li class="list-group-item"> <div class="d-flex justify-content-between">
                                            <h5 class="m-0 text  font-bold font-secondary text-left" > Total   <small class="text-muted">(Terbayar {{ $debtpersentage }} %)</small></h5>
                    
                                            <h5 class="m-0 text-secondary font-bold  text-right "> Rp. -<span data-plugin="counterup">{{ number_format($totaldebt) }}</span> </h5>
                                            </div></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                      
                            
                        </div>
                        <div class = "row">
                            <div class="col-12">                           
                                <div class="card-box">
                                    <div class="card" >                                        
                                        <div class="card-header">
                                            <p class="m-0 text-uppercase font-bold font-secondary text-center" title="Statistics">Grafik Cash Flow</p>
                                        </div>                                
                                        <div id="areaChart"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-6">                           
                                <div class="card-box">
                                    <div class="card" >                                        
                                        <div class="card-header">
                                            <p class="m-0 text-uppercase font-bold font-secondary text-center" title="Statistics">Pemasukan</p>
                                        </div>                                
                                        <div id="padAngle"></div>
                                        
                                        <div class="card-box">
                                            <h4 class="m-t-0 header-title"><b>Pemasukan Berdasarkan Kategori</b></h4>
                                            <p class="text-muted font-14 m-b-20">
                                               
                                            </p>
        
                                            <div class="table-responsive">
                                                <table class="table m-0 table-colored-bordered table-bordered-custom">
                                                    <thead>
                                                       
                                                    <tr>
                                                  
                                                        <th>Nama Kategori</th>
                                                        <th>Total</th>
                                                        
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($categoriesDataincome as $income)
                                                    <tr>
                                                      
                                                        <td>{{ $income['cashflow_category_name'] }}</td>
                                                        <td>{{ "Rp. ".number_format($income['total']) }}</td>
                                                       
                                                    </tr>
                                                   
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
    
                            <div class="col-xl-6">                           
                                <div class="card-box">
                                    <div class="card" >                                        
                                        <div class="card-header">
                                            <p class="m-0 text-uppercase font-bold font-secondary text-center" title="Statistics">Pengeluaran</p>
                                        </div>                                
                                        <div id="padAngle2"></div>
                                        
                                        <div class="card-box">
                                            <h4 class="m-t-0 header-title"><b>Pengeluaran Berdasarkan Kategori</b></h4>
                                            <p class="text-muted font-14 m-b-20">
                                              
                                            </p>
        
                                            <div class="table-responsive">
                                                <table class="table m-0 table-colored-bordered table-bordered-danger">
                                                    <thead>
                                                       
                                                        <tr>
                                                      
                                                            <th>Nama Kategori</th>
                                                            <th>Total</th>
                                                            
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($categoriesDataexpanse as $expanse)
                                                        <tr>
                                                          
                                                            <td>{{ $expanse['cashflow_category_name'] }}</td>
                                                            <td>{{ "Rp. ".number_format($expanse['total']) }}</td>
                                                           
                                                        </tr>
                                                       
                                                        @endforeach
                                                        </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-12">
                                <div class="card-box table-responsive">
                                    <h4 class="m-t-0 header-title"><b>Laporan Keuangan Bulanan</b></h4>
                                    <p class="text-muted font-13 m-b-30">
                                       Ringkasan Pemasukan dan Pengeluran Bulanan
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Bulan</th>
                                                <th>Tahun</th>
                                                <th>Total Pemasukan</th>
                                                <th>Total Pengeluaran</th>
                                                <th>Selisih</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($monthlyData as $data)
                                            <tr>
                                                <td>{{ \Carbon\Carbon::create()->month($data->month)->format('F') }}</td>
                                                <td>{{ $data->year }}</td>
                                                <td>{{ "Rp. " . number_format($data->total_income, 2) }}</td>
                                                <td>{{ "Rp. " . number_format($data->total_expense, 2) }}</td>
                                                <td>{{ "Rp. " . number_format($data->difference, 2) }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- end row -->
            
                      
                        
                                              
                            
                                              
                        
                    </div>
                </div>
                                              
            </div>
      

            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

        
          
           
                <script src="/dashboard/plugins/billboard/billboard.pkgd.js"></script>
          
                <script>
                    var incomeArray = @json($incomeArray);
                    var expenseArray = @json($expenseArray);
            
                    // Use forEach to log each value for debugging
                    console.log('Income Array:');
                    incomeArray.forEach(function(value, index) {
                        console.log('Month ' + (index + 1) + ': ' + value);
                    });
            
                    console.log('Expense Array:');
                    expenseArray.forEach(function(value, index) {
                        console.log('Month ' + (index + 1) + ': ' + value);
                    });
            
                    var monthlyData = [
                        ["Pemasukan", ...incomeArray],
                        ["Pengeluaran", ...expenseArray]
                    ];
            
                    var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
            
                    var chart = bb.generate({
                        data: {
                            columns: monthlyData,
                            colors: {
                                Pemasukan: "#31bd6c",
                                Pengeluaran: "#c73f22"
                            },
                            types: {
                                Pemasukan: "area", // for ESM specify as: area()
                                Pengeluaran: "area-spline" // for ESM specify as: areaSpline()
                            }
                        },
                        axis: {
                            x: {
                                type: "category",
                                categories: monthNames
                            }
                        },
                        bindto: "#areaChart"
                    });
                </script>
           
            
          
            
    
            
        
        <script type="text/javascript">
            var categoriesDataincome = @json($categoriesDataincome);
            var categoriesDataexpanse = @json($categoriesDataexpanse);
    
            var incomeColumns = [];
            categoriesDataincome.forEach(function(category) {
                incomeColumns.push([category.cashflow_category_name, category.total]);
            });
    
            var chart1 = bb.generate({
                data: {
                    columns: incomeColumns,
                    type: "donut", // for ESM specify as: donut()
                },
                donut: {
                    title: "Pemasukan",
                    padAngle: 0.1
                },
                bindto: "#padAngle",
            });
    
            var expanseColumns = [];
            categoriesDataexpanse.forEach(function(category) {
                expanseColumns.push([category.cashflow_category_name, category.total]);
            });
    
            var chart2 = bb.generate({
                data: {
                    columns: expanseColumns,
                    type: "donut", // for ESM specify as: donut()
                },
                donut: {
                    title: "Pengeluaran",
                    padAngle: 0.1
                },
                bindto: "#padAngle2",
            });
        </script>
@case('3')
{{ $division }}
@break
@endswitch 
@endsection




