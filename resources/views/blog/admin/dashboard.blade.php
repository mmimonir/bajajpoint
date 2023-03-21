@extends('blog.admin.layouts.app')
@section('title', 'Bajaj Point - 3S Dealer Of UttaraMotors Ltd')
@push('page_css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

<!-- select2-bootstrap4-theme -->
<link href="https://raw.githack.com/ttskch/select2-bootstrap4-theme/master/dist/select2-bootstrap4.css" rel="stylesheet">
@endpush
@section('content')
<div class="container-fluid" style="margin-top:15px; padding:0;">
    <div class="row">
        <div class="col-md-12">
            <h1>Blog Dashboard</h1>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Multiple</label>
                    <select class="select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%;" tabindex="-1" aria-hidden="true">
                        <option data-select2-id="46">Alabama</option>
                        <option data-select2-id="47">Alaska</option>
                        <option data-select2-id="48">California</option>
                        <option data-select2-id="49">Delaware</option>
                        <option data-select2-id="50">Tennessee</option>
                        <option data-select2-id="51">Texas</option>
                        <option data-select2-id="52">Washington</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('third_party_scripts')
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        $(".select2").select2({
            theme: 'bootstrap4',
            // width: 'style',
        });
    });
</script>
@endsection