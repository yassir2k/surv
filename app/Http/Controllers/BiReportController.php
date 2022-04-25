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

    
    
    /*--------------------------------------------------------------------------
                    Timeliness Q1
    ---------------------------------------------------------------------------*/
    public function TimelinessQ1(Request $request){
        $from = $request->input('beginDate');
        $to = $request->input('endDate');

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timeliness1' => "Less than 24 Hrs"])
        ->get();
        $Feedback["t_q1_a"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timeliness1' => "24 Hrs"])
        ->get();
        $Feedback["t_q1_b"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timeliness1' => "48 Hrs"])
        ->get();
        $Feedback["t_q1_c"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timeliness1' => "3 Days"])
        ->get();
        $Feedback["t_q1_d"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timeliness1' => "Over 3 Days"])
        ->get();
        $Feedback["t_q1_e"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->whereNotNull('timeliness1')
        ->get();
        $Feedback["t_q1_total"] = count($temp);

        /****************************************************************************
                    For Agents 
         ***************************************************************************/
        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timeliness1' => "Less than 24 Hrs"])
        ->whereNotNull('accreditation_')
        ->get();
        $Feedback["agent_t_q1_a"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timeliness1' => "24 Hrs"])
        ->whereNotNull('accreditation_')
        ->get();
        $Feedback["agent_t_q1_b"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timeliness1' => "48 Hrs"])
        ->whereNotNull('accreditation_')
        ->get();
        $Feedback["agent_t_q1_c"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timeliness1' => "3 Days"])
        ->whereNotNull('accreditation_')
        ->get();
        $Feedback["agent_t_q1_d"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timeliness1' => "Over 3 Days"])
        ->whereNotNull('accreditation_')
        ->get();
        $Feedback["agent_t_q1_e"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->whereNotNull('accreditation_')
        ->whereNotNull('timeliness1')
        ->get();
        $Feedback["agent_t_q1_total"] = count($temp);

        /****************************************************************************
                    For Public
         ***************************************************************************/
        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timeliness1' => "Less than 24 Hrs"])
        ->whereNull('accreditation_')
        ->get();
        $Feedback["public_t_q1_a"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timeliness1' => "24 Hrs"])
        ->whereNull('accreditation_')
        ->get();
        $Feedback["public_t_q1_b"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timeliness1' => "48 Hrs"])
        ->whereNull('accreditation_')
        ->get();
        $Feedback["public_t_q1_c"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timeliness1' => "3 Days"])
        ->whereNull('accreditation_')
        ->get();
        $Feedback["public_t_q1_d"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timeliness1' => "Over 3 Days"])
        ->whereNull('accreditation_')
        ->get();
        $Feedback["public_t_q1_e"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->whereNull('accreditation_')
        ->whereNotNull('timeliness1')
        ->get();
        $Feedback["public_t_q1_total"] = count($temp);

        return response()->json($Feedback);
    }


    /*--------------------------------------------------------------------------
                    Timeliness Q2
    ---------------------------------------------------------------------------*/
    public function TimelinessQ2(Request $request){
        $from = $request->input('beginDate');
        $to = $request->input('endDate');

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timeliness2' => "Email"])
        ->get();
        $Feedback["t_q2_a"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timeliness2' => "Telephone"])
        ->get();
        $Feedback["t_q2_b"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timeliness2' => "Face to Face"])
        ->get();
        $Feedback["t_q2_c"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timeliness2' => "Online Support Ticket System"])
        ->get();
        $Feedback["t_q2_d"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timeliness2' => "Others"])
        ->get();
        $Feedback["t_q2_e"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->whereNotNull('timeliness2')
        ->get();
        $Feedback["t_q2_total"] = count($temp);

        /****************************************************************************
                    For Agents 
         ***************************************************************************/
        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timeliness2' => "Email"])
        ->whereNotNull('accreditation_')
        ->get();
        $Feedback["agent_t_q2_a"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timeliness2' => "Telephone"])
        ->whereNotNull('accreditation_')
        ->get();
        $Feedback["agent_t_q2_b"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timeliness2' => "Face to Face"])
        ->whereNotNull('accreditation_')
        ->get();
        $Feedback["agent_t_q2_c"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timeliness2' => "Online Support Ticket System"])
        ->whereNotNull('accreditation_')
        ->get();
        $Feedback["agent_t_q2_d"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timeliness2' => "Others"])
        ->whereNotNull('accreditation_')
        ->get();
        $Feedback["agent_t_q2_e"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->whereNotNull('accreditation_')
        ->whereNotNull('timeliness2')
        ->get();
        $Feedback["agent_t_q2_total"] = count($temp);

        /****************************************************************************
                    For Public
         ***************************************************************************/
        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timeliness2' => "Email"])
        ->whereNull('accreditation_')
        ->get();
        $Feedback["public_t_q2_a"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timeliness2' => "Telephone"])
        ->whereNull('accreditation_')
        ->get();
        $Feedback["public_t_q2_b"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timeliness2' => "Face to Face"])
        ->whereNull('accreditation_')
        ->get();
        $Feedback["public_t_q2_c"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timeliness2' => "Online Support Ticket System"])
        ->whereNull('accreditation_')
        ->get();
        $Feedback["public_t_q2_d"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timeliness2' => "Others"])
        ->whereNull('accreditation_')
        ->get();
        $Feedback["public_t_q2_e"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->whereNull('accreditation_')
        ->whereNotNull('timeliness2')
        ->get();
        $Feedback["public_t_q2_total"] = count($temp);

        return response()->json($Feedback);
    }


    /*--------------------------------------------------------------------------
                    Timeliness Q3
    ---------------------------------------------------------------------------*/
    public function TimelinessQ3(Request $request){
        $from = $request->input('beginDate');
        $to = $request->input('endDate');

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timeliness3' => "Very Satisfied"])
        ->get();
        $Feedback["t_q3_a"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timeliness3' => "Satisfied"])
        ->get();
        $Feedback["t_q3_b"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timeliness3' => "Dissatisfied"])
        ->get();
        $Feedback["t_q3_c"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timeliness3' => "Very Dissatisfied"])
        ->get();
        $Feedback["t_q3_d"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->whereNotNull('timeliness3')
        ->get();
        $Feedback["t_q3_total"] = count($temp);

        /****************************************************************************
                    For Agents 
         ***************************************************************************/
        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timeliness3' => "Very Satisfied"])
        ->whereNotNull('accreditation_')
        ->get();
        $Feedback["agent_t_q3_a"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timeliness3' => "Satisfied"])
        ->whereNotNull('accreditation_')
        ->get();
        $Feedback["agent_t_q3_b"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timeliness3' => "Dissatisfied"])
        ->whereNotNull('accreditation_')
        ->get();
        $Feedback["agent_t_q3_c"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timeliness3' => "Very Dissatisfied"])
        ->whereNotNull('accreditation_')
        ->get();
        $Feedback["agent_t_q3_d"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->whereNotNull('accreditation_')
        ->whereNotNull('timeliness3')
        ->get();
        $Feedback["agent_t_q3_total"] = count($temp);

        /****************************************************************************
                    For Public
         ***************************************************************************/
        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timeliness3' => "Very Satisfied"])
        ->whereNull('accreditation_')
        ->get();
        $Feedback["public_t_q3_a"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timeliness3' => "Satisfied"])
        ->whereNull('accreditation_')
        ->get();
        $Feedback["public_t_q3_b"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timeliness3' => "Dissatisfied"])
        ->whereNull('accreditation_')
        ->get();
        $Feedback["public_t_q3_c"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timeliness3' => "Very Dissatisfied"])
        ->whereNull('accreditation_')
        ->get();
        $Feedback["public_t_q3_d"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->whereNull('accreditation_')
        ->whereNotNull('timeliness3')
        ->get();
        $Feedback["public_t_q3_total"] = count($temp);

        return response()->json($Feedback);
    }


    /*--------------------------------------------------------------------------
                    Timeliness Q4
    ---------------------------------------------------------------------------*/
    public function TimelinessQ4(Request $request){
        $from = $request->input('beginDate');
        $to = $request->input('endDate');

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timeliness4' => "Excellent"])
        ->get();
        $Feedback["t_q4_a"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timeliness4' => "Very Good"])
        ->get();
        $Feedback["t_q4_b"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timeliness4' => "Good"])
        ->get();
        $Feedback["t_q4_c"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timeliness4' => "Fair"])
        ->get();
        $Feedback["t_q4_d"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timeliness4' => "Poor"])
        ->get();
        $Feedback["t_q4_e"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->whereNotNull('timeliness4')
        ->get();
        $Feedback["t_q4_total"] = count($temp);

        /****************************************************************************
                    For Agents 
         ***************************************************************************/
        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timeliness4' => "Excellent"])
        ->whereNotNull('accreditation_')
        ->get();
        $Feedback["agent_t_q4_a"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timeliness4' => "Very Good"])
        ->whereNotNull('accreditation_')
        ->get();
        $Feedback["agent_t_q4_b"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timeliness4' => "Good"])
        ->whereNotNull('accreditation_')
        ->get();
        $Feedback["agent_t_q4_c"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timeliness4' => "Fair"])
        ->whereNotNull('accreditation_')
        ->get();
        $Feedback["agent_t_q4_d"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timeliness4' => "Poor"])
        ->whereNotNull('accreditation_')
        ->get();
        $Feedback["agent_t_q4_e"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->whereNotNull('accreditation_')
        ->whereNotNull('timeliness4')
        ->get();
        $Feedback["agent_t_q4_total"] = count($temp);

        /****************************************************************************
                    For Public
         ***************************************************************************/
        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timeliness4' => "Excellent"])
        ->whereNull('accreditation_')
        ->get();
        $Feedback["public_t_q4_a"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timeliness4' => "Very Good"])
        ->whereNull('accreditation_')
        ->get();
        $Feedback["public_t_q4_b"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timeliness4' => "Good"])
        ->whereNull('accreditation_')
        ->get();
        $Feedback["public_t_q4_c"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timeliness4' => "Fair"])
        ->whereNull('accreditation_')
        ->get();
        $Feedback["public_t_q4_d"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timeliness4' => "Poor"])
        ->whereNull('accreditation_')
        ->get();
        $Feedback["public_t_q4_e"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->whereNull('accreditation_')
        ->whereNotNull('timeliness4')
        ->get();
        $Feedback["public_t_q4_total"] = count($temp);

        return response()->json($Feedback);
    }


    /*--------------------------------------------------------------------------
                    Online Environment Q1
    ---------------------------------------------------------------------------*/
    public function OnlineEnvironmentQ1(Request $request){
        $from = $request->input('beginDate');
        $to = $request->input('endDate');

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['online_environment1' => "Excellent"])
        ->get();
        $Feedback["oe_q1_a"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['online_environment1' => "Very Good"])
        ->get();
        $Feedback["oe_q1_b"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['online_environment1' => "Good"])
        ->get();
        $Feedback["oe_q1_c"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['online_environment1' => "Fair"])
        ->get();
        $Feedback["oe_q1_d"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['online_environment1' => "Poor"])
        ->get();
        $Feedback["oe_q1_e"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->whereNotNull('online_environment1')
        ->get();
        $Feedback["oe_q1_total"] = count($temp);

        /****************************************************************************
                    For Agents 
         ***************************************************************************/
        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['online_environment1' => "Excellent"])
        ->whereNotNull('accreditation_')
        ->get();
        $Feedback["agent_oe_q1_a"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['online_environment1' => "Very Good"])
        ->whereNotNull('accreditation_')
        ->get();
        $Feedback["agent_oe_q1_b"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['online_environment1' => "Good"])
        ->whereNotNull('accreditation_')
        ->get();
        $Feedback["agent_oe_q1_c"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['online_environment1' => "Fair"])
        ->whereNotNull('accreditation_')
        ->get();
        $Feedback["agent_oe_q1_d"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['online_environment1' => "Poor"])
        ->whereNotNull('accreditation_')
        ->get();
        $Feedback["agent_oe_q1_e"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->whereNotNull('accreditation_')
        ->whereNotNull('online_environment1')
        ->get();
        $Feedback["agent_oe_q1_total"] = count($temp);

        /****************************************************************************
                    For Public
         ***************************************************************************/
        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['online_environment1' => "Excellent"])
        ->whereNull('accreditation_')
        ->get();
        $Feedback["public_oe_q1_a"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['online_environment1' => "Very Good"])
        ->whereNull('accreditation_')
        ->get();
        $Feedback["public_oe_q1_b"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['online_environment1' => "Good"])
        ->whereNull('accreditation_')
        ->get();
        $Feedback["public_oe_q1_c"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['online_environment1' => "Fair"])
        ->whereNull('accreditation_')
        ->get();
        $Feedback["public_oe_q1_d"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['online_environment1' => "Poor"])
        ->whereNull('accreditation_')
        ->get();
        $Feedback["public_oe_q1_e"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->whereNull('accreditation_')
        ->whereNotNull('online_environment1')
        ->get();
        $Feedback["public_oe_q1_total"] = count($temp);

        return response()->json($Feedback);
    }

    /*--------------------------------------------------------------------------
                    Online Environment Q2
    ---------------------------------------------------------------------------*/
    public function OnlineEnvironmentQ2(Request $request){
        $from = $request->input('beginDate');
        $to = $request->input('endDate');

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['online_environment2' => "Excellent"])
        ->get();
        $Feedback["oe_q2_a"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['online_environment2' => "Very Good"])
        ->get();
        $Feedback["oe_q2_b"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['online_environment2' => "Good"])
        ->get();
        $Feedback["oe_q2_c"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['online_environment2' => "Fair"])
        ->get();
        $Feedback["oe_q2_d"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['online_environment2' => "Poor"])
        ->get();
        $Feedback["oe_q2_e"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->whereNotNull('online_environment2')
        ->get();
        $Feedback["oe_q2_total"] = count($temp);

        /****************************************************************************
                    For Agents 
         ***************************************************************************/
        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['online_environment2' => "Excellent"])
        ->whereNotNull('accreditation_')
        ->get();
        $Feedback["agent_oe_q2_a"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['online_environment2' => "Very Good"])
        ->whereNotNull('accreditation_')
        ->get();
        $Feedback["agent_oe_q2_b"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['online_environment2' => "Good"])
        ->whereNotNull('accreditation_')
        ->get();
        $Feedback["agent_oe_q2_c"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['online_environment2' => "Fair"])
        ->whereNotNull('accreditation_')
        ->get();
        $Feedback["agent_oe_q2_d"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['online_environment2' => "Poor"])
        ->whereNotNull('accreditation_')
        ->get();
        $Feedback["agent_oe_q2_e"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->whereNotNull('accreditation_')
        ->whereNotNull('online_environment2')
        ->get();
        $Feedback["agent_oe_q2_total"] = count($temp);

        /****************************************************************************
                    For Public
         ***************************************************************************/
        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['online_environment2' => "Excellent"])
        ->whereNull('accreditation_')
        ->get();
        $Feedback["public_oe_q2_a"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['online_environment2' => "Very Good"])
        ->whereNull('accreditation_')
        ->get();
        $Feedback["public_oe_q2_b"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['online_environment2' => "Good"])
        ->whereNull('accreditation_')
        ->get();
        $Feedback["public_oe_q2_c"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['online_environment2' => "Fair"])
        ->whereNull('accreditation_')
        ->get();
        $Feedback["public_oe_q2_d"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['online_environment2' => "Poor"])
        ->whereNull('accreditation_')
        ->get();
        $Feedback["public_oe_q2_e"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->whereNull('accreditation_')
        ->whereNotNull('online_environment2')
        ->get();
        $Feedback["public_oe_q2_total"] = count($temp);

        return response()->json($Feedback);
    }


    /*--------------------------------------------------------------------------
                    Online Environment Q3
    ---------------------------------------------------------------------------*/
    public function OnlineEnvironmentQ3(Request $request){
        $from = $request->input('beginDate');
        $to = $request->input('endDate');

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['online_environment3' => "Very Satisfied"])
        ->get();
        $Feedback["oe_q3_a"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['online_environment3' => "Satisfied"])
        ->get();
        $Feedback["oe_q3_b"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['online_environment3' => "Dissatisfied"])
        ->get();
        $Feedback["oe_q3_c"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['online_environment3' => "Very Dissatisfied"])
        ->get();
        $Feedback["oe_q3_d"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->whereNotNull('online_environment3')
        ->get();
        $Feedback["oe_q3_total"] = count($temp);

        /****************************************************************************
                    For Agents 
         ***************************************************************************/
        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['online_environment3' => "Very Satisfied"])
        ->whereNotNull('accreditation_')
        ->get();
        $Feedback["agent_oe_q3_a"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['online_environment3' => "Satisfied"])
        ->whereNotNull('accreditation_')
        ->get();
        $Feedback["agent_oe_q3_b"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['online_environment3' => "Dissatisfied"])
        ->whereNotNull('accreditation_')
        ->get();
        $Feedback["agent_oe_q3_c"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['online_environment3' => "Very Dissatisfied"])
        ->whereNotNull('accreditation_')
        ->get();
        $Feedback["agent_oe_q3_d"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->whereNotNull('accreditation_')
        ->whereNotNull('online_environment3')
        ->get();
        $Feedback["agent_oe_q3_total"] = count($temp);

        /****************************************************************************
                    For Public
         ***************************************************************************/
        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['online_environment3' => "Very Satisfied"])
        ->whereNull('accreditation_')
        ->get();
        $Feedback["public_oe_q3_a"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['online_environment3' => "Satisfied"])
        ->whereNull('accreditation_')
        ->get();
        $Feedback["public_oe_q3_b"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['online_environment3' => "Dissatisfied"])
        ->whereNull('accreditation_')
        ->get();
        $Feedback["public_oe_q3_c"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['online_environment3' => "Very Dissatisfied"])
        ->whereNull('accreditation_')
        ->get();
        $Feedback["public_oe_q3_d"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->whereNull('accreditation_')
        ->whereNotNull('online_environment3')
        ->get();
        $Feedback["public_oe_q3_total"] = count($temp);

        return response()->json($Feedback);
    }
}
