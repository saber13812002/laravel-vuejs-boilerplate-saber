<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Otp;
use App\User;
use JWTAuth;
use App\Info;

class OtpController extends Controller
{
    //

    public function otp11get($phone)
    {
        if ($phone) {
            return $this->otp1function($phone);
        } else
            return json_encode(array('status' => 555, 'msg' => "phone cant detected"));
    }

    public function otp1function($phone)
    {
        $rand_no = 0;
        $len = strlen($phone);

        if ($len >= 10) {
            $phone = $this->right10($phone);
        }

        foreach (Otp::where('mobile_number', $phone)->orderBy('created_at', 'desc')->take(1)->cursor() as $otp) {
            if ($otp->verification_code > 0) {
                $rand_no = $otp->verification_code;
            }
            //echo $otp->verification_code;
        }

        $result = false;

        if ($rand_no) {
            if (env('SMS_ENABLE') == "1")
                $result = app('App\Http\Controllers\SmsController')->send($phone, $rand_no);
            else
                $result = -1;
        } else {
            $rand_no = rand(10000, 99999);
            $otp1 = new Otp;
            $otp1->mobile_number = $phone;
            $otp1->verification_code = $rand_no;
            $otp1->verified = 0;
            $otp1->save();
            //echo $rand_no;
            if (env('SMS_ENABLE') == "1")
                $result = app('App\Http\Controllers\SmsController')->send($phone, $rand_no);
            else
                $result = -1;
        }

        return $this->generateJson($result);
    }

    private function generateJson($result)
    {
        switch ($result) {
            case -1:
                return json_encode(array('status' => 201, 'msg' => "sms disabled by env variable SMS_ENABLE"));
                break;
            case 0:
                return json_encode(array('status' => 550, 'msg' => "curl error"));
                break;
            case 1:
                return json_encode(array('status' => 200, 'msg' => "ok"));
                break;
            case 2:
                return json_encode(array('status' => 552, 'msg' => "env variable KavenegarApiKey"));
                break;
            case 3:
                return json_encode(array('status' => 553, 'msg' => "env variable KaveNegarVerificationTemplateName"));
                break;
        }
    }

    public function otp22get($phone, $code)
    {
        if ($phone && $code) {
            return $this->otp2function($phone, $code);
        }
    }

    public function otp2function($phone, $code)
    {
        $exist = 0;
        $correctToken = 0;

        $len = strlen($phone);

        if ($len >= 10) {
            $phone = $this->right10($phone);
        }
        //echo $phone;
        foreach (Otp::where('mobile_number', $phone)->where('verification_code', $code)->where('verified', 0)->orderBy('created_at', 'desc')->take(1)->cursor() as $otp) {
            $exist = 1;
            if ($otp->verification_code == $code) {
                $correctToken = 1;
            }
        }
        //echo $phone;
        //echo $exist;
        if ($exist) {
            //echo $correctToken;
            if ($correctToken) {
                $username = "user_" . MD5($phone);
                $password = MD5($code);
                $email = $username . "@app.ir";
                //check user exist
                if (User::where('email', '=', $email)->exists()) {
                    //echo 1;
                    $credentials = array(
                        'email' => $email,
                        'password' => $password,
                    );

                    try {
                        if (!$token = JWTAuth::attempt($credentials)) {
                            return response()->json(['error' => 'invalid_credentials'], 400);
                        }
                    } catch (JWTException $e) {
                        return response()->json(['error' => 'could_not_create_token'], 500);
                    }

                    $ids = User::select('id')->where('email', '=', $email)->first();
                    //echo $ids;
                    $usr = [
                        'id' => $ids->id,
                        'name' => $username,
                        'email' => $email,
                        'password' => Hash::make($password),
                    ];

                    //$inf = new Info;
                    $inf = Info::where('author_id', $ids->id)->first();
                    $inf->req_date = now();
                    $inf->req_time = now();
                    //$inf->author_id = $ids->id;
                    //$inf->mobile = $phone;
                    $inf->save();


                    $token = $inf->token;
                    //echo $token;
                    //echo $usr;
                    //echo $usr->toJson();
                    return response()->json(compact('usr', 'token'), 201);
                }
                //not exist sigup
                else {
                    $user = User::create([
                        'name' => $username,
                        'email' => $email,
                        'password' => Hash::make($password),
                    ]);

                    $usr = [
                        'id' => $user->id,
                        'name' => $username,
                        'email' => $email,
                        'password' => Hash::make($password),
                    ];

                    //todo: verified =1

                    $token = JWTAuth::fromUser($user);
                    //TODO verified = 1



                    $inf = new Info;
                    $inf->req_date = now();
                    $inf->req_time = now();
                    $inf->author_id = $user->id;
                    $inf->mobile = $phone;
                    $inf->token = $token;
                    $inf->save();

                    // $p = new Pay;
                    // $p->author_id = $user->id;
                    // $p->save();

                    return response()->json(compact('usr', 'token'), 201);
                }
            } else {
                return json_encode(array('status' => 310, 'msg' => "incorrect verification code"));
            }
        } else {
            return json_encode(array('status' => 310, 'msg' => "not exist token for this phone please request new verification code"));
        }
    }

    private function right10($recipient_no)
    {
        $len = strlen($recipient_no);

        if ($len >= 10) {
            $recipient_no = substr($recipient_no, $len - 10, $len);
        }

        return $recipient_no;
    }
}
