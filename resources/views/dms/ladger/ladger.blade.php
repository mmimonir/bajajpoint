@extends('layouts.app')
@section('title', 'Ladger')

@section('datatable_css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css" />
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-info mt-2" style="box-shadow:0 0 25px 0 lightgrey;">
                <div class="card-header bg-dark" style="background-color:#343A40;">
                    <h3 class="card-title">Ladger</h3>
                </div>
                <div class="card-body d-flex justify-content-center">
                    <div id="show_all_data" class="container h-100 d-flex justify-content-center">
                        <table id="example" class="table table-hover table-responsive table-striped table-sm text-sm table-light table-bordered" style="width:100%;">
                            <thead>
                                <tr>
                                    <th class="align-middle">Sl</th>
                                    <th class="align-middle">Date</th>
                                    <th class="align-middle">Description</th>
                                    <th class="align-middle">Credit</th>
                                    <th class="align-middle">Debit</th>
                                    <th class="align-middle">Balance</th>
                                </tr>
                            </thead>
                            <tbody id="tbody">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('datatable')
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        var html = `<tr>
                        <td class="text-center">01</td>
                        <td>01.01.2022</td>
                        <td>Cash Withdrawal</td>
                        <td>0</td>
                        <td>1000</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td class="text-center">02</td>
                        <td>01.01.2022</td>
                        <td>Cash Withdrawal</td>
                        <td>0</td>
                        <td>1000</td>
                        <td>0</td>
                    </tr>
                    `;
        $('#tbody').append(html);
    });
</script>
@endsection