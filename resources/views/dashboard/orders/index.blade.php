@extends('dashboard.layouts.mains')

@section('container')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">

<script>
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

        setTimeout(() => {
            $(alert).alert('close');
        }, 5000);
    }
</script>

<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">DATA SALES ORDER {{ $division_name }}</h4>
                    <div class="clearfix"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <button type="button" id="tooltip-animation" class="btn btn-icon waves-effect btn-secondary float-right" title="Gunakan Search Sebagai Filter Export PDF / Excel Contoh ingin print bulan januari maka search 2025-01"><i class=" dripicons-question"></i></button>

                        <h4 class="m-t-0 header-title text-center"><b>Daftar Sales Order {{ $division_name }}</b></h4>
                        <br><br>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <a href="/dashboard/orders/create" class="btn btn-primary mb-3 col-12"><span><i class="fi-plus"></i></span> Tambah Data Sales Order Baru</a>
                            </div>
                            <div class="form-group col-md-1">
                                <label for="modalProductCode" class="col-form-label">Tanggal :<span class="text-danger"> </span></label>
                            </div>
                            <div class="form-group col-md-2">
                                <input type="text" id="startDate" class="form-control" placeholder="Start Date">
                            </div>
                            <div class="form-group col-md-2">
                                <input type="text" id="endDate" class="form-control" placeholder="End Date">
                            </div>
                        </div>

                        @if (session('success'))
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    showAlert("{{ session('success') }}", 'success');
                                });
                            </script>
                        @endif

                        @if (session('danger'))
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    showAlert("{{ session('danger') }}", 'danger');
                                });
                            </script>
                        @endif

                        <div id="alertContainer"></div>

                        <table id="datatable-buttons" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="col-2 text-center">Tanggal</th>
                                    <th class="col-2 text-center">Nomor SO</th>
                                    <th class="col-2 text-center">Customer</th>
                                    <th class="col-2 text-center">Perusahaan</th>
                                    <th class="col-2 text-center">Nominal SO</th>
                                    <th class="col-2 text-center">Status SO</th>
                                    <th class="col-2 text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order->order_date }}</td>
                                    <td>{{ $order->so_number }}</td>
                                    <td>{{ $order->customer->name }}</td>
                                    <td>{{ $order->company->company_name }}</td>
                                    <td>{{ "Rp. ".number_format($order->total_amount) }}</td>
                                    <td>{{ $order->so_number }}</td>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item dripicons-pencil" href="/dashboard/orders/{{ $order->id }}/edit"> Edit</a>
                                                <form action="/dashboard/orders/{{ $order->id }}" method="post" class="d-inline" id="delete-form-{{ $order->id }}">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="button" class="dropdown-item dripicons-trash btn-danger sa-params" data-form-id="delete-form-{{ $order->id }}">  Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

<script>
    $(document).ready(function() {
        var table = $('#datatable-buttons').DataTable({
            dom: 'Bfrtip',
            lengthChange: false,
            pageLength: 25,
            buttons: [
                {
                    extend: 'copyHtml5',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                { 
                    extend: 'pdfHtml5',
                    orientation: 'portrait',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5]
                    },
                    customize: function (doc) {
                        var searchValue = table.search();
                        var startDate = $('#startDate').val();
                        var endDate = $('#endDate').val();
                        var filterText = '';

                        if (searchValue) {
                            filterText = 'Search: ' + searchValue;
                        } else if (startDate || endDate) {
                            filterText = 'Date Range: ' + startDate + ' to ' + endDate;
                        }

                        doc.defaultStyle.fontSize = 7;
                        doc.content[1].table.widths = ['16.6%', '16.6%', '16.6%', '16.6%', '16.6%', '16.6%'];
                        doc.styles.tableHeader = { alignment: 'left', fillColor: '#51ad45' };
                        doc.defaultStyle.alignment = 'left';

                        doc['header'] = function() {
                            return {
                                columns: [
                                    {
                                        text: 'Laporan Sales Order {{ $division_name }}',
                                        alignment: 'left',
                                        fontSize: 12,
                                        margin: [10, 10]
                                    },
                                    {
                                        text: filterText,
                                        alignment: 'right',
                                        fontSize: 8,
                                        margin: [0, 10]
                                    }
                                ],
                                margin: [10, 0]
                            };
                        };
                    }
                },
                'colvis'
            ]
        });

        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                var startDate = $('#startDate').datepicker('getDate');
                var endDate = $('#endDate').datepicker('getDate');
                var date = new Date(data[0]);

                if ((startDate === null && endDate === null) ||
                    (startDate === null && date <= endDate) ||
                    (startDate <= date && endDate === null) ||
                    (startDate <= date && date <= endDate)) {
                    return true;
                }
                return false;
            }
        );

        $('#startDate, #endDate').on('change', function() {
            table.draw();
        });

        $('#startDate, #endDate').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        });

        $('.sa-params').on('click', function(e) {
            e.preventDefault();
            var formId = $(this).data('form-id');
            var form = $('#' + formId);

            Swal.fire({
                title: 'Apa Anda Yakin???',
                text: "Anda tidak akan bisa mengembalikan data ini jika telah dihapus !!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Batal',
                confirmButtonText: 'Iya, Hapus'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
@endsection