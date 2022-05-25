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

    .para_select p {
        padding-left: 11px;
        border-right: 0;
    }

    .border_custom {
        border: solid black;
        border-width: thin;
        border-bottom-width: 0;
        border-right-width: 1.9px;

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
            <div class="card-body bangla_font bangla_font_light d-flex justify-content-center" style="width:11.5in; margin:auto;">
                <table class="table job_card_table">
                    <tr>
                        <td class="align-middle border_custom" style="border:solid; border-width:thin; border-bottom:0;">
                            <div class="custom-img">
                                <img src="{{URL('/images/uml_logo.png')}}" style="width:75%;">
                            </div>
                        </td>
                        <td class="text-center border_custom" style="border:solid; border-width:thin; border-bottom:0;">
                            <p class="m-0 font-weight-bold h3"><span class="fs-4">ডিলারের নাম: </span>বাজাজ পয়েন্ট (বাজাজ সার্ভিস সেন্টার)</p>
                            <p class="m-0 font-weight-bold">400/বি, মালিবাগ চৌধুরী পাড়া, ঢাকা-1219</p>
                            <p class="m-0 font-weight-bold">মোবাইল: 01680 365 200, 01813 551 621</p>
                        </td>
                        <td class="align-middle border_custom" style="border:solid; border-width:thin; border-bottom:0;">
                            <p class="m-0 font-weight-bold">জব কার্ড নং:</p>
                            <p class="m-0 font-weight-bold">জব কার্ড তারিখ:</p>
                        </td>
                        <td class="align-middle border_custom" style="border:solid; border-width:thin; border-bottom:0;">
                            <div class="custom-img">
                                <img src="{{URL('/images/bajaj_logo.png')}}" style="width:75%;">
                            </div>
                        </td>
                    </tr>
                    <tr class="para_select">
                        <td colspan="4" style="padding:0;">
                            <div class="row">
                                <div class="col-md-4 pr-0">
                                    <div>
                                        <p class="border_custom m-0 font-weight-bold">গাড়ির বিবরণ</p>
                                        <p class="border_custom m-0">গাড়ির রেজিঃ নম্বর:<input class="ml-1" style="width:69%; height:21px; border:0px;" type="text"></p>
                                        <p class="border_custom m-0">গাড়ির মডেল:<input class="ml-1" style="width:77%; height:21px; border:0px;" type="text"></p>
                                        <p class="border_custom m-0">
                                            <span>বিক্রয় তারিখ:
                                                <input style="width:30%; height:21px; border:0px;" type="date">
                                            </span>
                                            <span>মাইলেজ:
                                                <input style="width:30%; height:21px; border:0px;" type="text">
                                            </span>
                                        </p>
                                        <p class="border_custom m-0"><span>ইঞ্জিন নং: <input class="ml-1" style="width:30%; height:21px; border:0px;" type="text"></span><span>চেসিস নং:<input class="ml-1" style="width:30%; height:21px; border:0px;" type="text"></span></p>
                                        <p class="border_custom m-0">
                                            <span style="margin-right:50px;">সার্ভিসের ধরণ:</span>
                                            <span style="margin-right:25px;">পেইড সার্ভিস </span><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <span style="margin-right:25px;">ফ্রি সার্ভিস</span><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        </p>
                                        <p class="border_custom m-0"><span style="margin-right:50px;">মাইনর মেরামত</span><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></p>
                                        <p class="border_custom m-0"><span style="margin-right:50px;">মেজর মেরামত</span><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></p>
                                        <p class="border_custom m-0"><span style="margin-right:50px;">ইঞ্জিন ওভারহোলিং</span><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></p>
                                        <p class="border_custom m-0"><span style="margin-right:50px;">দূর্ঘটনাজনিত মেরামত</span><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></p>
                                        <p class="border_custom m-0 font-weight-bold">গ্রাহকের অভিযোগ</p>
                                        <textarea class="border_custom" style="border-right:0; height:168px; width:100%; margin-bottom:-7px;" value="" id="flexCheckDefault"></textarea>
                                        <p class="border_custom m-0 font-weight-bold">মেরামতের বিবরণ</p>
                                        <textarea class="border_custom" style="border-right:0; height:193px; width:100%; margin-bottom:-7px;" value="" id="flexCheckDefault"></textarea>
                                        <p class="border_custom m-0 font-weight-bold">পরবর্তী কাজের বিবরণ<span class="font-weight-bold" style="margin-left:20px; margin-right:10px;">তারিখ</span><input style="width:30%; height:21px; border:0px;" type="date"></p>
                                        <textarea class="border_custom" style="border-right:0; height:169px; width:100%; margin-bottom:-7px; border-bottom-width:1px;" value="" id="flexCheckDefault"></textarea>
                                        <p style="border-top:0; border-bottom:1px solid;" class="border_custom m-0 font-weight-bold">সার্ভিস ইঞ্জিনিয়ারের নামঃ</p>
                                        <p style="border-top:0; height:125px; border-right:1px solid; width:354px;" class="border_custom m-0">গাড়ি মেরামতের সকল খরচ আমি নিজে বহন করব। গাড়ি মেরামতকালীন সময়ে সংরক্ষন ও টেস্ট ড্রাইভের সকল দায়িত্ব আমার।</p>
                                        <p class="m-0" style="padding-left:11px; border-bottom:1px solid; border-left:1px solid; border-right:1px solid; width:354px;">
                                            <span>তারিখ:</span>
                                            <span style="margin-left:200px;">স্বাক্ষর:</span>
                                        </p>

                                    </div>
                                </div>
                                <div class="col-md-8 pl-0">
                                    <p style="border-right:solid; border-right-width:thin;" class="border_custom m-0 font-weight-bold">গ্রাহকের নাম:<input class="ml-1" style="width:89%; height:21px; border:0px;" type="text"></p>
                                    <p style="border-right:solid; border-right-width:thin;" class="border_custom m-0">ঠিকানা:<input class="ml-1" style="width:93%; height:21px; border:0px;" type="text"></p>
                                    <p style="border-right:solid; border-right-width:thin;" class="border_custom m-0">-</p>
                                    <p style="border-right:solid; border-right-width:thin;" class="border_custom m-0">টেলিফোন নম্বর:<input class="ml-1" style="width:30%; height:21px; border:0px;" type="text"></p>
                                    <p style="border-right:solid; border-right-width:thin;" class="border_custom m-0 font-weight-bold">গাড়ি পর্যবেক্ষণের বিবরণ:</p>
                                    <p style="border-right:solid; border-right-width:thin;" class="border_custom m-0">
                                        <span>ফুয়েলের পরিমাণ:
                                            <input class="ml-1" style="width:45px; height:20px; margin-right:150px;" type="text">
                                        </span>
                                        <span style="margin-right:20px;">ফুয়েল ট্যাংকে দাগ আছে কিনা?</span>
                                        <span style="margin-right:30px;">হ্যাঁ</span>
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <span style="margin-right:30px;">না</span>
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    </p>
                                    <p style="border-right:solid; border-right-width:thin;" class="border_custom m-0">
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
                                    <p class="m-0 font-weight-bold">
                                        <span class="border_custom text-center" style="display:inline-block; width:10%; margin-left:-11px;">ক্রমিক</span>
                                        <span class="border_custom text-center" style="display:inline-block; width:30%; margin-left:-4px;">পার্টস আইডি</span>
                                        <span class="border_custom text-center" style="display:inline-block; width:36%; margin-left:-4px;">পার্টস এবং সেবার বিবরণ</span>
                                        <span class="text-center" style="border-top:solid; border-top-width:thin; display:inline-block; width:10%; margin-left:-4px; margin-right:3px;">পরিমাণ</span>
                                        <span‍ class="border_custom text-center" style="display:inline-block; width:15.75%; margin-left:-5px;">মূল্য (টাকা)</span>
                                    </p>

                                    @for($i=0; $i<=26; $i++) <p class="m-0">
                                        <span class="border_custom text-center" style="display:inline-block; width:10%; margin-left:-11px;"><input name="" id="" class="ml-1" style="width:97%; height:21px; border:0px;" type="text"></span>
                                        <span class="border_custom text-center" style="display:inline-block; width:30%; margin-left:-4px;"><input name="" id="" class="ml-1" style="width:97%; height:21px; border:0px;" type="text"></span>
                                        <span class="border_custom text-center" style="display:inline-block; width:36%; margin-left:-4px;"><input name="" id="" class="ml-1" style="width:97%; height:21px; border:0px;" type="text"></span>
                                        <span class="text-center" style="border-top:solid; border-top-width:thin; display:inline-block; width:10%; margin-left:-4px; margin-right:3px;"><input name="" id="" class="ml-1" style="width:97%; height:21px; border:0px;" type="text"></span>
                                        <span‍ class="border_custom text-center" style="display:inline-block; width:15.75%; margin-left:-5px;"><input name="" id="" class="ml-1" style="width:97%; height:21px; border:0px;" type="text"></span>
                                            </p>
                                            @endfor

                                            <p class="m-0 font-weight-bold" style="border:1px solid;">
                                                মেকানিকের নামঃ
                                            </p>
                                            <p class="m-0" style="height:125px; border-bottom:0; border-right:1px solid; border-left:1px solid;">আমি গাড়ি মেরামতের কাজে সন্তুষ্ট এবং গাড়ি ভালভাবে বুঝে ডেলিভারী নিলাম।
                                            </p>
                                            <p class="m-0" style="padding-left:11px; border-bottom:1px solid; border-top:0; border-left:1px solid; border-right:1px solid; width:100%;">
                                                <span>তারিখ:</span>
                                                <span style="margin-left:400px;">গ্রাহকের স্বাক্ষর:</span>
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