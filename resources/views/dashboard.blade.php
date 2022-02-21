@extends('layouts.app')
@section('title', 'Bajaj Point - 3S Dealer Of UttaraMotors Ltd')
@section('content')
<div class="container-fluid" style="margin-top:15px; padding:0;">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-2" style="box-shadow: 0 0 25px 0 lightgrey">
                <div class="card-header bg-dark">
                    <h3 class="text-center rounded">
                        Sales Update, Hform, Stamp, Gate Pass, Single
                        Print
                    </h3>
                </div>
                <div class="card-body d-flex justify-content-center">
                    <form class="form-inline" action="#" method="post" id="search_form">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="five_chassis">Chassis No</label>
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <input type="text" name="five_chassis" class="form-control" id="five_chassis" placeholder="Last Five Digit Chassis">
                        </div>
                        <div class="form-group mb-2">
                            <label for="five_engine">Engine No</label>
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <input type="text" name="five_engine" class="form-control" id="five_engine" placeholder="Last Five Digit Engine">
                        </div>
                        <button type="submit" class="btn btn-dark mb-2">
                            Search
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12" style="margin-top:-25px;">
            <div class="card mt-2" style="box-shadow: 0 0 25px 0 lightgrey" id="show_search_result">

            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner d-flex justify-content-center">
                    <a style="font-size:20px;" href="{{ route('utility.download') }}" class="btn btn-sm btn-primary"><i class="fa-solid fa-download" style="color:black; margin-right:5px;"></i>Download Backup</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('datatable')
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
@section('script')
<script>
    $("#search_form").submit(function(e) {
        e.preventDefault();
        const FD = new FormData(this);
        $.ajax({
            url: "{{ route('print.print_list_dashboard') }}",
            method: 'post',
            data: FD,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(response) {
                if (response.length > 0) {
                    var html = `
                <div class="card-header bg-dark">
                    <h3 class="text-center rounded">
                        Search Result
                    </h3>
                </div>
                <div style="padding:0px 5px;">                
                    <table id="search_result" class="table table-hover table-sm table-bordered">
                        <thead class="text-center">
                            <tr class="text-sm">
                                <th>Sl</th>
                                <th>Model</th>
                                <th>Sale Date</th>
                                <th>Chassis No</th>
                                <th>Engine No</th>
                                <th>Customer Name</th>
                                <th>Mobile</th>
                                <th>Action (Print)</th>
                            </tr>
                        </thead>
                        <tbody>`;
                    response.forEach(function(data, index) {
                        var sl = index + 1;
                        var chassis = (data.eight_chassis ? data.eight_chassis : '') + (data.one_chassis ? data.one_chassis : '') + (data.three_chassis ? data.three_chassis : '') + (data.five_chassis ? data.five_chassis : '');
                        var engine = (data.six_engine ? data.six_engine : '') + (data.five_engine ? data.five_engine : '');
                        html +=
                            `<tr>                                
                                <td>${sl}</td>
                                <td>${data.model ? data.model :''}</td>
                                <td>${data.original_sale_date ? data.original_sale_date : ''}</td>
                                <td>${chassis}</td>
                                <td>${engine}</td>
                                <td>${data.customer_name ? data.customer_name.length > 15 ? data.customer_name.substring(0,15) + '.' : data.customer_name : ''}</td>
                                <td>${data.mobile ? data.mobile : ''}</td>
                                <td>
                                    <div class="d-flex justify-content-center padd text-decoration btn-group">
                                        <a href="/hform/${data.id}" target="_blank" class="btn-sm bg-dark">
                                            Hform
                                        </a>
                                        <a href="#" class="btn-sm bg-dark">
                                            Stamp
                                        </a>
                                        <a href="/gate_pass/${data.id}" target="_blank" class="btn-sm bg-dark">
                                            Gate Pass
                                        </a>
                                        <a href="/single_file_print/${data.id}" target="_blank" class="btn-sm bg-dark">
                                            File Print
                                        </a>
                                        <a href="/sales_update/${data.id}" target="_blank" class="btn-sm bg-dark">
                                            Edit
                                        </a>
                                        <a href="#" target="_blank" class="btn-sm bg-dark">
                                            Bank Slip
                                        </a>
                                        <a href="/customer_info/${data.id}" target="_blank" class="btn-sm bg-dark">
                                            Info
                                        </a>
                                    </div>
                                </td>
                            </tr>`;
                    });
                    html += `</tbody></table></div>`;
                } else {
                    html = `
                    <div class="card-header bg-dark">
                    <h3 class="text-center rounded">
                        Search Result
                    </h3>
                </div>
                <div style="padding:0px 5px;">
                    <h3 class="text-center">No Data Found</h3>
                    </div>
                    `;
                }
                console.log(html);
                $("#show_search_result").html(html);
                $("#search_result").DataTable({
                    bPaginate: false,
                    pageLength: 10,
                    responsive: true,
                    lengthChange: true,
                    searching: false,
                });
            }
        });
    });
</script>
@endsection