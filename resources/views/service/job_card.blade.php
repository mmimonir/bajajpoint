@extends('service_layouts.app')
@section('title', 'Job Card')

@push('page_css')
<style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
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

    @media print {

        .no-print,
        .no-print * {
            display: none !important;
        }
    }

    .custom_dropdown {
        height: 24px;
        width: 225px;
        border: 0px;
        font-weight: bold;
    }
</style>
@endpush
@push('page_scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>
@endpush
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <form action="#" method="POST" id="job_card_create">
            @csrf
            <div class="card" style="box-shadow:0 0 25px 0 lightgrey;">
                <div class="card-header no-print">
                    <div class="row">
                        <div class="col-md-12" style="height:32px;">
                            <h4 class="bangla_font" style="display:inline-block; width:73px;">জব কার্ড</h4>
                            <nav aria-label="Page navigation example" style="display:inline-block; width:366px;">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item active"><a class="page-link" href="#">First</a></li>
                                    <li class="page-item"><a class="page-link" href="#">Prev</a></li>
                                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                    <li class="page-item"><a class="page-link" href="#">Last</a></li>
                                    <li class="page-item"><a class="page-link" href="#">New</a></li>
                                    <input class="page-item page-link bg-dark" type="submit" value="Submit" />
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div id="print_area" class="card-body bangla_font bangla_font_light" style="width:11.5in; margin:auto; border:1px solid; padding:0; margin-top:22px; margin-bottom:22px;">
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
                                <p class="m-0 font-weight-bold border_bottom" style="height:30px;">জব কার্ড নং:<input name="job_card_no" class="job_card_no_top" name="" style="display:inline-block; height:24px; width:100px; font-weight:bold; font-size:16px; padding-left:8px;" type="text" /></p>
                                <p class="m-0 font-weight-bold">জব কার্ড তারিখ:<input name="job_card_date" class="pl-2 job_card_date_top font-weight-bold" style="display:inline-block; height:24px; width:100px;" type="date" /></p>
                            </div>
                            <div class="d-flex align-items-center p-1" style="width:15%;">
                                <img src="{{URL('/images/bajaj_logo.png')}}" class="img-fluid p-1">
                            </div>
                        </div>
                    </div>
                    <div class="para_select">
                        <div class="row">
                            <div class="col-md-4 pr-0 border_right">
                                <p class="m-0 font-weight-bold border_bottom border_top pl-1">গাড়ির বিবরণ</p>
                                <p class="m-0 border_bottom pl-1">গাড়ির রেজিঃ নম্বর:<input name="rg_number" class="ml-1 rg_number_top text-bold" style="width:69%; height:19px;" type="text"></p>
                                <div class="pl-1 m-0 border_bottom font-weight-bold">গাড়ির মডেল:
                                    <select class="custom_dropdown" name="model_code" style="width:284px;" id="mc_model_name">

                                    </select>
                                </div>
                                <!-- <p class="m-0 border_bottom pl-1">গাড়ির মডেল:
                                    <input name="mc_model_name" class="ml-1 text-bold" style="width:77%; height:19px;" type="text">
                                </p> -->
                                <div class="m-0 border_bottom pl-1">
                                    <span>বিক্রয় তারিখ:
                                        <input name="mc_sale_date" class="text-bold" style="width:30%; height:19px;" type="date">
                                    </span>
                                    <span>মাইলেজ:
                                        <input name="mileage" class="text-bold" style="width:30%; height:19px;" type="text">
                                    </span>
                                </div>
                                <p class="m-0 border_bottom pl-1">
                                    <span>ইঞ্জিন নং: <input name="engine_no" class="ml-1 engine_no_top text-bold" style="width:30%; height:19px;" type="text"></span>
                                    <span>চেসিস নং:<input name="chassis_no" class="ml-1 chassis_no_top text-bold" style="width:30%; height:19px; border:0px;" type="text"></span>
                                </p>
                                <div class="m-0 border_bottom pl-1">
                                    <span style="margin-right:50px;">সার্ভিসের ধরণ:</span>
                                    <span style="margin-right:25px;">পেইড সার্ভিস </span><input name="service_type[]" class="form-check-input service_type" type="checkbox" value="paid" id="flexCheckDefault">
                                    <span style="margin-right:25px;">ফ্রি সার্ভিস</span><input name="service_type[]" class="form-check-input service_type" type="checkbox" value="free" id="flexCheckDefault">
                                </div>
                                <p class="m-0 border_bottom pl-1">
                                    <span style="margin-right:50px;">মাইনর মেরামত</span>
                                    <input name="repair_type[]" class="form-check-input work_type" type="checkbox" value="minor" id="flexCheckDefault">
                                </p>
                                <p class="m-0 border_bottom pl-1">
                                    <span style="margin-right:50px;">মেজর মেরামত</span>
                                    <input name="repair_type[]" class="form-check-input work_type" type="checkbox" value="major" id="flexCheckDefault">
                                </p>
                                <p class="m-0 border_bottom pl-1">
                                    <span style="margin-right:50px;">ইঞ্জিন ওভারহোলিং</span>
                                    <input name="repair_type[]" class="form-check-input work_type" type="checkbox" value="engine_overhauling" id="flexCheckDefault">
                                </p>
                                <p class="m-0 border_bottom pl-1">
                                    <span style="margin-right:50px;">দূর্ঘটনাজনিত মেরামত</span>
                                    <input name="repair_type[]" class="form-check-input work_type" type="checkbox" value="accident" id="flexCheckDefault">
                                </p>
                                <p class="m-0 border_bottom pl-1 font-weight-bold">গ্রাহকের অভিযোগ</p>
                                <textarea name="customer_complain" class="" style="height:167px; width:100%; margin-bottom:-7px;" value="" id="flexCheckDefault"></textarea>
                                <p class="pl-1 m-0 border_bottom border_top font-weight-bold">মেরামতের বিবরণ</p>
                                <textarea name="repair_description" class="" style="height:192px; width:100%; margin-bottom:-7px;" value="" id="flexCheckDefault"></textarea>
                                <p class="pl-1 m-0 border_bottom border_top font-weight-bold">পরবর্তী কাজের বিবরণ<span class="font-weight-bold" style="margin-left:20px; margin-right:10px;">তারিখ</span><input name="" style="width:30%; height:19px; border:0px;" type="date"></p>
                                <textarea name="next_work_description" class="" style="height:191px; width:100%; margin-bottom:-7px;" value="" id="flexCheckDefault"></textarea>
                                <div class="pl-1 m-0 border_bottom border_top font-weight-bold">সার্ভিস ইঞ্জিনিয়ারের নামঃ
                                    <select class="custom_dropdown" name="service_engineer_id">
                                        <option value="">Mollika Akter</option>
                                    </select>
                                </div>
                                <p style="height:90px;" class="m-0 pl-1">গাড়ি মেরামতের সকল খরচ আমি নিজে বহন করব। গাড়ি মেরামতকালীন সময়ে সংরক্ষন ও টেস্ট ড্রাইভের সকল দায়িত্ব আমার।</p>
                                <p class="m-0 border_bottom" style="padding-left:11px;">
                                    <span>তারিখ:</span>
                                    <span style="margin-left:200px;">স্বাক্ষর:</span>
                                </p>
                            </div>
                            <div class="col-md-8 pl-0">
                                <p class="pl-1 border_bottom border_top m-0 font-weight-bold">গ্রাহকের নাম:<input name="client_name" class="ml-1 text-bold" style="width:89%; height:19px; border:0px;" type="text"></p>
                                <p class="pl-1 border_bottom m-0">ঠিকানা:<input name="address" class="ml-1 text-bold" style="width:93%; height:19px; border:0px;" type="text"></p>
                                <p class="pl-1 border_bottom m-0">-</p>
                                <p class="pl-1 border_bottom m-0">টেলিফোন নম্বর:<input name="mobile" class="ml-1 mobile text-bold" style="width:30%; height:19px; border:0px;" type="text"></p>
                                <p class="pl-1 border_bottom m-0 font-weight-bold">গাড়ি পর্যবেক্ষণের বিবরণ:</p>
                                <p class="pl-1 border_bottom m-0">
                                    <span>ফুয়েলের পরিমাণ:
                                        <input name="" class="ml-1" style="width:145px; height:20px; margin-right:50px;" type="text">
                                    </span>
                                    <span style="margin-right:20px;">ফুয়েল ট্যাংকে দাগ আছে কিনা?</span>
                                    <span style="margin-right:30px;">হ্যাঁ</span>
                                    <input name="any_scratch_in_tank[]" class="form-check-input fuel_tank_scratch" type="checkbox" value="yes" id="flexCheckDefault">
                                    <span style="margin-right:30px;">না</span>
                                    <input name="any_scratch_in_tank[]" class="form-check-input fuel_tank_scratch" type="checkbox" value="no" id="flexCheckDefault">
                                </p>
                                <p class="m-0 border_bottom pl-1">
                                    <span style="margin-right:20px;">ইন্ডিকেটরের লেন্স ভাঙ্গা কিনা?</span>
                                    <span style="margin-right:30px;">হ্যাঁ</span>
                                    <input name="indicator_is_broken[]" class="form-check-input indicator_lence" type="checkbox" value="yes" id="flexCheckDefault">
                                    <span style="margin-right:30px;">না</span>
                                    <input name="indicator_is_broken[]" class="form-check-input indicator_lence" type="checkbox" value="no" id="flexCheckDefault">

                                    <span style="margin-right:20px; margin-left:25px;">হেডলাইটে দাগ আছে কিনা?</span>
                                    <span style="margin-right:30px;">হ্যাঁ</span>
                                    <input name="any_scratch_in_headlight[]" class="form-check-input headlight_scratch" type="checkbox" value="yes" id="flexCheckDefault">
                                    <span style="margin-right:30px;">না</span>
                                    <input name="any_scratch_in_headlight[]" class="form-check-input headlight_scratch" type="checkbox" value="no" id="flexCheckDefault">
                                </p>
                                <p class="m-0 border_bottom font-weight-bold" style="width:100%; padding:0;">
                                    <span class="text-center border_right" style="display:inline-block; width:74px;">ক্রমিক</span>
                                    <span class="text-center border_right" style="display:inline-block; width:221px;">পার্টস আইডি</span>
                                    <span class="text-center border_right" style="display:inline-block; width:252px;">পার্টস এবং সেবার বিবরণ</span>
                                    <span class="text-center border_right" style="display:inline-block; width:74px;">পরিমাণ</span>
                                    <span‍ class="text-center" style="display:inline-block; width:104px; ">মূল্য (টাকা)</span>
                                </p>

                                @for($i=0; $i<=20; $i++) <div class="m-0" style="padding:0;">
                                    <span class="text-center border_bottom border_right" style="display:inline-block; width:74px;">{{$i+1}}</span>
                                    <span class="text-center border_bottom border_right" style="display:inline-block; width:221px;"><input name="part_id[]" id="" style="width:100%; height:19px;" type="text" value=""></span>
                                    <span class="text-center border_bottom border_right" style="display:inline-block; width:252px;"><input id="" style="width:100%; height:19px;" type="text" value=""></span>
                                    <span class="text-center border_bottom border_right" style="display:inline-block; width:74px;"><input name="quantity[]" class="text-center" id="" style="width:100%; height:19px;" type="text" value="1"></span>
                                    <span class="text-center border_bottom" style="display:inline-block; width:104px;"><input name="sale_rate[]" class="text-right total_right sum_right" id="" style="width:100%; height:19px;" type="text" value=""></span>
                            </div>
                            @endfor
                            <div class="m-0" style="padding:0;">
                                <span class="pl-1 text-left border_bottom border_right" style="display:inline-block; width:630px; height:24px;">পেইড সার্ভিস</span>
                                <span class="text-center border_bottom" style="display:inline-block; width:105px;"><input name="paid_service_charge" class="text-right total_right sum_right" id="" style="width:100%; height:19px;" type="text" value=""></span>
                            </div>
                            <!-- <div class="m-0" style="padding:0;">
                                <span class="pl-1 text-left border_bottom border_right" style="display:inline-block; width:630px; height:24px;">মোবিল</span>
                                <span class="text-center border_bottom" style="display:inline-block; width:105px;"><input name="" class="text-right total_right sum_right" id="" style="width:100%; height:19px;" type="text" value=""></span>
                            </div> -->
                            <div class="m-0" style="padding:0;">
                                <span class="text-right border_bottom pr-1 border_right" style="display:inline-block; width:630px; height:24px;">মোট = </span>
                                <span class="text-right border_bottom total_bottom" style="display:inline-block; width:105px; height:24px;"></span>
                            </div>
                            <div class="m-0" style="padding:0;">
                                <span class="text-right border_bottom pr-1 border_right" style="display:inline-block; width:630px; height:24px;">ডিসকাউন্ট =</span>
                                <span class="text-center border_bottom" style="display:inline-block; width:105px;"><input name="discount" class="text-right discount sum_right" id="" style="width:100%; height:19px;" type="text" value=""></span>
                            </div>

                            <div class="m-0" style="padding:0;">
                                <span class="pl-1 text-right pr-1 border_bottom border_right" style="display:inline-block; width:630px; height:24px;">সর্বমোট =</span>
                                <span class="text-center border_bottom" style="display:inline-block; width:105px;"><input readonly class="text-right grand_total" id="" style="width:100%; height:19px;" type="text" value=""></span>
                            </div>
                            <div class="m-0" style="padding:0;">
                                <span class="text-right border_bottom pr-1 border_right" style="display:inline-block; width:630px; height:24px;">ভ্যাট = </span>
                                <span class="text-right border_bottom" style="display:inline-block; width:105px; height:24px;"><input name="vat" class="text-right vat sum_right" id="" style="width:100%; height:19px;" type="text" value=""></span>
                            </div>
                            <div class="m-0" style="padding:0;">
                                <span class="border_bottom pl-1" style="display:inline-block; width:250px;">অগ্রীম = <input class="text-left text-bold advance_top" id="" style="height:19px;" type="text" value=""></span>
                                <span class="text-right border_bottom pr-1 border_right" style="display:inline-block; width:377px; height:24px;">বর্তমান পাওনা = </span>
                                <span class="text-right border_bottom" style="display:inline-block; width:105px; height:24px;"><input readonly class="text-right total_payable" id="" style="width:100%; height:19px;" type="text" value=""></span>
                            </div>
                            <div class="m-0" style="padding:0;">
                                <span class="border_bottom pl-1" style="display:inline-block; width:250px;">পরিশোধ = <input class="text-left text-bold paid_amount sum_right" id="" style="height:19px;" type="text" value=""></span>
                                <span class="text-right border_bottom pr-1 border_right" style="display:inline-block; width:377px; height:24px;">বাকী = </span>
                                <span class="text-right border_bottom" style="display:inline-block; width:105px; height:24px;"><input name="due_amount" readonly class="text-right due_amount" id="" style="width:100%; height:19px;" type="text" value=""></span>
                            </div>
                            <div class="m-0 font-weight-bold border_bottom pl-1">
                                মেকানিকের নামঃ
                                <select class="custom_dropdown" name="mechanic_id" style="width:200px;">
                                    <option value="">Mollika Akter</option>
                                </select>
                            </div>
                            <p class="m-0 pl-1" style="height:90px;">আমি গাড়ি মেরামতের কাজে সন্তুষ্ট এবং গাড়ি ভালভাবে বুঝে ডেলিভারী নিলাম।
                            </p>
                            <div class="m-0 border_bottom" style="padding-left:11px; width:100%;">
                                <span>তারিখ:</span>
                                <span style="margin-left:400px;">গ্রাহকের স্বাক্ষর:</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="margin-top:20px;">
                    <p class="m-0 font-weight-bold text-center border_top border_bottom">
                        কাস্টমার ফিডব্যাক (সি এস আই ইনডেক্স) ফরম
                    </p>
                    <div class="m-0 border_bottom pl-1" style="border-top:0;">
                        <span style="border-right:1px solid; display: inline-block; width: 330px;">1. আমাদের সার্ভিস স্টাফদের থেকে কেমন ব্যবহার পেলেন?</span>
                        <span class="text-center stuff_behavior_parent" style="border-right:1px solid; display: inline-block; width: 179px;">
                            <span stuff_behavior="darun" class="darun stuff_behavior">দারুন/</span>
                            <span stuff_behavior="khub_valo" class="khub_valo stuff_behavior">খুব ভাল/</span>
                            <span stuff_behavior="valo" class="valo stuff_behavior">ভাল/</span>
                            <span stuff_behavior="motamoti" class="motamoti stuff_behavior">মোটামুটি</span>
                        </span>
                        <span style="border-right:1px solid; display: inline-block; width: 467px;">4. মোটর সাইকেলের সমস্যাগুলো সমাধান হয়েছে কি?</span>
                        <span style="padding-left:34px;" class="mc_problem_solved_parent">
                            <span mc_problem_solved="yes" class="yes mc_problem_solved">হ্যাঁ/</span>
                            <span mc_problem_solved="no" class="no mc_problem_solved">না</span>
                        </span>
                    </div>
                    <div class="m-0 border_bottom pl-1" style="border-top:0;">
                        <span style="border-right:1px solid; display: inline-block; width: 330px;">2. সার্ভিস সেন্টারের পরিস্কার পরিচ্ছন্নতা কেমন দেখতে পেলেন?</span>
                        <span class="text-center service_center_is_clean_parent" style="border-right:1px solid; display: inline-block; width: 179px;">
                            <span service_center_is_clean="darun" class="darun service_center_is_clean">দারুন/</span>
                            <span service_center_is_clean="khub_valo" class="khub_valo service_center_is_clean">খুব ভাল/</span>
                            <span service_center_is_clean="valo" class="valo service_center_is_clean">ভাল/</span>
                            <span service_center_is_clean="motamoti" class="motamoti service_center_is_clean">মোটামুটি</span></span>
                        <span style="border-right:1px solid; display: inline-block; width: 467px;">5. সঠিক সময়ে গাড়িটি ডেলিভারী পেয়েছেন কি?</span>
                        <span style="padding-left:34px;" class="mc_delivery_done_parent">
                            <span mc_delivery_done="yes" class="yes mc_delivery_done">হ্যাঁ/</span>
                            <span mc_delivery_done="no" class="no mc_delivery_done">না</span>
                        </span>
                    </div>
                    <div class="m-0 border_bottom pl-1" style="border-top:0;">
                        <span style="border-right:1px solid; display: inline-block; width: 330px;">3. গাড়ির সম্পাদিত কাজ সম্পর্কে আপনি অবহিত আছেন কি?</span>
                        <span class="text-center garir_sompadito_kaj_parent" style="border-right:1px solid; display: inline-block; width: 179px;">
                            <span garir_sompadito_kaj="yes" class="yes garir_sompadito_kaj">হ্যাঁ/</span>
                            <span garir_sompadito_kaj="no" class="no garir_sompadito_kaj">না</span>
                        </span>
                        <span style="border-right:1px solid; display: inline-block; width: 467px;">6. আপনার বন্ধু/আত্নীয়কে আমাদের সার্ভিস সেন্টারে আসতে সুপারিশ করবেন কি?</span>
                        <span style="padding-left:34px;" class="recomend_our_service_center_parent">
                            <span recomend_our_service_center="yes" class="yes recomend_our_service_center">হ্যাঁ/</span>
                            <span recomend_our_service_center="no" class="no recomend_our_service_center">না</span>
                        </span>
                    </div>
                    <div class="m-0 pl-1" style="border-top:0;">
                        <span style="border-right:0; display: inline-block; height:19px;">7. আপনার মূল্যবান পরামর্শ/মন্তব্য থাকলে লিখুন।</span><textarea name="customer_suggestion" style="height:19px; width:840px; margin-bottom:-3px;"></textarea>
                    </div>
                    <div class="m-0 border_bottom" style="padding-left:375px; width:100%; padding-top:30px;">
                        <span>তারিখ:</span>
                        <span style="margin-left:400px;">গ্রাহকের স্বাক্ষর:</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 d-flex justify-content-center">
                        <div class="d-flex align-items-center p-1 border_bottom" style="width:15%; border-right:1px solid;">
                            <img src="{{URL('/images/uml_logo.png')}}" class="img-fluid p-1">
                        </div>
                        <div class="text-center p-1 border_bottom" style="width:50%; border-right:1px solid;">
                            <p class="m-0 font-weight-bold h3 border_bottom"><span class="fs-4">ডিলারের নাম: </span>বাজাজ পয়েন্ট (বাজাজ সার্ভিস সেন্টার)</p>
                            <p class="m-0 font-weight-bold">400/বি, মালিবাগ চৌধুরী পাড়া, ঢাকা-1219</p>
                            <p class="m-0 font-weight-bold">মোবাইল: 01680 365 200, 01813 551 621</p>
                        </div>
                        <div class="align-middle p-1 border_bottom" style="width:20%; border-right:1px solid;">
                            <p class="m-0 font-weight-bold border_bottom" style="height:30px;">জব কার্ড নং:<input name="" class="job_card_no_bottom" name="" style="display:inline-block; height:24px; width:100px; font-weight:bold; font-size:16px; padding-left:8px;" type="text" /></p>
                            <p class="m-0 font-weight-bold">জব কার্ড তারিখ:<input name="" class="pl-2 job_card_date_bottom font-weight-bold" style="display:inline-block; height:24px; width:100px;" type="date" /></p>
                        </div>
                        <div class="d-flex align-items-center p-1 border_bottom" style="width:15%;">
                            <img src="{{URL('/images/bajaj_logo.png')}}" class="img-fluid p-1">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="m-0 border_bottom" style="padding-left:11px;">
                            <span style="display:inline-block; width:375px;">গাড়ির রেজিঃ নং:<span style="margin-left:10px;" class="rg_number_bottom text-bold"></span></span>
                            <span class="border_right" style="display:inline-block; width:327px;">গাড়ির মডেল:</span>
                            <span>অগ্রিম:<span class="advance_bottom text-bold"></span></span>
                        </div>
                        <div class="m-0" style="padding-left:11px;">
                            <span style="display:inline-block; width:375px;">ইঞ্জিন নং:
                                <span class="engine_no_bottom text-bold"></span>
                            </span>
                            <span class="border_right" style="display:inline-block; width:327px; height:40px;">চেসিস নং:
                                <span class="chassis_no_bottom text-bold"></span>
                            </span>
                            <span class="border_bottom" style="display:inline-block; width:382px; height:40px;">ওয়ার্কশপ ইরচার্জ:</span>
                        </div>
                        <div class="m-0" style="padding-left:11px;">
                            <span class="border_right" style="display:inline-block; width:705px; text-align:right; height:40px; padding-right:10px;">গাড়িটি ডেলিভারীর অনুমতি দেওয়া হল।</span>
                            <span style="display:inline-block; width:382px; height:40px;">ক্যাশিয়ারের স্বাক্ষর:</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-header no-print">
                <div class="row">
                    <div class="col-md-12" style="height:32px;">
                        <h4 class="bangla_font" style="display:inline-block; width:73px;">জব কার্ড</h4>
                        <nav aria-label="Page navigation example" style="display:inline-block; width:366px;">
                            <ul class="pagination justify-content-center">
                                <li class="page-item active"><a class="page-link" href="#">First</a></li>
                                <li class="page-item"><a class="page-link" href="#">Prev</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                <li class="page-item"><a class="page-link" href="#">Last</a></li>
                                <li class="page-item"><a class="page-link" href="#">New</a></li>
                                <input class="page-item page-link bg-dark" type="submit" value="Submit" />
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</div>

@endsection
@section('script')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        // Input Mask Js Start
        $('.mobile').inputmask('99999-99-99-99');
        $('.rg_number_top').inputmask('99-9999');
        $('.engine_no_top').inputmask('99999');
        $('.chassis_no_top').inputmask('99999');
        // Input Mask Js End

        // Checkbox Js Start
        $('.service_type').on('change', function() {
            $('.service_type').not(this).prop('checked', false);
        });
        $('.indicator_lence').on('change', function() {
            $('.indicator_lence').not(this).prop('checked', false);
        });
        $('.headlight_scratch').on('change', function() {
            $('.headlight_scratch').not(this).prop('checked', false);
        });
        $('.fuel_tank_scratch').on('change', function() {
            $('.fuel_tank_scratch').not(this).prop('checked', false);
        });
        $('.work_type').on('change', function() {
            $('.work_type').not(this).prop('checked', false);
        });
        // Checkbox Js End


        // Customer CSI Form Start - Stuff Behaviour
        $('.stuff_behavior').on('click', function() {
            if ($('.stuff_behavior').hasClass('font-weight-bold text-primary selected_value')) {
                $('.stuff_behavior').removeClass('font-weight-bold text-primary selected_value')
            } else {
                $(this).addClass('font-weight-bold text-primary selected_value');
            }
        });
        // Customer CSI Form End  - Stuff Behaviour

        // Customer CSI Form Start - Service Center is Clean
        $('.service_center_is_clean').on('click', function() {
            if ($('.service_center_is_clean').hasClass('font-weight-bold text-primary selected_value')) {
                $('.service_center_is_clean').removeClass('font-weight-bold text-primary selected_value')
            } else {
                $(this).addClass('font-weight-bold text-primary selected_value');
            }
        });
        // Customer CSI Form End  - Service Center is Clean

        // Customer CSI Form Start - garir_sompadito_kaj
        $('.garir_sompadito_kaj').on('click', function() {
            if ($('.garir_sompadito_kaj').hasClass('font-weight-bold text-primary selected_value')) {
                $('.garir_sompadito_kaj').removeClass('font-weight-bold text-primary selected_value')
            } else {
                $(this).addClass('font-weight-bold text-primary selected_value');
            }
        });
        // Customer CSI Form End  - garir_sompadito_kaj

        // Customer CSI Form Start - mc_problem_solved
        $('.mc_problem_solved').on('click', function() {
            if ($('.mc_problem_solved').hasClass('font-weight-bold text-primary selected_value')) {
                $('.mc_problem_solved').removeClass('font-weight-bold text-primary selected_value')
            } else {
                $(this).addClass('font-weight-bold text-primary selected_value');
            }
        });
        // Customer CSI Form End  - mc_problem_solved

        // Customer CSI Form Start - mc_delivery_done
        $('.mc_delivery_done').on('click', function() {
            if ($('.mc_delivery_done').hasClass('font-weight-bold text-primary selected_value')) {
                $('.mc_delivery_done').removeClass('font-weight-bold text-primary selected_value')
            } else {
                $(this).addClass('font-weight-bold text-primary selected_value');
            }
        });
        // Customer CSI Form End  - mc_delivery_done

        // Customer CSI Form Start - recomend_our_service_center
        $('.recomend_our_service_center').on('click', function() {
            if ($('.recomend_our_service_center').hasClass('font-weight-bold text-primary selected_value')) {
                $('.recomend_our_service_center').removeClass('font-weight-bold text-primary selected_value')
            } else {
                $(this).addClass('font-weight-bold text-primary selected_value');
            }
        });
        // Customer CSI Form End  - recomend_our_service_center

        // Summation Start
        function sum_right() {
            var sum = 0;
            $('.total_right').each(function() {
                if ($(this).val() != '') {
                    sum += parseFloat($(this).val());
                }
            });
            $('.total_bottom').text(sum);
            let discount = +$('.discount').val();
            $('.grand_total').val(sum - discount);
            // $('.paid_amount').val($('.grand_total').val());
            let vat = +$('.vat').val();
            $('.total_payable').val((sum - discount) + vat);
            $('.due_amount').val($('.grand_total').val() - $('.paid_amount').val());
        }
        $('.sum_right').on('keyup', function() {
            sum_right();
        });
        sum_right();
        // Summation End

        // Repeate Data Start
        $('.job_card_no_top').on('keyup', function() {
            $('.job_card_no_bottom').val($(this).val());
        });
        $('.rg_number_top').on('keyup', function() {
            $('.rg_number_bottom').text($(this).val());
        });
        $('.engine_no_top').on('keyup', function() {
            $('.engine_no_bottom').text($(this).val());
        });
        $('.chassis_no_top').on('keyup', function() {
            $('.chassis_no_bottom').text($(this).val());
        });
        $('.job_card_date_top').on('change', function() {
            $('.job_card_date_bottom').val($(this).val());
        });
        $('.advance_top').on('keyup', function() {
            $('.advance_bottom').text($(this).val());
        });
        // Repeate Data End

        // Preload Default Select Option Start
        $('.stuff_behavior_parent').find('.khub_valo').addClass('font-weight-bold text-primary selected_value');
        $('.service_center_is_clean_parent').find('.khub_valo').addClass('font-weight-bold text-primary selected_value');
        $('.garir_sompadito_kaj_parent').find('.yes').addClass('font-weight-bold text-primary selected_value');
        $('.mc_problem_solved_parent').find('.yes').addClass('font-weight-bold text-primary selected_value');
        $('.mc_delivery_done_parent').find('.yes').addClass('font-weight-bold text-primary selected_value');
        $('.recomend_our_service_center_parent').find('.yes').addClass('font-weight-bold text-primary selected_value');
        // Preload Default Select Option End

        // Preload Dafault Value Start
        function load_basic_data() {
            $.ajax({
                url: "{{ route('job_card.load_basic_data') }}",
                method: 'get',
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function({
                    vehicle
                }) {
                    if (vehicle.length > 0) {
                        vehicle.forEach(function(item) {
                            $("#mc_model_name").append(`<option value="${item.model_code}">${item.model}</option>`);
                        });
                    } else {

                    }
                }
            });
        }
        load_basic_data();
        // Preload Dafault Value End

        // Submit Create Job Card Start
        $("#job_card_create").submit(function(e) {
            e.preventDefault();
            const FD = new FormData(this);
            let stuff_behavior = $('.stuff_behavior_parent').find('.selected_value').attr('stuff_behavior');
            let service_center_is_clean = $('.service_center_is_clean_parent').find('.selected_value').attr('service_center_is_clean');
            let garir_sompadito_kaj = $('.garir_sompadito_kaj_parent').find('.selected_value').attr('garir_sompadito_kaj');
            let mc_problem_solved = $('.mc_problem_solved_parent').find('.selected_value').attr('mc_problem_solved');
            let mc_delivery_done = $('.mc_delivery_done_parent').find('.selected_value').attr('mc_delivery_done');
            let recomend_our_service_center = $('.recomend_our_service_center_parent').find('.selected_value').attr('recomend_our_service_center');
            FD.append('stuff_behavior', stuff_behavior);
            FD.append('service_center_is_clean', service_center_is_clean);
            FD.append('garir_sompadito_kaj', garir_sompadito_kaj);
            FD.append('mc_problem_solved', mc_problem_solved);
            FD.append('mc_delivery_done', mc_delivery_done);
            FD.append('recomend_our_service_center', recomend_our_service_center);

            $.ajax({
                url: "{{ route('job_card.create') }}",
                method: 'post',
                data: FD,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    if (response.status == 200) {

                        // Swal.fire({
                        //     icon: 'success',
                        //     title: response.message,
                        //     showConfirmButton: false,
                        //     timer: 2000
                        // })
                        // $('#job_card_create').trigger("reset");
                    } else {
                        // Swal.fire({
                        //     icon: 'error',
                        //     title: 'Oops...',
                        //     text: response.message,
                        //     footer: '<a href="">Why do I have this issue?</a>'
                        // })

                    }
                }
            });
        });
        // Submit Create Job Card End

    });
</script>
@endsection