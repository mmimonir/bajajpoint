@extends('service_layouts.app')
@section('title', 'Job Card')

@push('page_css')
<style>

</style>
@endpush
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card" style="box-shadow:0 0 25px 0 lightgrey;">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="bangla_font">জব কার্ড</h4>
                    </div>
                </div>
            </div>
            <div class="card-body bangla_font bangla_font_light">
                <table class="table table-bordered job_card_table">
                    <tr>
                        <td>Logo</td>
                        <td class="text-center">

                            <p class="m-0 font-weight-bold h3"><span class="fs-4">ডিলারের নাম: </span>বাজাজ পয়েন্ট (বাজাজ সার্ভিস সেন্টার)</p>
                            <p class="m-0 font-weight-bold">400/বি, মালিবাগ চৌধুরী পাড়া, ঢাকা-1219</p>
                            <p class="m-0 font-weight-bold">মোবাইল: 01680 365 200, 01813 551 621</p>
                        </td>
                        <td>জব কার্ড নং:</td>
                        <td>Logo</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection