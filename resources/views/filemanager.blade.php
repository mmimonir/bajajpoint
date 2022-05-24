@extends('layouts.app')
@section('title', 'File Manager')

@push('page_css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
<link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
<style>
    body {
        font-size: 0.91rem;
    }
</style>
@endpush
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12" style="padding:0;">
        <div class="card" style="box-shadow:0 0 25px 0 lightgrey;">
            <div class="card-body">
                <div id="fm" style="height: 600px;"></div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('fm-main-block').setAttribute('style', 'height:' + window.innerHeight + 'px');

        fm.$store.commit('fm/setFileCallBack', function(fileUrl) {
            window.opener.fmSetLink(fileUrl);
            window.close();
        });
    });
</script>
@endsection