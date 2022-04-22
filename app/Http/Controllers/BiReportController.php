<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BiReportController;
use App\Models\Questions;
use App\Models\User;
use Session, DB;

use Illuminate\Http\Request;

class BiReportController extends Controller
{
    /*--------------------------------------------------------------------------
                    For Agents 
    ---------------------------------------------------------------------------*/
    public function ServiceDeliveryQ1(Request $request){
        $from = $request->input('beginDate');
        $to = $request->input('endDate');

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['service_delivery1' => "Very Satisfied"])
        ->get();
        $Feedback["sd_q1_a"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['service_delivery1' => "Satisfied"])
        ->get();
        $Feedback["sd_q1_b"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['service_delivery1' => "Dissatisfied"])
        ->get();
        $Feedback["sd_q1_c"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['service_delivery1' => "Very Dissatisfied"])
        ->get();
        $Feedback["sd_q1_d"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->whereNotNull('service_delivery1')
        ->get();
        $Feedback["sd_q1_total"] = count($temp);

        /****************************************************************************
                    For Agents 
         ***************************************************************************/
        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['service_delivery1' => "Very Satisfied"])
        ->whereNotNull('accreditation_')
        ->get();
        $Feedback["agent_sd_q1_a"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['service_delivery1' => "Satisfied"])
        ->whereNotNull('accreditation_')
        ->get();
        $Feedback["agent_sd_q1_b"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['service_delivery1' => "Dissatisfied"])
        ->whereNotNull('accreditation_')
        ->get();
        $Feedback["agent_sd_q1_c"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['service_delivery1' => "Very Dissatisfied"])
        ->whereNotNull('accreditation_')
        ->get();
        $Feedback["agent_sd_q1_d"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->whereNotNull('service_delivery1')
        ->whereNotNull('accreditation_')
        ->get();
        $Feedback["agent_sd_q1_total"] = count($temp);

        /****************************************************************************
                    For Public
         ***************************************************************************/
        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['service_delivery1' => "Very Satisfied"])
        ->whereNull('accreditation_')
        ->get();
        $Feedback["public_sd_q1_a"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['service_delivery1' => "Satisfied"])
        ->whereNull('accreditation_')
        ->get();
        $Feedback["public_sd_q1_b"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['service_delivery1' => "Dissatisfied"])
        ->whereNull('accreditation_')
        ->get();
        $Feedback["public_sd_q1_c"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['service_delivery1' => "Very Dissatisfied"])
        ->whereNull('accreditation_')
        ->get();
        $Feedback["public_sd_q1_d"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->whereNotNull('service_delivery1')
        ->whereNull('accreditation_')
        ->get();
        $Feedback["public_sd_q1_total"] = count($temp);

        return response()->json($Feedback);
    }

    /*--------------------------------------------------------------------------
                    Service Delivery Q2
    ---------------------------------------------------------------------------*/
    public function ServiceDeliveryQ2(Request $request){
        $from = $request->input('beginDate');
        $to = $request->input('endDate');

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['service_delivery2' => "Company (LLC)"])
        ->get();
        $Feedback["sd_q2_a"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['service_delivery2' => "Business Names"])
        ->get();
        $Feedback["sd_q2_b"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['service_delivery2' => "Incorporated Trustees"])
        ->get();
        $Feedback["sd_q2_c"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['service_delivery2' => "Limited Partnership (LP)"])
        ->get();
        $Feedback["sd_q2_d"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['service_delivery2' => "Limited Liability Partnership (LLP)"])
        ->get();
        $Feedback["sd_q2_e"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->whereNotNull('service_delivery2')
        ->get();
        $Feedback["sd_q2_total"] = count($temp);

        /****************************************************************************
                    For Agents 
         ***************************************************************************/
        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['service_delivery2' => "Company (LLC)"])
        ->whereNotNull('accreditation_')
        ->get();
        $Feedback["agent_sd_q2_a"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['service_delivery2' => "Business Names"])
        ->whereNotNull('accreditation_')
        ->get();
        $Feedback["agent_sd_q2_b"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['service_delivery2' => "Incorporated Trustees"])
        ->whereNotNull('accreditation_')
        ->get();
        $Feedback["agent_sd_q2_c"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['service_delivery2' => "Limited Partnership (LP)"])
        ->whereNotNull('accreditation_')
        ->get();
        $Feedback["agent_sd_q2_d"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['service_delivery2' => "Limited Liability Partnership (LLP)"])
        ->whereNotNull('accreditation_')
        ->get();
        $Feedback["agent_sd_q2_e"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->whereNotNull('accreditation_')
        ->whereNotNull('service_delivery2')
        ->get();
        $Feedback["agent_sd_q2_total"] = count($temp);

        /****************************************************************************
                    For Public
         ***************************************************************************/
        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['service_delivery2' => "Company (LLC)"])
        ->whereNull('accreditation_')
        ->get();
        $Feedback["public_sd_q2_a"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['service_delivery2' => "Business Names"])
        ->whereNull('accreditation_')
        ->get();
        $Feedback["public_sd_q2_b"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['service_delivery2' => "Incorporated Trustees"])
        ->whereNull('accreditation_')
        ->get();
        $Feedback["public_sd_q2_c"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['service_delivery2' => "Limited Partnership (LP)"])
        ->whereNull('accreditation_')
        ->get();
        $Feedback["public_sd_q2_d"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['service_delivery2' => "Limited Liability Partnership (LLP)"])
        ->whereNull('accreditation_')
        ->get();
        $Feedback["public_sd_q2_e"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->whereNull('accreditation_')
        ->whereNotNull('service_delivery2')
        ->get();
        $Feedback["public_sd_q2_total"] = count($temp);

        return response()->json($Feedback);
    }

    /*--------------------------------------------------------------------------
                    Quality
    ---------------------------------------------------------------------------*/
    public function QualityQ1(Request $request){
        $from = $request->input('beginDate');
        $to = $request->input('endDate');

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['quality_' => "Very Satisfied"])
        ->get();
        $Feedback["q_a"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['quality_' => "Satisfied"])
        ->get();
        $Feedback["q_b"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['quality_' => "Dissatisfied"])
        ->get();
        $Feedback["q_c"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['quality_' => "Very Dissatisfied"])
        ->get();
        $Feedback["q_d"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->whereNotNull('quality_')
        ->get();
        $Feedback["q_total"] = count($temp);

        /****************************************************************************
                    For Agents 
         ***************************************************************************/
        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['quality_' => "Very Satisfied"])
        ->whereNotNull('accreditation_')
        ->get();
        $Feedback["agent_q_a"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['quality_' => "Satisfied"])
        ->whereNotNull('accreditation_')
        ->get();
        $Feedback["agent_q_b"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['quality_' => "Dissatisfied"])
        ->whereNotNull('accreditation_')
        ->get();
        $Feedback["agent_q_c"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['quality_' => "Very Dissatisfied"])
        ->whereNotNull('accreditation_')
        ->get();
        $Feedback["agent_q_d"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->whereNotNull('quality_')
        ->whereNotNull('accreditation_')
        ->get();
        $Feedback["agent_q_total"] = count($temp);

        /****************************************************************************
                    For Public
         ***************************************************************************/
        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['quality_' => "Very Satisfied"])
        ->whereNull('accreditation_')
        ->get();
        $Feedback["public_q_a"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['quality_' => "Satisfied"])
        ->whereNull('accreditation_')
        ->get();
        $Feedback["public_q_b"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['quality_' => "Dissatisfied"])
        ->whereNull('accreditation_')
        ->get();
        $Feedback["public_q_c"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['quality_' => "Very Dissatisfied"])
        ->whereNull('accreditation_')
        ->get();
        $Feedback["public_q_d"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->whereNotNull('quality_')
        ->whereNull('accreditation_')
        ->get();
        $Feedback["public_q_total"] = count($temp);

        return response()->json($Feedback);
    }
}
