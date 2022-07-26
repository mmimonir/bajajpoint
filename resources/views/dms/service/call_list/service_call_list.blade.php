@extends('service_layouts.app')
@section('title', 'Call For Servicing')

@push('page_css')
<style>

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
    <div class="col-md-12" style="margin:10px 0;">
        <div class="card" style="box-shadow:0 0 25px 0 lightgrey;">
            <div class="card-header no-print">
                <div class="row">
                    <div class="col-md-12 d-flex justify-content-center" style="height:32px;">
                        <div>
                            <label style="margin-right:10px;">Service Call Area</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {

    })
</script>
@endsection