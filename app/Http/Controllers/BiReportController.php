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
        ->where(['accreditation_' => "Accredited User"])
        ->get();
        $Feedback["agent_sd_q1_a"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['service_delivery1' => "Satisfied"])
        ->where(['accreditation_' => "Accredited User"])
        ->get();
        $Feedback["agent_sd_q1_b"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['service_delivery1' => "Dissatisfied"])
        ->where(['accreditation_' => "Accredited User"])
        ->get();
        $Feedback["agent_sd_q1_c"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['service_delivery1' => "Very Dissatisfied"])
        ->where(['accreditation_' => "Accredited User"])
        ->get();
        $Feedback["agent_sd_q1_d"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->whereNotNull('service_delivery1')
        ->where(['accreditation_' => "Accredited User"])
        ->get();
        $Feedback["agent_sd_q1_total"] = count($temp);

        /****************************************************************************
                    For Public
         ***************************************************************************/
        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['service_delivery1' => "Very Satisfied"])
        ->where(['accreditation_' => "Public User"])
        ->get();
        $Feedback["public_sd_q1_a"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['service_delivery1' => "Satisfied"])
        ->where(['accreditation_' => "Public User"])
        ->get();
        $Feedback["public_sd_q1_b"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['service_delivery1' => "Dissatisfied"])
        ->where(['accreditation_' => "Public User"])
        ->get();
        $Feedback["public_sd_q1_c"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['service_delivery1' => "Very Dissatisfied"])
        ->where(['accreditation_' => "Public User"])
        ->get();
        $Feedback["public_sd_q1_d"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->whereNotNull('service_delivery1')
        ->where(['accreditation_' => "Public User"])
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
        ->where(['accreditation_' => "Accredited User"])
        ->get();
        $Feedback["agent_sd_q2_a"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['service_delivery2' => "Business Names"])
        ->where(['accreditation_' => "Accredited User"])
        ->get();
        $Feedback["agent_sd_q2_b"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['service_delivery2' => "Incorporated Trustees"])
        ->where(['accreditation_' => "Accredited User"])
        ->get();
        $Feedback["agent_sd_q2_c"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['service_delivery2' => "Limited Partnership (LP)"])
        ->where(['accreditation_' => "Accredited User"])
        ->get();
        $Feedback["agent_sd_q2_d"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['service_delivery2' => "Limited Liability Partnership (LLP)"])
        ->where(['accreditation_' => "Accredited User"])
        ->get();
        $Feedback["agent_sd_q2_e"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['accreditation_' => "Accredited User"])
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
        ->where(['accreditation_' => "Public User"])
        ->get();
        $Feedback["public_sd_q2_a"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['service_delivery2' => "Business Names"])
        ->where(['accreditation_' => "Public User"])
        ->get();
        $Feedback["public_sd_q2_b"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['service_delivery2' => "Incorporated Trustees"])
        ->where(['accreditation_' => "Public User"])
        ->get();
        $Feedback["public_sd_q2_c"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['service_delivery2' => "Limited Partnership (LP)"])
        ->where(['accreditation_' => "Public User"])
        ->get();
        $Feedback["public_sd_q2_d"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['service_delivery2' => "Limited Liability Partnership (LLP)"])
        ->where(['accreditation_' => "Public User"])
        ->get();
        $Feedback["public_sd_q2_e"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['accreditation_' => "Public User"])
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
        ->where(['accreditation_' => "Accredited User"])
        ->get();
        $Feedback["agent_q_a"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['quality_' => "Satisfied"])
        ->where(['accreditation_' => "Accredited User"])
        ->get();
        $Feedback["agent_q_b"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['quality_' => "Dissatisfied"])
        ->where(['accreditation_' => "Accredited User"])
        ->get();
        $Feedback["agent_q_c"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['quality_' => "Very Dissatisfied"])
        ->where(['accreditation_' => "Accredited User"])
        ->get();
        $Feedback["agent_q_d"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->whereNotNull('quality_')
        ->where(['accreditation_' => "Accredited User"])
        ->get();
        $Feedback["agent_q_total"] = count($temp);

        /****************************************************************************
                    For Public
         ***************************************************************************/
        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['quality_' => "Very Satisfied"])
        ->where(['accreditation_' => "Public User"])
        ->get();
        $Feedback["public_q_a"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['quality_' => "Satisfied"])
        ->where(['accreditation_' => "Public User"])
        ->get();
        $Feedback["public_q_b"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['quality_' => "Dissatisfied"])
        ->where(['accreditation_' => "Public User"])
        ->get();
        $Feedback["public_q_c"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['quality_' => "Very Dissatisfied"])
        ->where(['accreditation_' => "Public User"])
        ->get();
        $Feedback["public_q_d"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->whereNotNull('quality_')
        ->where(['accreditation_' => "Public User"])
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
        ->where(['timelines1' => "Less than 24 Hrs"])
        ->get();
        $Feedback["t_q1_a"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timelines1' => "24 Hrs"])
        ->get();
        $Feedback["t_q1_b"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timelines1' => "48 Hrs"])
        ->get();
        $Feedback["t_q1_c"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timelines1' => "3 Days"])
        ->get();
        $Feedback["t_q1_d"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timelines1' => "Over 3 Days"])
        ->get();
        $Feedback["t_q1_e"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->whereNotNull('timelines1')
        ->get();
        $Feedback["t_q1_total"] = count($temp);

        /****************************************************************************
                    For Agents 
         ***************************************************************************/
        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timelines1' => "Less than 24 Hrs"])
        ->where(['accreditation_' => "Accredited User"])
        ->get();
        $Feedback["agent_t_q1_a"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timelines1' => "24 Hrs"])
        ->where(['accreditation_' => "Accredited User"])
        ->get();
        $Feedback["agent_t_q1_b"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timelines1' => "48 Hrs"])
        ->where(['accreditation_' => "Accredited User"])
        ->get();
        $Feedback["agent_t_q1_c"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timelines1' => "3 Days"])
        ->where(['accreditation_' => "Accredited User"])
        ->get();
        $Feedback["agent_t_q1_d"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timelines1' => "Over 3 Days"])
        ->where(['accreditation_' => "Accredited User"])
        ->get();
        $Feedback["agent_t_q1_e"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['accreditation_' => "Accredited User"])
        ->whereNotNull('timelines1')
        ->get();
        $Feedback["agent_t_q1_total"] = count($temp);

        /****************************************************************************
                    For Public
         ***************************************************************************/
        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timelines1' => "Less than 24 Hrs"])
        ->where(['accreditation_' => "Public User"])
        ->get();
        $Feedback["public_t_q1_a"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timelines1' => "24 Hrs"])
        ->where(['accreditation_' => "Public User"])
        ->get();
        $Feedback["public_t_q1_b"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timelines1' => "48 Hrs"])
        ->where(['accreditation_' => "Public User"])
        ->get();
        $Feedback["public_t_q1_c"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timelines1' => "3 Days"])
        ->where(['accreditation_' => "Public User"])
        ->get();
        $Feedback["public_t_q1_d"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timelines1' => "Over 3 Days"])
        ->where(['accreditation_' => "Public User"])
        ->get();
        $Feedback["public_t_q1_e"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['accreditation_' => "Public User"])
        ->whereNotNull('timelines1')
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
        ->where(['timelines2' => "Email"])
        ->get();
        $Feedback["t_q2_a"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timelines2' => "Telephone"])
        ->get();
        $Feedback["t_q2_b"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timelines2' => "Face to Face"])
        ->get();
        $Feedback["t_q2_c"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timelines2' => "Online Support Ticket System"])
        ->get();
        $Feedback["t_q2_d"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timelines2' => "Others"])
        ->get();
        $Feedback["t_q2_e"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->whereNotNull('timelines2')
        ->get();
        $Feedback["t_q2_total"] = count($temp);

        /****************************************************************************
                    For Agents 
         ***************************************************************************/
        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timelines2' => "Email"])
        ->where(['accreditation_' => "Accredited User"])
        ->get();
        $Feedback["agent_t_q2_a"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timelines2' => "Telephone"])
        ->where(['accreditation_' => "Accredited User"])
        ->get();
        $Feedback["agent_t_q2_b"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timelines2' => "Face to Face"])
        ->where(['accreditation_' => "Accredited User"])
        ->get();
        $Feedback["agent_t_q2_c"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timelines2' => "Online Support Ticket System"])
        ->where(['accreditation_' => "Accredited User"])
        ->get();
        $Feedback["agent_t_q2_d"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timelines2' => "Others"])
        ->where(['accreditation_' => "Accredited User"])
        ->get();
        $Feedback["agent_t_q2_e"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['accreditation_' => "Accredited User"])
        ->whereNotNull('timelines2')
        ->get();
        $Feedback["agent_t_q2_total"] = count($temp);

        /****************************************************************************
                    For Public
         ***************************************************************************/
        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timelines2' => "Email"])
        ->where(['accreditation_' => "Public User"])
        ->get();
        $Feedback["public_t_q2_a"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timelines2' => "Telephone"])
        ->where(['accreditation_' => "Public User"])
        ->get();
        $Feedback["public_t_q2_b"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timelines2' => "Face to Face"])
        ->where(['accreditation_' => "Public User"])
        ->get();
        $Feedback["public_t_q2_c"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timelines2' => "Online Support Ticket System"])
        ->where(['accreditation_' => "Public User"])
        ->get();
        $Feedback["public_t_q2_d"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timelines2' => "Others"])
        ->where(['accreditation_' => "Public User"])
        ->get();
        $Feedback["public_t_q2_e"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['accreditation_' => "Public User"])
        ->whereNotNull('timelines2')
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
        ->where(['timelines3' => "Very Satisfied"])
        ->get();
        $Feedback["t_q3_a"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timelines3' => "Satisfied"])
        ->get();
        $Feedback["t_q3_b"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timelines3' => "Dissatisfied"])
        ->get();
        $Feedback["t_q3_c"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timelines3' => "Very Dissatisfied"])
        ->get();
        $Feedback["t_q3_d"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->whereNotNull('timelines3')
        ->get();
        $Feedback["t_q3_total"] = count($temp);

        /****************************************************************************
                    For Agents 
         ***************************************************************************/
        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timelines3' => "Very Satisfied"])
        ->where(['accreditation_' => "Accredited User"])
        ->get();
        $Feedback["agent_t_q3_a"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timelines3' => "Satisfied"])
        ->where(['accreditation_' => "Accredited User"])
        ->get();
        $Feedback["agent_t_q3_b"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timelines3' => "Dissatisfied"])
        ->where(['accreditation_' => "Accredited User"])
        ->get();
        $Feedback["agent_t_q3_c"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timelines3' => "Very Dissatisfied"])
        ->where(['accreditation_' => "Accredited User"])
        ->get();
        $Feedback["agent_t_q3_d"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['accreditation_' => "Accredited User"])
        ->whereNotNull('timelines3')
        ->get();
        $Feedback["agent_t_q3_total"] = count($temp);

        /****************************************************************************
                    For Public
         ***************************************************************************/
        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timelines3' => "Very Satisfied"])
        ->where(['accreditation_' => "Public User"])
        ->get();
        $Feedback["public_t_q3_a"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timelines3' => "Satisfied"])
        ->where(['accreditation_' => "Public User"])
        ->get();
        $Feedback["public_t_q3_b"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timelines3' => "Dissatisfied"])
        ->where(['accreditation_' => "Public User"])
        ->get();
        $Feedback["public_t_q3_c"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timelines3' => "Very Dissatisfied"])
        ->where(['accreditation_' => "Public User"])
        ->get();
        $Feedback["public_t_q3_d"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['accreditation_' => "Public User"])
        ->whereNotNull('timelines3')
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
        ->where(['timelines4' => "Excellent"])
        ->get();
        $Feedback["t_q4_a"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timelines4' => "Very Good"])
        ->get();
        $Feedback["t_q4_b"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timelines4' => "Good"])
        ->get();
        $Feedback["t_q4_c"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timelines4' => "Fair"])
        ->get();
        $Feedback["t_q4_d"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timelines4' => "Poor"])
        ->get();
        $Feedback["t_q4_e"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->whereNotNull('timelines4')
        ->get();
        $Feedback["t_q4_total"] = count($temp);

        /****************************************************************************
                    For Agents 
         ***************************************************************************/
        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timelines4' => "Excellent"])
        ->where(['accreditation_' => "Accredited User"])
        ->get();
        $Feedback["agent_t_q4_a"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timelines4' => "Very Good"])
        ->where(['accreditation_' => "Accredited User"])
        ->get();
        $Feedback["agent_t_q4_b"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timelines4' => "Good"])
        ->where(['accreditation_' => "Accredited User"])
        ->get();
        $Feedback["agent_t_q4_c"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timelines4' => "Fair"])
        ->where(['accreditation_' => "Accredited User"])
        ->get();
        $Feedback["agent_t_q4_d"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timelines4' => "Poor"])
        ->where(['accreditation_' => "Accredited User"])
        ->get();
        $Feedback["agent_t_q4_e"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['accreditation_' => "Accredited User"])
        ->whereNotNull('timelines4')
        ->get();
        $Feedback["agent_t_q4_total"] = count($temp);

        /****************************************************************************
                    For Public
         ***************************************************************************/
        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timelines4' => "Excellent"])
        ->where(['accreditation_' => "Public User"])
        ->get();
        $Feedback["public_t_q4_a"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timelines4' => "Very Good"])
        ->where(['accreditation_' => "Public User"])
        ->get();
        $Feedback["public_t_q4_b"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timelines4' => "Good"])
        ->where(['accreditation_' => "Public User"])
        ->get();
        $Feedback["public_t_q4_c"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timelines4' => "Fair"])
        ->where(['accreditation_' => "Public User"])
        ->get();
        $Feedback["public_t_q4_d"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['timelines4' => "Poor"])
        ->where(['accreditation_' => "Public User"])
        ->get();
        $Feedback["public_t_q4_e"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['accreditation_' => "Public User"])
        ->whereNotNull('timelines4')
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
        ->where(['accreditation_' => "Accredited User"])
        ->get();
        $Feedback["agent_oe_q1_a"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['online_environment1' => "Very Good"])
        ->where(['accreditation_' => "Accredited User"])
        ->get();
        $Feedback["agent_oe_q1_b"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['online_environment1' => "Good"])
        ->where(['accreditation_' => "Accredited User"])
        ->get();
        $Feedback["agent_oe_q1_c"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['online_environment1' => "Fair"])
        ->where(['accreditation_' => "Accredited User"])
        ->get();
        $Feedback["agent_oe_q1_d"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['online_environment1' => "Poor"])
        ->where(['accreditation_' => "Accredited User"])
        ->get();
        $Feedback["agent_oe_q1_e"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['accreditation_' => "Accredited User"])
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
        ->where(['accreditation_' => "Public User"])
        ->get();
        $Feedback["public_oe_q1_a"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['online_environment1' => "Very Good"])
        ->where(['accreditation_' => "Public User"])
        ->get();
        $Feedback["public_oe_q1_b"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['online_environment1' => "Good"])
        ->where(['accreditation_' => "Public User"])
        ->get();
        $Feedback["public_oe_q1_c"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['online_environment1' => "Fair"])
        ->where(['accreditation_' => "Public User"])
        ->get();
        $Feedback["public_oe_q1_d"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['online_environment1' => "Poor"])
        ->where(['accreditation_' => "Public User"])
        ->get();
        $Feedback["public_oe_q1_e"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['accreditation_' => "Public User"])
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
        ->where(['online_environment2' => "Not Applicable"])
        ->get();
        $Feedback["oe_q2_f"] = count($temp);

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
        ->where(['accreditation_' => "Accredited User"])
        ->get();
        $Feedback["agent_oe_q2_a"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['online_environment2' => "Very Good"])
        ->where(['accreditation_' => "Accredited User"])
        ->get();
        $Feedback["agent_oe_q2_b"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['online_environment2' => "Good"])
        ->where(['accreditation_' => "Accredited User"])
        ->get();
        $Feedback["agent_oe_q2_c"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['online_environment2' => "Fair"])
        ->where(['accreditation_' => "Accredited User"])
        ->get();
        $Feedback["agent_oe_q2_d"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['online_environment2' => "Poor"])
        ->where(['accreditation_' => "Accredited User"])
        ->get();
        $Feedback["agent_oe_q2_e"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['online_environment2' => "Not Applicable"])
        ->where(['accreditation_' => "Accredited User"])
        ->get();
        $Feedback["agent_oe_q2_f"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['accreditation_' => "Accredited User"])
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
        ->where(['accreditation_' => "Public User"])
        ->get();
        $Feedback["public_oe_q2_a"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['online_environment2' => "Very Good"])
        ->where(['accreditation_' => "Public User"])
        ->get();
        $Feedback["public_oe_q2_b"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['online_environment2' => "Good"])
        ->where(['accreditation_' => "Public User"])
        ->get();
        $Feedback["public_oe_q2_c"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['online_environment2' => "Fair"])
        ->where(['accreditation_' => "Public User"])
        ->get();
        $Feedback["public_oe_q2_d"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['online_environment2' => "Poor"])
        ->where(['accreditation_' => "Public User"])
        ->get();
        $Feedback["public_oe_q2_e"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['online_environment2' => "Not Applicable"])
        ->where(['accreditation_' => "Public User"])
        ->get();
        $Feedback["public_oe_q2_f"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['accreditation_' => "Public User"])
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
        ->where(['accreditation_' => "Accredited User"])
        ->get();
        $Feedback["agent_oe_q3_a"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['online_environment3' => "Satisfied"])
        ->where(['accreditation_' => "Accredited User"])
        ->get();
        $Feedback["agent_oe_q3_b"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['online_environment3' => "Dissatisfied"])
        ->where(['accreditation_' => "Accredited User"])
        ->get();
        $Feedback["agent_oe_q3_c"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['online_environment3' => "Very Dissatisfied"])
        ->where(['accreditation_' => "Accredited User"])
        ->get();
        $Feedback["agent_oe_q3_d"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['accreditation_' => "Accredited User"])
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
        ->where(['accreditation_' => "Public User"])
        ->get();
        $Feedback["public_oe_q3_a"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['online_environment3' => "Satisfied"])
        ->where(['accreditation_' => "Public User"])
        ->get();
        $Feedback["public_oe_q3_b"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['online_environment3' => "Dissatisfied"])
        ->where(['accreditation_' => "Public User"])
        ->get();
        $Feedback["public_oe_q3_c"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['online_environment3' => "Very Dissatisfied"])
        ->where(['accreditation_' => "Public User"])
        ->get();
        $Feedback["public_oe_q3_d"] = count($temp);

        $temp = Questions::select('*')
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '>=', date($from))
        ->where(\DB::raw("DATE_FORMAT(date_, '%Y-%m-%d')"), '<=', date($to))
        ->where(['accreditation_' => "Public User"])
        ->whereNotNull('online_environment3')
        ->get();
        $Feedback["public_oe_q3_total"] = count($temp);

        return response()->json($Feedback);
    }
}
