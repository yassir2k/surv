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
        $control_hash = substr(bin2hex(random_bytes(100)), 0, 100);//Generate Control Hash
        $FeedBackData = ['name_' => $request->input('respondent'), 
            'profession_' => $request->input('profession'),
            'accreditation_' => $request->input('accreditation'),
            'date_' => date("Y-m-d H:i:s"),
            'service_delivery1' => $request->input('service_delivery1'),
            'service_delivery2' => $request->input('service_delivery2'), 
            'quality_' => $request->input('quality'),
            'timeliness1' => $request->input('timeliness1'),
            'timeliness2' => $request->input('timeliness2'),
            'others' => $request->input('others'),
            'timeliness3' => $request->input('timeliness3'),
            'timeliness4' => $request->input('timeliness4'),
            'online_environment1' => $request->input('online_environment1'),
            'online_environment2' => $request->input('online_environment2'),
            'online_environment3' => $request->input('online_environment3'),
            'challenges_' => $request->input('challenges'),
            'changes_' => $request->input('changes'),
            'control_hash' => $control_hash,
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

    public function GetTotalAcceditedToday(Request $request){
        $temp = Questions::select('id')->whereNotNull('accreditation_')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '=', date('Y-m-d'))->get();
        $total_today = count($temp);
        return $total_today;
    }

    public function GetTotalPublicToday(Request $request){
        $temp = Questions::select('id')->whereNull('accreditation_')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '=', date('Y-m-d'))->get();
        $total_today = count($temp);
        return $total_today;
    }

    public function GetTotal(Request $request){
        $temp = Questions::select('id')->get();
        $total_today = count($temp);
        return $total_today;
    }

    public function GetTotalAccedited(Request $request){
        $temp = Questions::select('id')->WhereRaw('accreditation_ LIKE "NBA/%"')
        ->orWhereRaw('accreditation_ LIKE "ANAN/%"')
        ->orWhereRaw('accreditation_ LIKE "ISCAN/%"')
        ->orWhereRaw('accreditation_ LIKE "NYSC/%"')
        ->WhereRaw('accreditation_ LIKE "ICAN/%"')
        ->get();
        $total_today = count($temp);
        return $total_today;
    }

    public function GetTotalPublic(Request $request){
        $temp = Questions::select('id')->whereNull('accreditation_')
        ->orWhereRaw('accreditation_ NOT LIKE "NBA/%"')
        ->orWhereRaw('accreditation_ LIKE "ANAN/%"')
        ->orWhereRaw('accreditation_ LIKE "ISCAN/%"')
        ->orWhereRaw('accreditation_ LIKE "NYSC/%"')
        ->WhereRaw('accreditation_ LIKE "ICAN/%"')
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
        ->WhereRaw('accreditation_ LIKE "NBA/%"')
        ->orWhereRaw('accreditation_ LIKE "ANAN/%"')
        ->orWhereRaw('accreditation_ LIKE "ISCAN/%"')
        ->orWhereRaw('accreditation_ LIKE "NYSC/%"')
        ->WhereRaw('accreditation_ LIKE "ICAN/%"')
        ->paginate(10);
        return response()->json($temp);
    }

    public function GetAbsolutePublic(Request $request){
        $temp = Questions::select('*',\DB::raw("DATE_FORMAT(date_, '%W, %M %e %Y %r') as date_"))
        ->whereNull('accreditation_')
        ->orWhereRaw('accreditation_ NOT LIKE "NBA/%"')
        ->orWhereRaw('accreditation_ LIKE "ANAN/%"')
        ->orWhereRaw('accreditation_ LIKE "ISCAN/%"')
        ->orWhereRaw('accreditation_ LIKE "NYSC/%"')
        ->WhereRaw('accreditation_ LIKE "ICAN/%"')
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
        ->WhereRaw('accreditation_ LIKE "NBA/%"')
        ->orWhereRaw('accreditation_ LIKE "ANAN/%"')
        ->orWhereRaw('accreditation_ LIKE "ISCAN/%"')
        ->orWhereRaw('accreditation_ LIKE "NYSC/%"')
        ->WhereRaw('accreditation_ LIKE "ICAN/%"')
        ->paginate(10);
        return response()->json($temp);
    }

    public function GetTodayPublic(Request $request){
        $temp = Questions::select('*',\DB::raw("DATE_FORMAT(date_, '%W, %M %e %Y %r') as date_"))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '=', date('Y-m-d'))
        ->whereNull('accreditation_')
        ->orWhereRaw('accreditation_ NOT LIKE "NBA/%"')
        ->orWhereRaw('accreditation_ LIKE "ANAN/%"')
        ->orWhereRaw('accreditation_ LIKE "ISCAN/%"')
        ->orWhereRaw('accreditation_ LIKE "NYSC/%"')
        ->WhereRaw('accreditation_ LIKE "ICAN/%"')
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
        ->WhereRaw('accreditation_ LIKE "NBA/%"')
        ->orWhereRaw('accreditation_ LIKE "ANAN/%"')
        ->orWhereRaw('accreditation_ LIKE "ISCAN/%"')
        ->orWhereRaw('accreditation_ LIKE "NYSC/%"')
        ->WhereRaw('accreditation_ LIKE "ICAN/%"')
        ->paginate(10);
        return response()->json($temp);
    }

    public function GetDatedFeedbackPublic(Request $request){
        $from = $request->input('from');
        $to = $request->input('to');
        $temp = Questions::select('*',\DB::raw("DATE_FORMAT(date_, '%W, %M %e %Y %r') as date_"))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->whereNull('accreditation_')
        ->orWhereRaw('accreditation_ NOT LIKE "NBA/%"')
        ->orWhereRaw('accreditation_ LIKE "ANAN/%"')
        ->orWhereRaw('accreditation_ LIKE "ISCAN/%"')
        ->orWhereRaw('accreditation_ LIKE "NYSC/%"')
        ->WhereRaw('accreditation_ LIKE "ICAN/%"')
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
        ->WhereRaw('accreditation_ LIKE "NBA/%"')
        ->orWhereRaw('accreditation_ LIKE "ANAN/%"')
        ->orWhereRaw('accreditation_ LIKE "ISCAN/%"')
        ->orWhereRaw('accreditation_ LIKE "NYSC/%"')
        ->WhereRaw('accreditation_ LIKE "ICAN/%"')
        ->paginate(10);
        return response()->json($temp);
    }

    public function GetFeedbackPublicForADate(Request $request){
        $date = $request->input('date_');
        $temp = Questions::select('*',\DB::raw("DATE_FORMAT(date_, '%W, %M %e %Y %r') as date_"))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '=', date($date))
        ->whereNull('accreditation_')
        ->orWhereRaw('accreditation_ NOT LIKE "NBA/%"')
        ->orWhereRaw('accreditation_ LIKE "ANAN/%"')
        ->orWhereRaw('accreditation_ LIKE "ISCAN/%"')
        ->orWhereRaw('accreditation_ LIKE "NYSC/%"')
        ->WhereRaw('accreditation_ LIKE "ICAN/%"')
        ->paginate(10);
        return response()->json($temp);
    }

}
