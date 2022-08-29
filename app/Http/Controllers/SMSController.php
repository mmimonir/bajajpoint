<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Showroom\Core;
use Illuminate\Support\Carbon;

class SMSController extends Controller
{
    public function formatMsg($dates, $serviceType)
    {
        $date = date('d/m/Y', strtotime($dates));
        $msg = '';
        switch ($serviceType) {
            case "1":
                $msg = "Agami " . $date . " Tarik Apnar 1st Free Service. Bike & Service Book Nia Bajaj Point E Ashun. 01977-97 77 44, 01813-55 16 21";
                return $msg;
                break;
            case "2":
                $msg = "Agami " . $date . " Tarik Apnar 2nd Free Service. Bike & Service Book Nia Bajaj Point E Ashun. 01977-97 77 44, 01813-55 16 21";
                return $msg;
                break;
            case "3":
                $msg = "Agami " . $date . " Tarik Apnar 3rd Free Service. Bike & Service Book Nia Bajaj Point E Ashun. 01977-97 77 44, 01813-55 16 21";
                return $msg;
                break;
            case "4":
                $msg = "Agami " . $date . " Tarik Apnar 4th Free Service. Bike & Service Book Nia Bajaj Point E Ashun. 01977-97 77 44, 01813-55 16 21";
                return $msg;
                break;
            case "5":
                $msg = "Agami " . $date . " Tarik Apnar 1st Paid Service. Bike & Service Book Nia Bajaj Point E Ashun. 01977-97 77 44, 01813-55 16 21";
                return $msg;
                break;
            case "6":
                $msg = "Agami " . $date . " Tarik Apnar 2nd Paid Service. Bike & Service Book Nia Bajaj Point E Ashun. 01977-97 77 44, 01813-55 16 21";
                return $msg;
                break;
            case "7":
                $msg = "Agami " . $date . " Tarik Apnar 3rd Paid Service. Bike & Service Book Nia Bajaj Point E Ashun. 01977-97 77 44, 01813-55 16 21";
                return $msg;
                break;
            case "8":
                $msg = "Agami " . $date . " Tarik Apnar 4th Paid Service. Bike & Service Book Nia Bajaj Point E Ashun. 01977-97 77 44, 01813-55 16 21";
                return $msg;
                break;

            default:
                # code...
                break;
        }
    }
    public function index(Request $request)
    {
        $service_date = Carbon::now()->toDateString();
        // $service_date = $request->service_date;
        $mobile_no = $request->mobile_no;
        // $service_type = $request->service_type;
        $service_type = '1';

        $msg = $this->formatMsg($service_date, $service_type);


        $client = new \SoapClient("https://api2.onnorokomSMS.com/sendSMS.asmx?wsdl");
        $paramArray = array(
            'userName' => env('SMS_USERNAME'),
            'userPassword' => env('SMS_PASSWORD'),
            'mobileNumber' => "01974353555",
            'smsText' => $msg,
            'type' => "TEXT",
            'maskName' => '',
            'campaignName' => '',
        );
        $value = $client->__call("OneToOne", array($paramArray));

        return response()->json($value->OneToOneResult);
    }
    public function send_sms(Request $request)
    {
        $sms_data = Core::where('id', $request->id)->first();
        $msg = 'Dear Sir, Apnar Number ' . $request->rg_number . ' is ready for delivery. Please collect it from our showroom Thank you.';

        $client = new \SoapClient("https://api2.onnorokomSMS.com/sendSMS.asmx?wsdl");
        $paramArray = array(
            'userName' => env('SMS_USERNAME'),
            'userPassword' => env('SMS_PASSWORD'),
            'mobileNumber' => $sms_data->mobile,
            'smsText' => $msg,
            'type' => "TEXT",
            'maskName' => '',
            'campaignName' => '',
        );
        $value = $client->__call("OneToOne", array($paramArray));

        return response()->json(
            [
                'message' => $value->OneToOneResult,
                'status' => 200
            ]
        );
    }
}
