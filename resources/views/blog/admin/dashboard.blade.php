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
                    <select class="select2 form-control" name="states[]" multiple="multiple">
                        <option value="AL">Alabama</option>
                        <option value="WY">Wyoming</option>
                        <option value="WY">Wyomind</option>
                        <option value="WY">Wyominf</option>
                        <option value="WY">Wyominh</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('third_party_scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        let tags = [];
        $(".select2").select2({
            theme: 'classic',
            // width: 'style',
        });
    });
</script>
@endsection