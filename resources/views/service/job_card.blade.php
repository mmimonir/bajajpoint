@extends('service_layouts.app')
@section('title', 'Job Card')

@push('page_css')
<style>
    * {
        box-sizing: border-box;
    }

    .custom-img {
        width: 80px;
        margin-right: -50px;
    }
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
                        <td class="align-middle">
                            <div class="custom-img">
                                <img src="{{URL('/images/uml_logo.png')}}" style="width:75%;">
                            </div>
                        </td>
                        <td class="text-center">
                            <p class="m-0 font-weight-bold h3"><span class="fs-4">ডিলারের নাম: </span>বাজাজ পয়েন্ট (বাজাজ সার্ভিস সেন্টার)</p>
                            <p class="m-0 font-weight-bold">400/বি, মালিবাগ চৌধুরী পাড়া, ঢাকা-1219</p>
                            <p class="m-0 font-weight-bold">মোবাইল: 01680 365 200, 01813 551 621</p>
                        </td>
                        <td class="align-middle">
                            <p class="m-0 font-weight-bold">জব কার্ড নং:</p>
                            <p class="m-0 font-weight-bold">জব কার্ড তারিখ:</p>
                        </td>
                        <td class="align-middle">
                            <div class="custom-img">
                                <img src="{{URL('/images/bajaj_logo.png')}}" style="width:75%;">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" style="padding:0;">
                            <div class="row">
                                <div class="col-md-4 pr-0">
                                    <div>
                                        <p class="p-1 border m-0 font-weight-bold">গাড়ির বিবরণ</p>
                                        <p class="p-1 border m-0">গাড়ির রেজিঃ নম্বর:<input class="ml-1" style="width:69%; height:21px; border:0px;" type="text"></p>
                                        <p class="p-1 border m-0">গাড়ির মডেল:<input class="ml-1" style="width:77%; height:21px; border:0px;" type="text"></p>
                                        <p class="p-1 border m-0">
                                            <span>বিক্রয় তারিখ:
                                                <input style="width:30%; height:21px; border:0px;" type="date">
                                            </span>
                                            <span>মাইলেজ:
                                                <input style="width:30%; height:21px; border:0px;" type="text">
                                            </span>
                                        </p>
                                        <p class="p-1 border m-0"><span style="margin-right:150px;">ইঞ্জিন নং:</span><span>চেসিস নং:</span></p>
                                        <p class="p-1 border m-0">
                                            <span style="margin-right:50px;">সার্ভিসের ধরণ:</span>
                                            <span style="margin-right:25px;">পেইড সার্ভিস </span><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <span style="margin-right:25px;">ফ্রি সার্ভিস</span><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        </p>
                                        <p class="p-1 border m-0"><span style="margin-right:50px;">মাইনর মেরামত</span><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></p>
                                        <p class="p-1 border m-0"><span style="margin-right:50px;">মেজর মেরামত</span><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></p>
                                        <p class="p-1 border m-0"><span style="margin-right:50px;">ইঞ্জিন ওভারহোলিং</span><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></p>
                                        <p class="p-1 border m-0"><span style="margin-right:50px;">দূর্ঘটনাজনিত মেরামত</span><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></p>
                                    </div>
                                </div>
                                <div class="col-md-8 pl-0">
                                    <p class="p-1 border m-0 font-weight-bold">গ্রাহকের নাম:<input class="ml-1" style="width:89%; height:21px; border:0px;" type="text"></p>
                                    <p class="p-1 border m-0">ঠিকানা:<input class="ml-1" style="width:93%; height:21px; border:0px;" type="text"></p>
                                    <p class="p-1 border m-0">-</p>
                                    <p class="p-1 border m-0">টেলিফোন নম্বর:</p>
                                    <p class="p-1 border m-0 font-weight-bold">গাড়ি পর্যবেক্ষণের বিবরণ:</p>
                                    <p class="p-1 border m-0">
                                        <span>ফুয়েলের পরিমাণ:
                                            <input class="ml-1" style="width:45px; height:20px; margin-right:150px;" type="text">
                                        </span>
                                        <span style="margin-right:20px;">ফুয়েল ট্যাংকে দাগ আছে কিনা?</span>
                                        <span style="margin-right:30px;">হ্যাঁ</span>
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <span style="margin-right:30px;">না</span>
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    </p>
                                    <p class="p-1 border m-0">
                                        <span style="margin-right:20px;">ইন্ডিকেটরের লেন্স ভাঙ্গা কিনা?</span>
                                        <span style="margin-right:30px;">হ্যাঁ</span>
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <span style="margin-right:30px;">না</span>
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">

                                        <span style="margin-right:20px; margin-left:25px;">হেডলাইটে দাগ আছে কিনা?</span>
                                        <span style="margin-right:30px;">হ্যাঁ</span>
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <span style="margin-right:30px;">না</span>
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    </p>
                                </div>
                            </div>
                        </td>
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