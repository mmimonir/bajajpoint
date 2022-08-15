@extends('service_layouts.app')
@section('title', 'Job Card')

@push('page_css')
<style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    .disable {
        pointer-events: none;
    }

    a.disabled {
        pointer-events: none;
        cursor: default;
    }

    .pending {
        position: absolute;
        top: 142px;
        left: 685px;
        opacity: 0.2;
        filter: alpha(opacity=50);
        width: 28%;
        z-index: 1;
        transform: rotate(-4deg);
    }

    .delivered {
        position: absolute;
        left: 685px;
        opacity: 0.2;
        filter: alpha(opacity=50);
        width: 26%;
        z-index: 1;
        top: 114px;
        transform: rotate(7deg);
    }

    .pointer {
        cursor: pointer;
    }

    a.disabled {
        pointer-events: none;
        cursor: default;
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

        .print-ok {
            width: 148px !important;

        }

        .print-scale {
            transform: scale(0.93);
            transform-origin: top left;

        }
    }

    .custom_dropdown {
        height: 24px;
        width: 225px;
        border: 0px;
        font-weight: bold;
    }

    .error {
        color: #FF0000;
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
        <!-- <form action="{{route('job_card.create')}}" method="post" id="job_card_create"> -->
        <form action="#" method="POST" id="job_card_create">
            @csrf
            <input type="hidden" name="job_card_id" id="job_card_id" value="">
            <input type="hidden" name="request_from" id="request_from" value="">
            <input type="hidden" name="service_customer_id" id="service_customer_id" value="">
            <div class="card" style="box-shadow:0 0 25px 0 lightgrey;">
                <div class="card-header no-print">
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-center" style="height:32px;">
                            <h4 class="bangla_font" style="display:inline-block; width:94px; margin-top:5px;">জব কার্ড</h4>
                            <nav aria-label="Page navigation example" style="padding-left:15px;">
                                <ul class="pagination justify-content-center" id="top_navbar">
                                    <li class="page-item active"><a class="page-link first_jb_record" href="#">First</a></li>
                                    <li class="page-item"><a class="page-link previous_jb_record" href="#">Prev</a></li>
                                    <li class="page-item"><a class="page-link next_jb_record" href="#">Next</a></li>
                                    <li class="page-item"><a class="page-link last_jb_record" href="#">Last</a></li>
                                    <li class="page-item"><a class="page-link new_jb_record bg-success" href="#">New</a></li>
                                    <li class="page-item print"><a class="page-link" href="#">Print</a></li>
                                    <button class="page-item page-link bg-dark" type="submit" id="create_jb_top">Create JB</button>
                                    <a href="#" class="page-item page-link bg-secondary disable" id="delivery_done_top">Delivery Done</a>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="card-header no-print">
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-center" style="height:22px; width:950px; margin:auto;">
                            <div class="d-flex justify-content-center" style="align-items:baseline; margin-left:15px; width:475px;">
                                <label style="margin-right:10px;">Job Card List</label>
                                <select name="job_card_list" style="font-weight: bold; background:#F7F7F7; border-radius:5px; width:238px;" id="job_card_list">

                                </select>
                            </div>
                            <div class="d-flex justify-content-center" style="align-items:baseline; margin-left:15px; width:475px;">
                                <label>Job Card Date</label>
                                <input type="date" id="job_card_date_search" style="margin-left:5px; margin-right:5px; background:#F7F7F7; width:100px;">
                                <select style="font-weight: bold; background:#F7F7F7; border-radius:5px; width:238px;" id="job_card_list_search">
                                    <option style="font-weight:bold;" value="">Job Card List</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="print_area" class="card-body bangla_font bangla_font_light print-scale" style="width:11.5in; margin:auto; border:1px solid; padding:0;">
                    <div id="pending_png">

                    </div>
                    <div id="delivered_png">

                    </div>
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
                                <p class="m-0 font-weight-bold border_bottom" style="height:30px;">জব কার্ড নং:<input name="job_card_no" class="job_card_no_top" style="display:inline-block; height:24px; width:100px; font-weight:bold; font-size:16px; padding-left:8px;" type="text" /></p>
                                <p class="m-0 font-weight-bold">জব কার্ড তারিখ:<input name="job_card_date" id="job_card_date" class="pl-2 job_card_date_top font-weight-bold" style="display:inline-block; height:24px; width:100px;" type="date" /></p>
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
                                <div class="pl-1 m-0 border_bottom font-weight-bold" style="height:24px;">গাড়ির মডেল:
                                    <select class="custom_dropdown" name="model_code" style="width:284px; height:21px;" id="mc_model_name">
                                        <option value="">Please Select A Model</option>
                                    </select>
                                </div>
                                <!-- <p class="m-0 border_bottom pl-1">গাড়ির মডেল:
                                    <input name="mc_model_name" class="ml-1 text-bold" style="width:77%; height:19px;" type="text">
                                </p> -->
                                <div class="m-0 border_bottom pl-1" style="height:25px;">
                                    <span>বিক্রয় তারিখ:
                                        <input name="mc_sale_date" class="text-bold mc_sale_date" style="width:30%; height:19px;" type="date">
                                    </span>
                                    <span>মাইলেজ:
                                        <input name="mileage" class="text-bold mileage" id="mileage" style="width:30%; height:19px;" type="text">
                                    </span>
                                </div>
                                <p class="m-0 border_bottom pl-1">
                                    <span>ইঞ্জিন নং: <input name="engine_no" class="ml-1 engine_no_top text-bold" style="width:30%; height:19px;" type="text"></span>
                                    <span>চেসিস নং:<input name="chassis_no" class="ml-1 chassis_no_top text-bold" style="width:30%; height:19px; border:0px;" type="text"></span>
                                </p>
                                <div class="m-0 border_bottom pl-1" style="height:24px;">
                                    <span style="margin-right:25px;">সার্ভিসের ধরণ:</span>
                                    <select class="custom_dropdown" name="service_type" style="width:255px; height:21px;" id="service_type">
                                        <option value="">Please Select A Service Type</option>
                                        <option value="paid">Paid Service</option>
                                        <option value="first_free">1st Free Service</option>
                                        <option value="second_free">2nd Free Service</option>
                                        <option value="third_free">3rd Free Service</option>
                                        <option value="fourth_free">4th Free Service</option>
                                    </select>
                                </div>
                                <div class="m-0 border_bottom pl-1" style="height:24px;">
                                    <span style="margin-right:25px;">কাজের ধরণ:</span>
                                    <select class="custom_dropdown" name="work_type" style="width:262px; height:21px;" id="work_type">
                                        <option value="">Please Select A Service Type</option>
                                        <option value="minor">মাইনর মেরামত</option>
                                        <option value="major">মেজর মেরামত</option>
                                        <option value="engine_overhauling">ইঞ্জিন ওভারহোলিং</option>
                                        <option value="accident">দূর্ঘটনাজনিত মেরামত</option>
                                    </select>
                                </div>

                                <p class="m-0 border_bottom pl-1 font-weight-bold" style="height:24px;">গ্রাহকের অভিযোগ</p>
                                <textarea name="customer_complain" class="" style="height:238px; width:100%; margin-bottom:-7px; padding:4px;" value="" id="customer_complain"></textarea>
                                <p class="pl-1 m-0 border_bottom border_top font-weight-bold">মেরামতের বিবরণ</p>
                                <textarea name="repair_description" class="" style="height:192px; width:100%; margin-bottom:-7px; padding:4px;" value="" id="repair_description"></textarea>
                                <p class="pl-1 m-0 border_bottom border_top font-weight-bold">পরবর্তী কাজের বিবরণ<span class="font-weight-bold" style="margin-left:20px; margin-right:10px;">তারিখ</span>
                                    <input name="next_work_date" id="next_work_date" style="width:30%; height:19px; border:0px;" type="date">
                                </p>
                                <textarea name="next_work_description" class="" style="height:191px; width:100%; margin-bottom:-7px; padding:4px;" value="" id="next_work_description"></textarea>
                                <div class="pl-1 m-0 border_bottom border_top font-weight-bold">সার্ভিস ইঞ্জিনিয়ারের নামঃ
                                    <select class="custom_dropdown load_employee" name="service_engineer_id" id="service_engineer_id">

                                    </select>
                                </div>
                                <p style="height:90px;" class="m-0 pl-1">গাড়ি মেরামতের সকল খরচ আমি নিজে বহন করব। গাড়ি মেরামতকালীন সময়ে সংরক্ষন ও টেস্ট ড্রাইভের সকল দায়িত্ব আমার।</p>
                                <p class="m-0 border_bottom" style="padding-left:11px;">
                                    <span>তারিখ:</span>
                                    <span style="margin-left:200px;">স্বাক্ষর:</span>
                                </p>
                            </div>
                            <div class="col-md-8 pl-0">
                                <p class="pl-1 border_bottom border_top m-0 font-weight-bold">টেলিফোন নম্বর:<input name="client_mobile" id="mobile" class="ml-1 text-bold mobile required" style="width:81px; height:19px; border:0px;" type="text"></p>
                                <p class="pl-1 border_bottom m-0 font-weight-bold">গ্রাহকের নাম:<input name="client_name" id="client_name" class="ml-1 text-bold client_name required" style="width:89%; height:19px; border:0px;" type="text"></p>
                                <p class="pl-1 border_bottom m-0">ঠিকানা:<input name="client_address" class="ml-1 text-bold address" id="address" style="width:93%; height:19px; border:0px;" type="text"></p>
                                <p class="pl-1 border_bottom m-0">-</p>
                                <!-- <p class="pl-1 border_bottom m-0">টেলিফোন নম্বর:<input name="mobile" class="ml-1 mobile text-bold" style="width:30%; height:19px; border:0px;" type="text"></p> -->
                                <p class="pl-1 border_bottom m-0 font-weight-bold">গাড়ি পর্যবেক্ষণের বিবরণ:</p>
                                <div class="pl-1 border_bottom m-0" style="height:24px;">
                                    <span>ফুয়েলের পরিমাণ:
                                        <input name="amount_of_fuel" class="ml-1 amount_of_fuel" style="width:145px; height:20px; margin-right:50px;" type="text">
                                    </span>
                                    <span style="margin-right:25px;">ফুয়েল ট্যাংকে দাগ আছে কিনা?</span>
                                    <select class="custom_dropdown" name="any_scratch_in_tank" style="width:36px; height:21px;" id="any_scratch_in_tank">
                                        <option value="no">না</option>
                                        <option value="yes">হ্যাঁ</option>
                                    </select>
                                </div>
                                <div class="m-0 border_bottom pl-1" style="height:24px;">
                                    <span style="margin-right:20px;">ইন্ডিকেটরের লেন্স ভাঙ্গা কিনা?</span>
                                    <select class="custom_dropdown" name="indicator_is_broken" style="width:36px; height:21px;" id="indicator_is_broken">
                                        <option value="no">না</option>
                                        <option value="yes">হ্যাঁ</option>
                                    </select>
                                    <span style="margin-right:20px; margin-left:25px;">হেডলাইটে দাগ আছে কিনা?</span>
                                    <select class="custom_dropdown" name="any_scratch_in_headlight" style="width:36px; height:21px;" id="any_scratch_in_headlight">
                                        <option value="no">না</option>
                                        <option value="yes">হ্যাঁ</option>
                                    </select>
                                </div>
                                <div class="m-0 border_bottom font-weight-bold" style="width:100%; padding:0;">
                                    <span class="text-center border_right" style="display:inline-block; width:74px;">ক্রমিক</span>
                                    <span class="text-center border_right" style="display:inline-block; width:180px;">পার্টস আইডি</span>
                                    <span class="text-center border_right" style="display:inline-block; width:249px;">পার্টস এবং সেবার বিবরণ</span>
                                    <span class="text-center border_right" style="display:inline-block; width:74px;">পরিমাণ</span>
                                    <span class="text-center border_right print-ok" style="display:inline-block; width:104px;">মূল্য (টাকা)</span>
                                    <span‍ class="text-center no-print" style="display:inline-block; width:41px;">Action</span>
                                </div>
                                <div id="spare_parts">

                                    @for($i=0; $i<=20; $i++) <div class="m-0 parts_item" style="padding:0;">
                                        <span class="text-center border_bottom border_right" style="display:inline-block; width:74px;">{{$i+1}}</span>
                                        <span class="text-center border_bottom border_right" style="display:inline-block; width:180px;"><input name="part_id[]" id="part_id" class="part_id" style="width:100%; height:19px;" type="text" value=""></span>
                                        <span class="text-center border_bottom border_right" style="display:inline-block; width:249px;"><input class="description" style="width:100%; height:19px;" type="text" value=""></span>
                                        <span class="text-center border_bottom border_right" style="display:inline-block; width:74px;"><input name="quantity[]" class="text-center quantity" style="width:100%; height:19px;" type="text" value=""></span>
                                        <span class="text-center border_bottom border_right print-ok" style="display:inline-block; width:104px;"><input name="sale_rate[]" class="text-right total_right sum_right sale_rate" style="width:100%; height:19px; padding-right:3px;" type="text" value=""></span>
                                        <span class="text-center border_bottom delete_icon no-print" style="display:inline-block; width:41px;"><a href="#" class="disabled delete_parts_item"><i class="fa fa-trash delete_icon text-secondary"></i></a></span>
                                        <input type="hidden" name="id" class="id" value="">
                                        <input type="hidden" name="rate[]" class="rate" value="">
                                </div>
                                @endfor
                            </div>
                            <div class="m-0" style="padding:0;">
                                <span class="pl-1 text-left border_bottom border_right" style="display:inline-block; width:630px; height:24px;">পেইড সার্ভিস</span>
                                <span class="text-center border_bottom" style="display:inline-block; width:105px;"><input name="paid_service_charge" class="text-right total_right sum_right" id="paid_service" style="width:100%; height:19px; padding-right:3px;" type="text" value=""></span>
                            </div>
                            <div class="m-0" style="padding:0;">
                                <span class="text-right border_bottom pr-1 border_right" style="display:inline-block; width:630px; height:24px;">মোট = </span>
                                <span class="text-right border_bottom total_bottom" style="display:inline-block; width:105px; height:24px; padding-right:3px;"></span>
                            </div>
                            <div class="m-0" style="padding:0;">
                                <span class="text-right border_bottom pr-1 border_right" style="display:inline-block; width:630px; height:24px;">ডিসকাউন্ট =</span>
                                <span class="text-center border_bottom" style="display:inline-block; width:105px;"><input name="discount" class="text-right discount sum_right" id="discount" style="width:100%; height:19px; padding-right:3px;" type="text" value=""></span>
                            </div>

                            <div class="m-0" style="padding:0;">
                                <span class="pl-1 text-right pr-1 border_bottom border_right" style="display:inline-block; width:630px; height:24px;">সর্বমোট =</span>
                                <span class="text-center border_bottom" style="display:inline-block; width:105px;"><input readonly class="text-right grand_total" id="" style="width:100%; height:19px; padding-right:3px;" type="text" value=""></span>
                            </div>
                            <div class="m-0" style="padding:0;">
                                <span class="text-right border_bottom pr-1 border_right" style="display:inline-block; width:630px; height:24px;">ভ্যাট = </span>
                                <span class="text-right border_bottom" style="display:inline-block; width:105px; height:24px;"><input name="vat" class="text-right vat sum_right" id="" style="width:100%; height:19px; padding-right:3px;" type="text" value=""></span>
                            </div>
                            <div class="m-0" style="padding:0;">
                                <span class="border_bottom pl-1" style="display:inline-block; width:250px;">অগ্রীম = <input class="text-left text-bold advance_top" id="advance_top" name="advance_top" style="height:19px;" type="text" value=""></span>
                                <span class="text-right border_bottom pr-1 border_right" style="display:inline-block; width:377px; height:24px;">বর্তমান পাওনা = </span>
                                <span class="text-right border_bottom" style="display:inline-block; width:105px; height:24px;"><input readonly class="text-right total_payable" id="total_payable" style="width:100%; height:19px; padding-right:3px;" type="text" value=""></span>
                            </div>
                            <div class="m-0" style="padding:0;">
                                <span class="border_bottom pl-1" style="display:inline-block; width:250px;">পরিশোধ = <input class="text-left text-bold paid_amount sum_right" id="paid_amount" style="height:19px;" type="text" value=""></span>
                                <span class="text-right border_bottom pr-1 border_right" style="display:inline-block; width:377px; height:24px;">বাকী = </span>
                                <span class="text-right border_bottom" style="display:inline-block; width:105px; height:24px;"><input name="due_amount" readonly class="text-right due_amount" id="due_amount" style="width:100%; height:19px; padding-right:3px;" type="text" value=""></span>
                            </div>
                            <div class="m-0 font-weight-bold border_bottom pl-1">
                                মেকানিকের নামঃ
                                <select class="custom_dropdown load_employee" name="mechanic_id" id="mechanic_id" style="width:200px;">

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

                    <div style="margin-top:20px;">
                        <p class="m-0 font-weight-bold text-center border_top border_bottom">
                            কাস্টমার ফিডব্যাক (সি এস আই ইনডেক্স) ফরম
                        </p>
                        <div class="m-0 border_bottom pl-1" style="border-top:0;">
                            <span style="border-right:1px solid; display: inline-block; width: 330px;">1. আমাদের সার্ভিস স্টাফদের থেকে কেমন ব্যবহার পেলেন?</span>
                            <div style="display:inline-block; width: 179px;" class="text-center border_right">
                                <select class="custom_dropdown" name="stuff_behavior" style="width:72px; height:21px;" id="stuff_behavior">
                                    <option value="khub_valo">খুব ভাল</option>
                                    <option value="darun">দারুন</option>
                                    <option value="valo">ভাল</option>
                                    <option value="motamoti">মোটামুটি</option>
                                </select>
                            </div>
                            <span style="border-right:1px solid; display: inline-block; width: 467px;">4. মোটর সাইকেলের সমস্যাগুলো সমাধান হয়েছে কি?</span>
                            <div style="display:inline-block; width: 112px;" class="text-center">
                                <select class="custom_dropdown" name="mc_problem_solved" style="width:37px; height:21px;" id="mc_problem_solved">
                                    <option value="yes">হ্যাঁ</option>
                                    <option value="no">না</option>
                                </select>
                            </div>
                        </div>
                        <div class="m-0 border_bottom pl-1" style="border-top:0;">
                            <span style="border-right:1px solid; display: inline-block; width: 330px;">2. সার্ভিস সেন্টারের পরিস্কার পরিচ্ছন্নতা কেমন দেখতে পেলেন?</span>
                            <div style="display:inline-block; width: 179px;" class="text-center border_right">
                                <select class="custom_dropdown" name="service_center_is_clean" style="width:72px; height:21px;" id="service_center_is_clean">
                                    <option value="khub_valo">খুব ভাল</option>
                                    <option value="darun">দারুন</option>
                                    <option value="valo">ভাল</option>
                                    <option value="motamoti">মোটামুটি</option>
                                </select>
                            </div>
                            <span style="border-right:1px solid; display: inline-block; width: 467px;">5. সঠিক সময়ে গাড়িটি ডেলিভারী পেয়েছেন কি?</span>
                            <div style="display:inline-block; width: 112px;" class="text-center">
                                <select class="custom_dropdown" name="mc_delivery_done" style="width:37px; height:21px;" id="mc_delivery_done">
                                    <option value="yes">হ্যাঁ</option>
                                    <option value="no">না</option>
                                </select>
                            </div>
                        </div>
                        <div class="m-0 border_bottom pl-1" style="border-top:0;">
                            <span style="border-right:1px solid; display: inline-block; width: 330px;">3. গাড়ির সম্পাদিত কাজ সম্পর্কে আপনি অবহিত আছেন কি?</span>
                            <div style="display:inline-block; width: 179px;" class="text-center border_right">
                                <select class="custom_dropdown" name="garir_sompadito_kaj" style="width:72px; height:21px;" id="garir_sompadito_kaj">
                                    <option value="yes">হ্যাঁ</option>
                                    <option value="no">না</option>
                                </select>
                            </div>
                            <span style="border-right:1px solid; display: inline-block; width: 467px;">6. আপনার বন্ধু/আত্নীয়কে আমাদের সার্ভিস সেন্টারে আসতে সুপারিশ করবেন কি?</span>
                            <div style="display:inline-block; width: 112px;" class="text-center">
                                <select class="custom_dropdown" name="recomend_our_service_center" style="width:37px; height:21px;" id="recomend_our_service_center">
                                    <option value="yes">হ্যাঁ</option>
                                    <option value="no">না</option>
                                </select>
                            </div>
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
                                <span class="border_right" style="display:inline-block; width:327px;">গাড়ির মডেল: <span class="mc_model_bottom text-bold"></span></span>
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
            </div>
            <div class="card-header no-print">
                <div class="row">
                    <div class="col-md-12 d-flex justify-content-center" style="height:32px;">
                        <h4 class="bangla_font" style="display:inline-block; width:94px; margin-top:5px;">জব কার্ড</h4>
                        <nav aria-label="Page navigation example" style="display:inline-block; width:100%;">
                            <ul class="pagination justify-content-center" id="bottom_navbar">
                                <li class="page-item active"><a class="page-link first_jb_record" href="#">First</a></li>
                                <li class="page-item"><a class="page-link previous_jb_record" href="#">Prev</a></li>
                                <li class="page-item"><a class="page-link next_jb_record" href="#">Next</a></li>
                                <li class="page-item"><a class="page-link last_jb_record" href="#">Last</a></li>
                                <li class="page-item"><a class="page-link new_jb_record bg-success" href="#">New</a></li>
                                <li class="page-item print"><a class="page-link" href="#">Print</a></li>
                                <button class="page-item page-link bg-dark" type="submit" id="create_jb_bottom">Create JB</button>
                                <a href="#" class="page-item page-link bg-secondary disable" id="delivery_done_bottom">Delivery Done</a>
                                <!-- <a href="#" class="print_bill page-item page-link bg-secondary disable" id="print_bill">Print Bill</a> -->
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
@section('script')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $('#request_from').val('job_card_page');
        // Input Mask Js Start
        $('.mobile').inputmask('99999999999');
        // $('.rg_number_top').inputmask('99-9999');
        $('.engine_no_top').inputmask('99999');
        $('.chassis_no_top').inputmask('99999');
        // Input Mask Js End

        // Check cusomer is already exist or not start
        $('.mobile').on('change', function() {
            var mobile = $(this).val();
            $.ajax({
                url: "{{route('job_card.check_customer')}}",
                type: "GET",
                data: {
                    mobile: mobile,
                },
                success: function(response) {
                    if (response.job_card_no) {
                        $('.job_card_no_top').val(response.job_card_no).trigger('change');
                        $('.job_card_no_bottom').val(response.job_card_no).trigger('change');
                        $('#create_jb_bottom').html('Update JB');
                        $('#create_jb_top').html('Update JB');
                    }

                    if (response.status === 'service') {
                        $('.client_name').val(response.service_data.client_name);
                        $('.mobile').val(response.service_data.mobile);
                        $('.address').val(response.service_data.address);
                        $('.engine_no_top').val(response.service_data.engine_no).trigger('change');
                        $('.chassis_no_top').val(response.service_data.chassis_no).trigger('change');
                        $('.mc_sale_date').val(response.service_data.mc_sale_date);
                        $('#service_customer_id').val(response.service_data.id);
                        $('.rg_number_top').val(response.service_data.rg_number).trigger('change');
                        $('#mc_model_name').val(response.service_data.model_code).trigger('change');
                    }
                    if (response.status === 'showroom') {

                        $('.client_name').val(response.showroom_data.customer_name);
                        $('.mobile').val(response.showroom_data.mobile);
                        $('.address').val(response.showroom_data.address_two);
                        $('.engine_no_top').val(response.showroom_data.five_engine).trigger('change');
                        $('.chassis_no_top').val(response.showroom_data.five_chassis).trigger('change');
                        $('.mc_sale_date').val(response.showroom_data.original_sale_date);
                        $('.rg_number_top').val(response.showroom_data.rg_number).trigger('change');
                        $('#mc_model_name').val(response.showroom_data.model_code).trigger('change');
                    }
                }
            });
        });
        // Check cusomer is already exist or not end

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

            $('.grand_total').val((sum - discount));
            let vat = +$('.vat').val();
            $('.total_payable').val((sum - discount) + vat);
            $('.paid_amount').val((sum - discount) + vat);
            $('.due_amount').val($('.total_payable').val() - $('.paid_amount').val());
        }
        $('.sum_right').on('change', function() {
            sum_right();
        });
        $('.paid_amount').on('change', function() {
            sum_right();
        });
        sum_right();
        // Summation End

        // change parts sale quantiry start
        $('.quantity').on('focus', function() {
            $(this).on('change', function() {
                _this = $(this).parent().parent();
                var quantity = _this.find('.quantity').val();
                var sale_rate = _this.find('.sale_rate').val();
                var total = quantity * sale_rate;
                _this.find('.sale_rate').val(total).trigger("change");
                $('.paid_amount').val($('.total_payable').val()).trigger("change");
            });
        });
        $('#paid_service').on('change', function() {
            $('.paid_amount').val($('.grand_total').val()).trigger("change");
        });
        $('.discount').on('change', function() {
            $('.paid_amount').val($('.grand_total').val()).trigger("change");
        });
        $('.vat').on('change', function() {
            $('.paid_amount').val($('.total_payable').val()).trigger("change");
            $('.due_amount').val($('.total_payable').val() - $('.paid_amount').val());
        });
        // change parts sale quantiry end

        // Repeate Data Start
        $('.job_card_no_top').on('keyup', function() {
            $('.job_card_no_bottom').val($(this).val());
        });
        $('.rg_number_top').on('change', function() {
            $('.rg_number_bottom').text($(this).val());
        });
        $('.engine_no_top').on('change', function() {
            $('.engine_no_bottom').text($(this).val());
        });
        $('.chassis_no_top').on('change', function() {
            $('.chassis_no_bottom').text($(this).val());
        });
        $('.job_card_date_top').on('change', function() {
            $('.job_card_date_bottom').val($(this).val());
        });
        $('.advance_top').on('keyup', function() {
            $('.advance_bottom').text($(this).val());
        });
        // Repeat Data End

        // Preload Default Value for Vehicle Model Name Start
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
        // Preload Default Value for Vehicle Model Name End

        // Assign Job Card Sl No Start
        function assign_job_card_sl_no() {
            $.ajax({
                url: "{{ route('job_card.assign_job_card_sl_no') }}",
                method: 'get',
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(new_job_card_no) {
                    $('.job_card_no_top').val(new_job_card_no);
                    $('.job_card_date_top').val(new Date().toISOString().substr(0, 10));
                    $('.job_card_date_bottom').val(new Date().toISOString().substr(0, 10));
                    $('.job_card_no_bottom').val(new_job_card_no);
                }
            });
        }
        assign_job_card_sl_no();
        // Assign Job Card Sl No End

        // Detect pc window screen and add class sidebar-collapse to body Start
        if ($(window).innerWidth() < 1367) {
            $('body').addClass('sidebar-collapse');
        } else {
            $('body').hasClass('sidebar-collapse');
            $('body').removeClass('sidebar-collapse');
        }
        // Detect pc window screen and add class sidebar-collapse to body End

        // Search by part id start
        $('.part_id').on("focus", function() {
            $(this).autocomplete({
                minLength: 4,
                source: function(request, response) {
                    $.ajax({
                        url: "{{ route('job_card.search_by_part_id') }}",
                        type: 'GET',
                        dataType: "json",
                        data: {
                            part_id: request.term
                        },
                        success: function(data) {
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    $(this).val(ui.item.label);
                    return false;
                },
                change: function() {
                    _this = $(this).parent().parent();
                    var part_id = $(this).val();
                    $.ajax({
                        url: "{{ route('job_card.search_by_full_part_id') }}",
                        type: 'GET',
                        dataType: "json",
                        data: {
                            part_id: part_id
                        },
                        success: function(data) {
                            if (data.stock_quantity > 0) {
                                _this.find('.description').val(data.part_name)
                                _this.find('.quantity').val(1)
                                _this.find('.rate').val(data.rate)
                                _this.find('.sale_rate').val(data.rate).trigger("change")
                                $('.paid_amount').val($('.total_payable').val()).trigger("change");
                                _this.find('.delete_parts_item').removeClass('disabled');
                                _this.find('.delete_icon').addClass('text-danger');
                                // _this.find('.delete_icon').append('<i class="fa fa-trash text-danger pointer delete_parts_item" aria-hidden="true"></i>');
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Not enough stock, please update stock first',
                                    footer: '<a href="">Why do I have this issue?</a>'
                                })
                            }
                        }
                    });
                }
            });
        });
        // Search by part id end

        // Update spare parts' table in front end start
        $('.sale_rate').on('change', function() {
            _this = $(this).parent().parent();
            var part_id = _this.find('.part_id').val();
            var job_card_date = $('.job_card_date_top').val();
            var job_card_no = $('.job_card_no_top').val();
            var quantity = _this.find('.quantity').val();
            var sale_rate = _this.find('.sale_rate').val();
            let customer_id = $('#service_customer_id').val();
            let job_card_id = $('#job_card_id').val();

            if (part_id !== '' && job_card_date !== '' && quantity !== '' && sale_rate !== '') {
                $.ajax({
                    url: "{{ route('job_card.create_or_update') }}",
                    type: 'GET',
                    dataType: "json",
                    data: {
                        part_id,
                        job_card_date,
                        quantity,
                        sale_rate,
                        job_card_no,
                        customer_id,
                        job_card_id,
                        request_from: 'job_card_page'
                    },
                    success: function(data) {
                        _this.find('.id').val(data.id);
                    }
                });
            }

        });
        // Update spare parts' table in frontend end

        // Bottom Model Name Update Start
        $('#mc_model_name').on('change', function() {
            let model_name = $("#mc_model_name option:selected").text();
            $('.mc_model_bottom').text(model_name);
        })
        $('.print').click(function() {
            window.print();
        });
        // Bottom Model Name Update End

        // Load employee Data Start
        function load_employee_data() {
            $.ajax({
                url: "{{ route('job_card.load_employee_data') }}",
                method: 'get',
                dataType: 'json',
                success: function({
                    employee
                }) {
                    if (employee.length > 0) {
                        employee.forEach(function(item) {
                            $(".load_employee").append(`<option value="${item.id}">${item.name}</option>`);
                        });
                    } else {

                    }
                }
            });
        }
        load_employee_data();
        // Load employee Data End

        // Submit Create Job Card Start
        $("#job_card_create").submit(function(e) {
            e.preventDefault();
            const FD = new FormData(this);

            if ($("#job_card_create").valid()) {
                $.ajax({
                    url: "{{ route('job_card.create') }}",
                    method: 'post',
                    data: FD,
                    dataType: 'json',
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.status === 200) {
                            Swal.fire({
                                icon: 'success',
                                title: response.message,
                                showConfirmButton: false,
                                timer: 2000
                            })
                            // $('#job_card_create').trigger("reset");
                            // assign_job_card_sl_no();
                            $("#create_jb_top").html('Update JB');
                            $("#create_jb_bottom").html('Update JB');
                            $('#pending_png').empty();
                            $('#pending_png').append('<img src="{{ asset("images/pending.png") }}" alt="pending" class="img-fluid p-1 pending">');
                            $("#service_customer_id").val(response.service_customer_id);
                            $("#job_card_list").empty();
                            $("#job_card_list").append(`<option style="font-weight:bold;" value="">Job Card List</option>`);
                            load_job_card_list();
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: response.message,
                                footer: '<a href="">Why do I have this issue?</a>'
                            })

                        }
                    }
                });
            }
        });
        // Submit Create Job Card End


        // Delivery Done Start
        $("#delivery_done_top, #delivery_done_bottom").click(function(ev) {
            let part_id = [];
            let quantity = [];
            let sale_rate = [];
            let rate = [];
            let job_card_id = $('#job_card_id').val();
            let discount = $('#discount').val();
            let paid_service_charge = $('#paid_service').val();
            let due_amount = $('#due_amount').val();
            let service_customer_id = $('#service_customer_id').val();
            let bill_date = $('#job_card_date').val();
            let request_from = $('#request_from').val();
            let client_name = $('#client_name').val();
            let client_mobile = $('#mobile').val();
            let client_address = $('#address').val();

            $("input[name='part_id[]']").each(function() {
                if ($(this).val() !== '') {
                    part_id.push($(this).val());
                }
            });
            $("input[name='quantity[]']").each(function() {
                if ($(this).val() !== '') {
                    quantity.push($(this).val());
                }
            });
            $("input[name='sale_rate[]']").each(function() {
                if ($(this).val() !== '') {
                    sale_rate.push($(this).val());
                }
            });
            $("input[name='rate[]']").each(function() {
                if ($(this).val() !== '') {
                    rate.push($(this).val());
                }
            });
            $.ajax({
                url: "{{ route('job_card.delivery_done') }}",
                method: 'post',
                data: {
                    part_id,
                    quantity,
                    sale_rate,
                    job_card_id,
                    discount,
                    paid_service_charge,
                    due_amount,
                    service_customer_id,
                    bill_date,
                    request_from,
                    client_name,
                    client_mobile,
                    client_address,
                    rate,
                    _token: "{{ csrf_token() }}"
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status === 200) {
                        $('#delivery_done_top, #delivery_done_bottom').addClass('disable');
                        $('#delivery_done_top, #delivery_done_bottom').removeClass('bg-danger');
                        new_jb_record();
                        text_danger_remove();
                        Swal.fire({
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: false,
                            timer: 2000
                        })

                        // $('#job_card_create').trigger("reset");
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: response.message,
                            footer: '<a href="">Why do I have this issue?</a>'
                        })
                    }
                }
            });
        });
        // Delivery Done End
        // delete_parts_item_start
        $('.delete_parts_item').on('click', function() {
            var _this = $(this).parent().parent();
            const id = _this.find('.id').val();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "{{ route('job_card.delete_parts_item') }}",
                        method: 'get',
                        dataType: 'json',
                        data: {
                            id,
                        },
                        success: function(response) {
                            if (response.status === 200) {
                                _this.find('.delete_parts_item').addClass('disabled');
                                _this.find('.delete_icon').removeClass('text-danger');
                                _this.find('.delete_icon').addClass('text-secondary');
                                Swal.fire({
                                    icon: 'success',
                                    title: response.message,
                                    showConfirmButton: false,
                                    timer: 2000
                                })
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: response.message,
                                    footer: '<a href="">Why do I have this issue?</a>'
                                })

                            }
                        }
                    });
                    _this = $(this).parent().parent();
                    _this.find('.part_id').val('');
                    _this.find('.quantity').val('');
                    _this.find('.description').val('');
                    _this.find('.id').val('');
                    _this.find('.sale_rate').val('').trigger('change');
                    $('.paid_amount').val($('.total_payable').val()).trigger("change");

                }
            })

        });
        $('.first_jb_record').on('click', function() {
            alert('I am Working.')
        });
        $('.previous_jb_record').on('click', function() {
            alert('I am Working.')
        });
        $('.next_jb_record').on('click', function() {
            alert('I am Working.')
        });
        $('.last_jb_record').on('click', function() {
            alert('I am Working.')
        });
        $('.new_jb_record').on('click', function() {
            new_jb_record();
        });

        function new_jb_record() {
            $("#job_card_list").empty();
            $("#job_card_list").append(`<option style="font-weight:bold;" value="">Job Card List</option>`);
            $('#job_card_create').trigger("reset");
            $('#delivered_png').empty();
            $('#pending_png').empty();
            $("#create_jb_top").html('Create JB');
            $("#create_jb_bottom").html('Create JB');
            assign_job_card_sl_no();
            load_job_card_list();
            text_danger_remove();
            $("#job_card_create :input").prop("disabled", false);

            $('#create_jb_top, #create_jb_bottom').removeClass('bg-secondary disable');
            $('#create_jb_top, #create_jb_bottom').addClass('bg-dark');

            $('.print_bill').removeClass('bg-dark');
            $('.print_bill').addClass('disable bg-secondary');
        }

        // Load job card list on same day start
        function load_job_card_list() {
            $.ajax({
                url: "{{ route('job_card.load_job_card_list') }}",
                method: 'get',
                dataType: 'json',
                success: function({
                    job_card_list
                }) {
                    if (job_card_list) {
                        $("#job_card_list").empty();
                        $("#job_card_list").append(`<option style="font-weight:bold;" value="">Job Card List</option>`);
                        job_card_list.forEach(function(item) {
                            $("#job_card_list").append(`<option style="font-weight:bold;" value="${item.id}">JB-${item.job_card_no}</option>`);
                        });
                    }
                }
            });
        }
        load_job_card_list();
        // Load job card list on same day end

        function text_danger_remove() {
            let text_danger = $('.text-danger').length;
            if (text_danger > 0) {
                $('.text-danger').each(function() {
                    let text_danger = $(this).parent().parent();
                    text_danger.find('.delete_parts_item').addClass('disabled');
                    text_danger.find('.delete_icon').removeClass('text-danger');
                })
                text_danger--;
            };
        };

        function disable_all_input() {
            $("#job_card_create :input").prop("readOnly", true);
        };
        // After select job card start
        $('#job_card_list, #job_card_list_search').on('change', function() {
            let id = $(this).val();
            $.ajax({
                url: "{{ route('job_card.load_single_job_card') }}",
                method: 'get',
                dataType: 'json',
                data: {
                    id
                },
                success: function({
                    single_jb_details: jb_details,
                    service_customer_details: service_customer,
                    spare_parts_sale_details: spare_parts_sale,
                }) {
                    if (jb_details) {
                        $('#job_card_create').trigger("reset");
                        $('.amount_of_fuel').val(jb_details.amount_of_fuel || '');
                        $('.chassis_no_top').val(jb_details.chassis_no);
                        $('.engine_no_top').val(jb_details.engine_no);
                        $('.chassis_no_bottom').text(jb_details.chassis_no);
                        $('.engine_no_bottom').text(jb_details.engine_no);
                        $('.mc_sale_date').val(jb_details.mc_sale_date);
                        $('.mileage').val(jb_details.mileage || '');
                        $('#job_card_id').val(jb_details.id);
                        $('#mc_model_name').val(jb_details.model_code).trigger('change');
                        $('#service_type').val(jb_details.service_type);
                        $('#work_type').val(jb_details.work_type);
                        $('#customer_complain').val(jb_details.customer_complain);
                        $('#repair_description').val(jb_details.repair_description);
                        $('#next_work_description').val(jb_details.next_work_description);
                        $('#next_work_date').val(jb_details.next_work_date);
                        $('.rg_number_top').val(jb_details.rg_number).trigger('change');
                        $('.job_card_no_top').val(jb_details.job_card_no);
                        $('.job_card_date_top').val(jb_details.job_card_date);
                        $('.job_card_no_bottom').val(jb_details.job_card_no);
                        $('.job_card_date_bottom').val(jb_details.job_card_date);
                        $('#service_engineer_id').val(jb_details.service_engineer_id);
                        $('#mechanic_id').val(jb_details.mechanic_id);
                        $('#mobile').val(service_customer.client_mobile);
                        $('.client_name').val(service_customer.client_name);
                        $('.address').val(service_customer.client_address);
                        $('#any_scratch_in_tank').val(jb_details.any_scratch_in_tank);
                        $('#mileage').val(jb_details.mileage);
                        $('#indicator_is_broken').val(jb_details.indicator_is_broken);
                        $('#any_scratch_in_headlight').val(jb_details.any_scratch_in_headlight);
                        $('#stuff_behavior').val(jb_details.stuff_behavior);
                        $('#service_center_is_clean').val(jb_details.service_center_is_clean);
                        $('#garir_sompadito_kaj').val(jb_details.garir_sompadito_kaj);
                        $('#mc_problem_solved').val(jb_details.mc_problem_solved);
                        $('#mc_delivery_done').val(jb_details.mc_delivery_done);
                        $('#recomend_our_service_center').val(jb_details.recomend_our_service_center);
                        $('.advance_top').val(jb_details.advance).trigger('keyup');
                        $('#service_customer_id').val(service_customer.id);
                        $("#create_jb_top").html('Update JB');
                        $("#create_jb_bottom").html('Update JB');
                        $("#advance_top").val(jb_details.advance).trigger('change');

                        // $('.paid_amount').val(0);

                        // populate spare parts sale data
                        let length = spare_parts_sale.length;
                        let index = 0;
                        text_danger_remove();

                        if (!spare_parts_sale.length == 0) {
                            let bill_id = spare_parts_sale[0].bill_id;
                            const url = "{{ route('bill.html_bill') }}?id=" + bill_id;

                            $('#top_navbar').find('.print_bill').remove();
                            $('#top_navbar').append(`<a target="_blank" href="${url}" class="print_bill page-item page-link bg-secondary disable" id="print_bill">Print Bill</a>`)
                        } else {
                            $('#top_navbar').find('.print_bill').remove();
                        }

                        $('.part_id').each(function() {
                            _this = $(this).parent().parent();
                            if (index < length) {
                                _this.find('.part_id').val(spare_parts_sale[index].part_id);
                                _this.find('.description').val(spare_parts_sale[index].part_name);
                                _this.find('.quantity').val(spare_parts_sale[index].quantity);
                                _this.find('.sale_rate').val(spare_parts_sale[index].sale_rate);
                                _this.find('.id').val(spare_parts_sale[index].id);
                                _this.find('.delete_parts_item').removeClass('disabled');
                                _this.find('.delete_icon').addClass('text-danger');
                            } else {
                                return false;
                            }
                            index++;
                        });
                        // populate spare parts sale data end
                        // delivery done button color changes start
                        if (jb_details.mc_delivery_done == 'yes') {
                            $('#delivered_png').empty();
                            $('#pending_png').empty();

                            $('#delivery_done_top, #delivery_done_bottom').removeClass('bg-danger bg-dark');
                            $('#delivery_done_top, #delivery_done_bottom').addClass('bg-secondary disable');

                            $('#create_jb_top, #create_jb_bottom').removeClass('bg-dark');
                            $('.print_bill').removeClass('disable bg-secondary');
                            $('.print_bill').addClass('bg-dark');
                            $('#create_jb_top, #create_jb_bottom').addClass('bg-secondary disable');

                            text_danger_remove();
                            disable_all_input();
                            $("#job_card_create :input").prop("disabled", true);
                            $('#job_card_list').prop('disabled', false);
                            $('#job_card_list_search').prop('disabled', false);
                            $('#job_card_date_search').removeAttr("readonly");
                            $('#job_card_date_search').removeAttr("disabled");
                            $('#delivered_png').append('<img src="{{ asset("images/delivered.png") }}" alt="pending" class="img-fluid p-1 delivered">');

                        } else {
                            $('#delivered_png').empty();
                            $('#pending_png').empty();

                            $('#delivery_done_top, #delivery_done_bottom').removeClass('bg-dark disable');
                            $('#delivery_done_top, #delivery_done_bottom').addClass('bg-danger');

                            $('#create_jb_bottom, #create_jb_top').removeClass('disable bg-secondary');
                            $('#create_jb_bottom, #create_jb_top').addClass('bg-dark');

                            $('#pending_png').append('<img src="{{ asset("images/pending.png") }}" alt="pending" class="img-fluid p-1 pending">');
                        }
                        sum_right();
                    }
                }
            });
        })
        // After select job card end
        $('#job_card_date_search').on('change', function() {
            let jb_date = $(this).val();
            $.ajax({
                url: "{{ route('job_card.load_job_card_list') }}",
                method: 'get',
                data: {
                    jb_date
                },
                dataType: 'json',
                success: function({
                    job_card_list
                }) {
                    console.log(job_card_list);
                    if (job_card_list) {
                        $('#job_card_list_search').empty();
                        $('#job_card_list_search').append('<option style="font-weight:bold;" value="">Job Card List</option>');
                        job_card_list.forEach(function(item) {
                            $("#job_card_list_search").append(`<option style="font-weight:bold;" value="${item.id}">JB-${item.job_card_no}</option>`);
                        });
                    }
                }
            });
        })
    });
</script>
@endsection