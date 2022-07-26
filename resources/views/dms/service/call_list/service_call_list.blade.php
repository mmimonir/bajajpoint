@extends('service_layouts.app')
@section('title', 'Call For Servicing')

@push('page_css')
<style>
    .fa-save {
        cursor: pointer;
    }
</style>
@endpush
@push('page_scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
@endpush
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card card-success collapsed-card">
            <div class="card-header bg-dark">
                <h3 class="card-title">Service Area</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="maximize">
                        <i class="fas fa-expand"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body" style="display: block; padding:0px;">
                <div class="card mt-1" style="box-shadow: 0 0 5px 0 lightgrey">
                    <div class="card-header bg-dark d-flex justify-content-center">
                        <h3 class="card-title">
                            Service Call List - Customer Details
                        </h3>
                    </div>
                    <div class="card-body d-flex justify-content-center">
                        <form class="form-inline" id="service_call_search_form">
                            <input type="hidden" name="_token" value="ZVYuXZF4oOMycETw7TCZgKYjtL6gxmOU6ulgrRV4">
                            <div class="form-group mb-2">
                                <label for="service_date">Service Date</label>
                            </div>
                            <div class="form-group mx-sm-3 mb-2">
                                <input type="date" name="service_date" class="form-control" id="service_date" placeholder="Last Five Digit Chassis">
                            </div>
                            <div class="form-group mb-2">
                                <label for="five_engine">Select Service Type</label>
                            </div>
                            <div class="form-group mx-sm-3 mb-2">
                                <select class="form-select" name="service_type" id="service_type">
                                    <option value="">Select Service Type</option>
                                    <option value="1">1st Free Service</option>
                                    <option value="3">2nd Free Service</option>
                                    <option value="6">3rd Free Service</option>
                                    <option value="9">4th Free Service</option>
                                    <option value="12">1st Paid Service</option>
                                    <option value="15">2nd Paid Service</option>
                                    <option value="18">3rd Paid Service</option>
                                    <option value="21">4th Paid Service</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-dark mb-2">
                                Search
                            </button>
                        </form>
                    </div>
                </div>
                <div class="col-md-12" style="margin-top:-15px; padding:0px;">
                    <div class="card mt-2" style="box-shadow: 0 0 25px 0 lightgrey; margin-bottom:0px;" id="show_search_result">


                    </div>
                </div>
            </div>
            <div class="overlay" id="search_overlay" style="visibility: hidden;">
                <i class="fas fa-2x fa-sync-alt fa-spin"></i>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        // substrack month from current date and set it as service date start
        function date_sub_month(service_date, month) {
            let fmt_date = date_fns.format(date_fns.sub(new Date(service_date), {
                months: month
            }), "yyy-MM-dd");
            return fmt_date;
        }
        // substrack month from current date and set it as service date end

        // search form submit start
        $('#service_call_search_form').on('submit', function(e) {
            e.preventDefault();
            let service_date = $('#service_date').val();
            let service_type = +$('#service_type').val();

            let expexted_date = date_sub_month(service_date, service_type);

            $.ajax({
                url: '{{ route("service.get_call_result") }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    expexted_date
                },
                beforeSend: function() {
                    $('#search_overlay').css('visibility', 'visible');
                },
                success: function(response) {
                    $('#search_overlay').css('visibility', 'hidden');
                    console.log(response);
                    if (response.length > 0) {
                        var html = `
                    <div class="card-header bg-dark d-flex justify-content-center">
                        <h3 class="card-title">
                            Search Result
                        </h3>
                    </div>
                    <div id="search_result_wrapper" class="dataTables_wrapper no-footer">
                                <table id="search_result" class="table table-hover table-sm table-bordered dataTable no-footer">
                                    <thead class="text-center">
                                        <tr class="text-sm">
                                            <th style="width:5px;">Sl</th>
                                            <th style="width:230px;">Model</th>
                                            <th style="width:190px;">Customer Name</th>
                                            <th style="width:90px;">Date</th>
                                            <th style="width:250px;">Address</th>
                                            <th style="width:105px;">Mobile</th>
                                            <th style="width:98px;">RG Number</th>
                                            <th>Note</th>
                                            <th style="width:55px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>`;
                        response.forEach(function(data, index) {
                            var saleDate = new Intl.DateTimeFormat('en-IN').format(new Date(data.sale_date)).split("/").join("-")
                            var sl = index + 1;
                            html +=
                                `<tr>                                
                                <td>${sl}</td>
                                <td>${data.model ? data.model :''}</td>
                                <td>${data.customer_name ? data.customer_name.length > 15 ? data.customer_name.substring(0,15) + '.' : data.customer_name : ''}</td>
                                <td style="text-align:center;">${saleDate ? saleDate : ''}</td>
                                <td>${data.address_two}</td>
                                <td style="text-align:center;">${data.mobile ? data.mobile : ''}</td>
                                <td style="text-align:center;">${data.rg_number ? data.rg_number : ''}</td>
                                <td style="padding:0;">
                                    <input style="width:100%; border:none;" type="text" name="note" placeholder"Note Here" value="${data.note}">
                                    <input type="hidden" name="core_customer_id" value="${data.id}">
                                </td>                                
                                <td style="text-align:center;"><i class="fas fa-save save_note"></i></td>                                
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
                    $("#show_search_result").html(html);
                    console.log(response.error);
                }
            });
        });
        // search form submit end

        $(document).on("click", ".save_note", function(e) {
            var _this = $(this).parent().parent();
            var note = _this.find('input[name="note"]').val();
            alert(note);
        });


    })
</script>
@endsection