<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Info;
use App\InfoView;

class InfoController extends Controller
{
    
    public function me(Request $request)
    {

        $inf = Info::where('token', $request['token'])->first();
        $inf->req_time = now();

        if ($request['name'])
            $inf->name = $request['name'];
        if ($request['family'])
            $inf->family = $request['family'];
        // if ($request['mobile'])
        //     $inf->mobile = $request['mobile'];
        if ($request['email'])
            $inf->email = $request['email'];
        if ($request['national_code'])
            $inf->national_code = $request['national_code'];
        if ($request['shomshenas'])
            $inf->shomshenas = $request['shomshenas'];
        if ($request['fathername'])
            $inf->fathername = $request['fathername'];
        if ($request['birthdate'])
            $inf->birthdate = $request['birthdate'];
        if ($request['tahsilat'])
            $inf->tahsilat = $request['tahsilat'];
        if ($request['province'])
            $inf->province = $request['province'];
        if ($request['county'])
            $inf->county = $request['county'];
        if ($request['city'])
            $inf->city = $request['city'];
        if ($request['address'])
            $inf->address = $request['address'];
        if ($request['postalcode'])
            $inf->postalcode = $request['postalcode'];
        if ($request['phone'])
            $inf->phone = $request['phone'];

        if ($inf->smsSent != "1" && $request['name'] && $request['family'] && $request['email'] && $request['national_code'] && $request['shomshenas'] && $request['fathername'] && $request['birthdate'] && $request['tahsilat'] && $request['ostan'] && $request['shahr'] && $request['address'] && $request['postalcode'] && $request['phone']) {
            app('App\Http\Controllers\SmsController')->smsSent($inf->mobile, env("KaveNegarVerificationTemplateNameForRegistrationCompleted"));
            // app('App\Http\Controllers\SmsController')->smsSent($inf->mobile, "firiFansVerificationCode");
            $inf->smsSent = "1";
        }


        $inf->save();


        if (1 == 1)
            return response()->json([
                'code' => '200',
                'message' => 'success',
                "data" => array($inf)
            ]);
        else
            return $inf->toJson();
    }

}
