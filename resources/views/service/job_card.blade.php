@extends('service_layouts.app')
@section('title', 'Job Card')

@push('page_css')
<style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    .para_select p {
        padding-left: 11px;
        border-right: 0;
    }

    .border_custom {
        border: solid black;
        border-width: thin;
    }

    input,
    textarea {
        border: none;
    }

    .border_bottom {
        border-bottom: 1px solid black;
    }

    .border_top {
        border-top: 1px solid black;
    }

    .border_right {
        border-right: 1px solid black;
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
            <div class="card-body bangla_font bangla_font_light" style="width:11.5in; margin:auto; border:1px solid; padding:0;">
                <div class="row">
                    <div class="col-md-12 d-flex justify-content-center">
                        <div class="d-flex align-items-center p-1" style="width:15%; border-right:1px solid;">
                            <img src="{{URL('/images/uml_logo.png')}}" class="img-fluid p-1">
                        </div>
                        <div class="text-center p-1" style="width:50%; border-right:1px solid;">
                            <p class="m-0 font-weight-bold h3 border_bottom"><span class="fs-4">ডিলারের নাম: </span>বাজাজ পয়েন্ট (বাজাজ সার্ভিস সেন্টার)</p>
                            <p class="m-0 font-weight-bold">400/বি, মালিবাগ চৌধুরী পাড়া, ঢাকা-1219</p>
                            <p class="m-0 font-weight-bold">মোবাইল: 01680 365 200, 01813 551 621</p>
                        </div>
                        <div class="align-middle p-1" style="width:20%; border-right:1px solid;">
                            <p class="m-0 font-weight-bold border_bottom">জব কার্ড নং:</p>
                            <p class="m-0 font-weight-bold">জব কার্ড তারিখ:</p>
                        </div>
                        <div class="d-flex align-items-center p-1" style="width:15%;">
                            <img src="{{URL('/images/bajaj_logo.png')}}" class="img-fluid p-1">
                        </div>
                    </div>
                </div>
                <div class="para_select">
                    <div class="row">
                        <div class="col-md-4 pr-0 border_right">
                            <p class="m-0 font-weight-bold border_bottom border_top">গাড়ির বিবরণ</p>
                            <p class="m-0 border_bottom">গাড়ির রেজিঃ নম্বর:<input class="ml-1" style="width:69%; height:19px;" type="text"></p>
                            <p class="m-0 border_bottom">গাড়ির মডেল:<input class="ml-1" style="width:77%; height:19px;" type="text"></p>
                            <p class="m-0 border_bottom">
                                <span>বিক্রয় তারিখ:
                                    <input style="width:30%; height:19px;" type="date">
                                </span>
                                <span>মাইলেজ:
                                    <input style="width:30%; height:19px;" type="text">
                                </span>
                            </p>
                            <p class="m-0 border_bottom"><span>ইঞ্জিন নং: <input class="ml-1" style="width:30%; height:19px;" type="text"></span><span>চেসিস নং:<input class="ml-1" style="width:30%; height:19px; border:0px;" type="text"></span></p>
                            <p class="m-0 border_bottom">
                                <span style="margin-right:50px;">সার্ভিসের ধরণ:</span>
                                <span style="margin-right:25px;">পেইড সার্ভিস </span><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <span style="margin-right:25px;">ফ্রি সার্ভিস</span><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            </p>
                            <p class="m-0 border_bottom"><span style="margin-right:50px;">মাইনর মেরামত</span><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></p>
                            <p class="m-0 border_bottom"><span style="margin-right:50px;">মেজর মেরামত</span><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></p>
                            <p class="m-0 border_bottom"><span style="margin-right:50px;">ইঞ্জিন ওভারহোলিং</span><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></p>
                            <p class="m-0 border_bottom"><span style="margin-right:50px;">দূর্ঘটনাজনিত মেরামত</span><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></p>
                            <p class="m-0 border_bottom font-weight-bold">গ্রাহকের অভিযোগ</p>
                            <textarea class="" style="height:167px; width:100%; margin-bottom:-7px;" value="" id="flexCheckDefault"></textarea>
                            <p class=" m-0 border_bottom border_top font-weight-bold">মেরামতের বিবরণ</p>
                            <textarea class="" style="height:192px; width:100%; margin-bottom:-7px;" value="" id="flexCheckDefault"></textarea>
                            <p class=" m-0 border_bottom border_top font-weight-bold">পরবর্তী কাজের বিবরণ<span class="font-weight-bold" style="margin-left:20px; margin-right:10px;">তারিখ</span><input style="width:30%; height:19px; border:0px;" type="date"></p>
                            <textarea class="" style="height:167px; width:100%; margin-bottom:-7px;" value="" id="flexCheckDefault"></textarea>
                            <p class=" m-0 border_bottom border_top font-weight-bold">সার্ভিস ইঞ্জিনিয়ারের নামঃ</p>
                            <p style="height:125px;" class="m-0">গাড়ি মেরামতের সকল খরচ আমি নিজে বহন করব। গাড়ি মেরামতকালীন সময়ে সংরক্ষন ও টেস্ট ড্রাইভের সকল দায়িত্ব আমার।</p>
                            <p class="m-0 border_bottom" style="padding-left:11px;">
                                <span>তারিখ:</span>
                                <span style="margin-left:200px;">স্বাক্ষর:</span>
                            </p>
                        </div>
                        <div class="col-md-8 pl-0">
                            <p class="border_bottom border_top m-0 font-weight-bold">গ্রাহকের নাম:<input class="ml-1" style="width:89%; height:19px; border:0px;" type="text"></p>
                            <p class="border_bottom m-0">ঠিকানা:<input class="ml-1" style="width:93%; height:19px; border:0px;" type="text"></p>
                            <p class="border_bottom m-0">-</p>
                            <p class="border_bottom m-0">টেলিফোন নম্বর:<input class="ml-1" style="width:30%; height:19px; border:0px;" type="text"></p>
                            <p class="border_bottom m-0 font-weight-bold">গাড়ি পর্যবেক্ষণের বিবরণ:</p>
                            <p class="border_bottom m-0">
                                <span>ফুয়েলের পরিমাণ:
                                    <input class="ml-1" style="width:45px; height:20px; margin-right:150px;" type="text">
                                </span>
                                <span style="margin-right:20px;">ফুয়েল ট্যাংকে দাগ আছে কিনা?</span>
                                <span style="margin-right:30px;">হ্যাঁ</span>
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <span style="margin-right:30px;">না</span>
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            </p>
                            <p class="m-0 border_bottom">
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
                            <p class="m-0 border_bottom font-weight-bold" style="width:100%; padding:0;">
                                <span class="text-center border_right" style="display:inline-block; width:10%;">ক্রমিক</span>
                                <span class="text-center border_right" style="display:inline-block; width:30%;">পার্টস আইডি</span>
                                <span class="text-center border_right" style="display:inline-block; width:34%;">পার্টস এবং সেবার বিবরণ</span>
                                <span class="text-center border_right" style="display:inline-block; width:10%;">পরিমাণ</span>
                                <span‍ class="text-center" style="display:inline-block; width:14%; ">মূল্য (টাকা)</span>
                            </p>

                            @for($i=0; $i<=26; $i++) <p class="m-0" style="padding:0;">
                                <span class="text-center border_bottom border_right" style="display:inline-block; width:10%;"><input name="" id="" style="width:100%; height:19px;" type="text"></span>
                                <span class="text-center border_bottom border_right" style="display:inline-block; width:30%;"><input name="" id="" style="width:100%; height:19px;" type="text"></span>
                                <span class="text-center border_bottom border_right" style="display:inline-block; width:34%;"><input name="" id="" style="width:100%; height:19px;" type="text"></span>
                                <span class="text-center border_bottom border_right" style="display:inline-block; width:10%;"><input name="" id="" style="width:100%; height:19px;" type="text"></span>
                                <span class="text-center border_bottom" style="display:inline-block; width:14%;"><input name="" id="" style="width:100%; height:19px;" type="text"></span>
                                </p>
                                @endfor


                                <p class="m-0 font-weight-bold border_bottom">
                                    মেকানিকের নামঃ
                                </p>
                                <p class="m-0" style="height:125px;">আমি গাড়ি মেরামতের কাজে সন্তুষ্ট এবং গাড়ি ভালভাবে বুঝে ডেলিভারী নিলাম।
                                </p>
                                <p class="m-0 border_bottom" style="padding-left:11px; width:100%;">
                                    <span>তারিখ:</span>
                                    <span style="margin-left:400px;">গ্রাহকের স্বাক্ষর:</span>
                                </p>
                        </div>
                    </div>
                </div>

                <div style="margin-top:20px;">
                    <p class="m-0 font-weight-bold text-center border_top border_bottom" style="padding-left:11px;">
                        কাস্টমার ফিডব্যাক (সি এস আই ইনডেক্স) ফরম
                    </p>
                    <p class="m-0 border_bottom" style="padding-left:11px; border-top:0;">
                        <span style="border-right:1px solid; display: inline-block; width: 330px;">1. আমাদের সার্ভিস স্টাফদের থেকে কেমন ব্যবহার পেলেন?</span>
                        <span class="text-center" style="border-right:1px solid; display: inline-block; width: 179px;">দারুন/খুব ভাল/ভাল/মোটামুটি</span>
                        <span style="border-right:1px solid; display: inline-block; width: 467px;">4. মোটর সাইকেলের সমস্যাগুলো সমাধান হয়েছে কি?</span>
                        <span style="padding-left:15px;">হ্যাঁ/না</span>
                    </p>
                    <p class="m-0 border_bottom" style="padding-left:11px; border-top:0;">
                        <span style="border-right:1px solid; display: inline-block; width: 330px;">2. সার্ভিস সেন্টারের পরিস্কার পরিচ্ছন্নতা কেমন দেখতে পেলেন?</span>
                        <span class="text-center" style="border-right:1px solid; display: inline-block; width: 179px;">দারুন/খুব ভাল/ভাল/মোটামুটি</span>
                        <span style="border-right:1px solid; display: inline-block; width: 467px;">5. সঠিক সময়ে গাড়িটি ডেলিভারী পেয়েছেন কি?</span>
                        <span style="padding-left:15px;">হ্যাঁ/না</span>
                    </p>
                    <p class="m-0 border_bottom" style="padding-left:11px; border-top:0;">
                        <span style="border-right:1px solid; display: inline-block; width: 330px;">3. গাড়ির সম্পাদিত কাজ সম্পর্কে আপনি অবহিত আছেন কি?</span>
                        <span class="text-center" style="border-right:1px solid; display: inline-block; width: 179px;">হ্যাঁ/না</span>
                        <span style="border-right:1px solid; display: inline-block; width: 467px;">6. আপনার বন্ধু/আত্নীয়কে আমাদের সার্ভিস সেন্টারে আসতে সুপারিশ করবেন কি?</span>
                        <span style="padding-left:15px;">হ্যাঁ/না</span>
                    </p>
                    <p class="m-0 border_bottom" style="padding-left:11px; border-top:0;">
                        <span style="border-right:0; display: inline-block; width: 100%;">7. আপনার মূল্যবান পরামর্শ/মন্তব্য থাকলে লিখুন।</span>
                    </p>
                </div>

                <div class="row">
                    <div class="col-md-12 d-flex justify-content-center">
                        <div class="d-flex align-items-center p-1 border_right border_bottom" style="width:15%;">
                            <img src="{{URL('/images/uml_logo.png')}}" class="img-fluid p-1">
                        </div>
                        <div class="text-center p-1 border_right border_bottom" style="width:50%;">
                            <p class="m-0 font-weight-bold h3 border_bottom"><span class="fs-4">ডিলারের নাম: </span>বাজাজ পয়েন্ট (বাজাজ সার্ভিস সেন্টার)</p>
                            <p class="m-0 font-weight-bold">400/বি, মালিবাগ চৌধুরী পাড়া, ঢাকা-1219</p>
                            <p class="m-0 font-weight-bold">মোবাইল: 01680 365 200, 01813 551 621</p>
                        </div>
                        <div class="align-middle p-1 border_right border_bottom" style="width:20%;">
                            <p class="m-0 font-weight-bold border_bottom">জব কার্ড নং:</p>
                            <p class="m-0 font-weight-bold">জব কার্ড তারিখ:</p>
                        </div>
                        <div class="d-flex align-items-center p-1 border_bottom" style="width:15%;">
                            <img src="{{URL('/images/bajaj_logo.png')}}" class="img-fluid p-1">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p class="m-0 border_bottom" style="padding-left:11px;">
                            <span style="display:inline-block; width:375px;">গাড়ির রেজিঃ নং:</span>
                            <span class="border_right" style="display:inline-block; width:327px;">গাড়ির মডেল:</span>
                            <span>অগ্রিম:</span>
                        </p>
                        <p class="m-0" style="padding-left:11px;">
                            <span style="display:inline-block; width:375px;">ইঞ্জিন নং:</span>
                            <span class="border_right" style="display:inline-block; width:327px; height:40px;">চেসিস নং:</span>
                            <span class="border_bottom" style="display:inline-block; width:382px; height:40px;">ওয়ার্কশপ ইরচার্জ:</span>
                        </p>
                        <p class="m-0" style="padding-left:11px;">
                            <span class="border_right" style="display:inline-block; width:705px; text-align:right; height:40px; padding-right:10px;">গাড়িটি ডেলিভারীর অনুমতি দেওয়া হল।</span>
                            <span style="display:inline-block; width:382px; height:40px;">ক্যাশিয়ারের স্বাক্ষর:</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection