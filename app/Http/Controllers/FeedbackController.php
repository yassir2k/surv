<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    //
    public function SaveFeedback(Request $request)
    {
        $respondent = $request->input('respondent');
        $profession = $request->input('profession');
        $accreditation = $request->input('accreditation');
        $date = $request->input('date');
        $service_delivery1 = $request->input('sd1');
        $service_delivery2 = $request->input('sd2');
        $quality = $request->input('q');
        $timeliness_1 = $request->input('t1');
        $timeliness_2 = $request->input('t2');
        $timeliness_3 = $request->input('t3');
        $timeliness_4 = $request->input('t4');
        $online_env1 = $request->input('oe1');
        $online_env2 = $request->input('oe2');
        $online_env3 = $request->input('oe3');
        $challenges = $request->input('challenges');
        $changes = $request->input('changes');
        dd($quality);
    }
}
