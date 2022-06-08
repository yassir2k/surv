<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ApiController;
use App\Models\Questions;
use App\Models\User;
use Session, DB;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    //
    public function GetQuestions(){
        return Questions::take(2)->get();
    }

    /*---------------------------------------- 
        Update User Details
    ----------------------------------------*/
    public function ChangeUserPassword(Request $request)
    {
        $Password = $request->input('password');
        $nPassword = $request->input('new_password');
        $cPassword = $request->input('confirm_password');
        $username = $request->input('username'); 
        if(is_null($Password) || is_null($nPassword) || is_null($cPassword)  || is_null($username))
        {
            return "Incomplete data posted";
        }
        $credentials = ['email' => $username, 'password' => $Password];

        // attempt to do the login
        if (Auth::attempt($credentials))
        {
            //Meaning current password is valid. bcrypt('Qa1234@')
            $User = User::where(['email'=> $username])->first();
            $User->password = bcrypt($nPassword);
            $User->save();
            return "success";

        }
        else
        {
            return "Invalid current password";
        }
    }

    /*---------------------------------------- 
        Login
    ----------------------------------------*/
    public function Login(Request $request){
        // create our user data for the authentication
        $email   = $request->input('email');
        $password  = $request->input('password');
        $credentials = ['email' => $email, 'password' => $password];
        // attempt to do the login
        if (Auth::attempt($credentials))
        {
            // validation successful!
            $details = User::Where(['email' => $email])->first();
            $success['status'] = "success";
            $success['role'] = $details->role;
            $success['token'] =  substr(bin2hex(random_bytes(100)), 0, 100);
            return $success;
        } 
        else {        
            // validation not successful, send back to form 
            return "Unsuccessful";
        }
    }


    public function SaveFeedback(Request $request){
        $origin = $request->header("origin"); 
        $authorization = $request->header("authorization");
        $referer = $request->header("referer");
        $control_hash = substr(bin2hex(random_bytes(50)), 0, 50);//Generate Control Hash
        $FeedBackData = ['accreditation_' => $request->input('accreditation'), 
            'profession_' => $request->input('profession'),
            'gender_' => $request->input('gender'),
            'date_' => date("Y-m-d H:i:s"),
            'service_delivery1' => $request->input('service_delivery1'),
            'service_delivery2' => $request->input('service_delivery2'), 
            'quality_' => $request->input('quality'),
            'timelines1' => $request->input('timelines1'),
            'timelines2' => $request->input('timelines2'),
            'others' => $request->input('others'),
            'timelines3' => $request->input('timelines3'),
            'timelines4' => $request->input('timelines4'),
            'online_environment1' => $request->input('online_environment1'),
            'online_environment2' => $request->input('online_environment2'),
            'online_environment3' => $request->input('online_environment3'),
            'challenges_' => $request->input('challenges'),
            'others_' => $request->input('others_'),
            'control_hash' => $control_hash
        ];

        //Now we commit new entry to the database using eloquence
        Questions::create($FeedBackData);

        //Now let's check whether the data has really been committed to the database
        $hash = Questions::select('id','control_hash')->where(['control_hash' => $control_hash])->first();
        if($hash->control_hash == $control_hash)//Meaning the String are the same
        {
            $arr=[$hash->id, "Successful"];
            return $arr;
        }
        return "Error";      
    }

    public function GetTotalToday(Request $request){
        $temp = Questions::select('id')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '=', date('Y-m-d'))->get();
        $total_today = count($temp);
        return $total_today;
    }

    public function GetTotalAccreditedToday(Request $request){
        $temp = Questions::select('id')
        ->where(['accreditation_' => "Accredited User"])
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '=', date('Y-m-d'))->get();
        $total_today = count($temp);
        return $total_today;
    }

    public function GetTotalPublicToday(Request $request){
        $temp = Questions::select('id')
        ->where(['accreditation_' => "Public User"])
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '=', date('Y-m-d'))->get();
        $total_today = count($temp);
        return $total_today;
    }

    public function GetTotal(Request $request){
        $temp = Questions::select('id')->get();
        $total_today = count($temp);
        return $total_today;
    }

    public function GetTotalAccredited(Request $request){
        $temp = Questions::select('id')
        ->where(['accreditation_' => "Accredited User"])
        ->get();
        $total_today = count($temp);
        return $total_today;
    }

    public function GetTotalPublic(Request $request){
        $temp = Questions::select('id')
        ->where(['accreditation_' => "Public User"])
        ->get();
        $total_today = count($temp);
        return $total_today;
    }

    public function GetAbsolute(Request $request){
        $temp = Questions::select('*',\DB::raw("DATE_FORMAT(date_, '%W, %M %e %Y %r') as date_"))->paginate(10);
        return response()->json($temp);
    }

    public function GetAbsoluteAccredited(Request $request){
        $temp = Questions::select('*',\DB::raw("DATE_FORMAT(date_, '%W, %M %e %Y %r') as date_"))
        ->where(['accreditation_' => "Accredited User"])
        ->paginate(10);
        return response()->json($temp);
    }

    public function GetAbsolutePublic(Request $request){
        $temp = Questions::select('*',\DB::raw("DATE_FORMAT(date_, '%W, %M %e %Y %r') as date_"))
        ->where(['accreditation_' => "Public User"])
        ->paginate(10);
        return response()->json($temp);
    }

    public function GetToday(Request $request){
        $temp = Questions::select('*',\DB::raw("DATE_FORMAT(date_, '%W, %M %e %Y %r') as date_"))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '=', date('Y-m-d'))->paginate(10);
        return response()->json($temp);
    }

    public function GetTodayAccredited(Request $request){
        $temp = Questions::select('*',\DB::raw("DATE_FORMAT(date_, '%W, %M %e %Y %r') as date_"))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '=', date('Y-m-d'))
        ->where(['accreditation_' => "Accredited User"])
        ->paginate(10);
        return response()->json($temp);
    }

    public function GetTodayPublic(Request $request){
        $temp = Questions::select('*',\DB::raw("DATE_FORMAT(date_, '%W, %M %e %Y %r') as date_"))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '=', date('Y-m-d'))
        ->where(['accreditation_' => "Public User"])
        ->paginate(10);
        return response()->json($temp);
    }

    public function GetDatedFeedbackTotal(Request $request){
        $from = $request->input('from');
        $to = $request->input('to');
        $temp = Questions::select('*',\DB::raw("DATE_FORMAT(date_, '%W, %M %e %Y %r') as date_"))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->paginate(10);
        return response()->json($temp);
    }

    public function GetDatedFeedbackAccredited(Request $request){
        $from = $request->input('from');
        $to = $request->input('to');
        $temp = Questions::select('*',\DB::raw("DATE_FORMAT(date_, '%W, %M %e %Y %r') as date_"))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['accreditation_' => "Accredited User"])
        ->paginate(10);
        return response()->json($temp);
    }

    public function GetDatedFeedbackPublic(Request $request){
        $from = $request->input('from');
        $to = $request->input('to');
        $temp = Questions::select('*',\DB::raw("DATE_FORMAT(date_, '%W, %M %e %Y %r') as date_"))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['accreditation_' => "Public User"])
        ->paginate(10);
        return response()->json($temp);
    }

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function GetFeedbackTotalForADate(Request $request){
        $date = $request->input('date_');
        $temp = Questions::select('*',\DB::raw("DATE_FORMAT(date_, '%W, %M %e %Y %r') as date_"))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '=', date($date))
        ->paginate(10);
        return response()->json($temp);
    }

    public function GetFeedbackAccreditedForADate(Request $request){
        $date = $request->input('date_');
        $temp = Questions::select('*',\DB::raw("DATE_FORMAT(date_, '%W, %M %e %Y %r') as date_"))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '=', date($date))
        ->where(['accreditation_' => "Accredited User"])
        ->paginate(10);
        return response()->json($temp);
    }

    public function GetFeedbackPublicForADate(Request $request){
        $date = $request->input('date_');
        $temp = Questions::select('*',\DB::raw("DATE_FORMAT(date_, '%W, %M %e %Y %r') as date_"))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '=', date($date))
        ->where(['accreditation_' => "Public User"])
        ->paginate(10);
        return response()->json($temp);
    }

}
