<template>
    <div>
        <div class="row">
            <div class="col-sm-12">
                <NavBar />
            </div>
        </div>
        <br />
        <br />
        <!-- Beginning of Center -->
        <!-- Heading -->
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-10">
                <h2 style="border-bottom: 1px solid #DDDDDD">{{header_1}}</h2>
                <br />
            </div>
            <div class="col-sm-1">
            </div>
        </div>

        <div class="row">
            <div class="col-sm-3">
            </div>
            <div class="col-sm-6">
                <span v-html="AlertMsg"></span>
            </div>
            <div class="col-sm-3">
            </div>
        </div>
    
        <!-- -------------------------------------------------------------
                                Main Stuff Here
        -------------------------------------------------------------- -->
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-10"> <!-- Card Containing Report Here -->
                <div class="card bg-white mb-4 shadow-sm" style="width: 100%; border-radius: 0.5em; border-bottom: 1px solid #93C572">
                    <div class="card-body">
                        <br />
                        <form @submit.prevent="GenerateReport" validate>
                            <div class="row">
                                <div class="col-sm-6">
                                    <h5 class="card-subtitle mb-2" style="border-bottom: 1px solid #DDDDDD; color: #8FBC8F">Date Range   <i class="fas fa-calendar-week"></i></h5>
                                    <br />
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div class="col-sm-1">
                                                </div>
                                                <div class="col-sm-4 align-middle">
                                                    <strong>Beginning Date Range:</strong><b class="text-danger">*</b>
                                                </div>
                                            </div>
                                        
                                            <div class = "row">
                                                <div class="col-sm-1">
                                                </div>
                                                <div class="col-sm-10 align-left">
                                                    <div class="form-group">
                                                        <div class="input-group date" data-provide="datepicker">
                                                            <span class="input-group-text">
                                                                <span class="fas fa-calendar-day" style="color: #8FBC8F"></span>
                                                            </span>                    
                                                            <input v-model="beginDate" type="date" class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br />
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div class="col-sm-1">
                                                </div>
                                                <div class="col-sm-4 align-middle">
                                                    <strong>Ending Date Range:</strong><b class="text-danger">*</b>
                                                </div>
                                            </div>
                                        
                                            <div class = "row">
                                                <div class="col-sm-1">
                                                </div>
                                                <div class="col-sm-10 align-left">
                                                    <div class="form-group">
                                                        <div class="input-group date" data-provide="datepicker">
                                                            <span class="input-group-text">
                                                                <span class="fas fa-calendar-day" style="color: #8FBC8F"></span>
                                                            </span>                    
                                                            <input v-model="endDate" type="date" class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <h5 class="card-subtitle mb-2" style="border-bottom: 1px solid #DDDDDD; color: #8FBC8F">Report Items <i class="fas fa-clipboard-list"></i></h5>
                                    <dl class="row">
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-11">
                                            <div class="form-check "><br />
                                                <input class="form-check-input" id="sd" type="checkbox" v-model="serviceDeliveryBox" value="Service Delivery" aria-label="..." @change="check($event)">
                                                <label for="sd"> Service Delivery</label>
                                                <span></span>
                                            </div>

                                            <div class="form-check "><br />
                                                <input class="form-check-input" id="q" type="checkbox" v-model="qualityBox" value="Quality" @change="check($event)">
                                                <label for="q"> Quality</label>
                                                <span></span>
                                            </div>

                                            <div class="form-check "><br />
                                                <input class="form-check-input" id="t" type="checkbox" v-model="timelinessBox" value="Timeliness" @change="check($event)">
                                                <label for="t"> Timeliness</label>
                                                <span></span>
                                            </div>

                                            <div class="form-check "><br />
                                                <input class="form-check-input" id="oe" type="checkbox" v-model="onlineEnvBox" value="Online Environment" @change="check($event)">
                                                <label for="oe"> Online Environment</label>
                                                <span></span>
                                            </div>

                                            <div class="form-check "><br />
                                                <input class="form-check-input" id="c" type="checkbox" v-model="challengesBox" value="Challenges" @change="check($event)">
                                                <label for="c"> Challenges</label>
                                                <span></span>
                                            </div>
                                        </div>
                                    </dl>
                                </div>
                            </div>
                            <br /><br />
                            <div class="row" style="font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif"><!-- Update Button -->
                                <div class="col-sm-4">
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group d-grid gap-2">
                                        <button :disabled="enableSubmit" type="submit" class="btn btn-success btn-block">
                                            <span>Generate Business Intelligence Report</span>
                                            <span v-html="rotor"></span>
                                        </button> 
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                </div>
                            </div><!--End Button-->
                        </form>
                        <hr class="separator">
                        <br />
                        <br />
                        <div class="row">
                            <div class="col-sm-12">
                                <span v-html="loader"></span>
                            </div>
                        </div>


                        <!-- *******************************************************************************************************************
                                                                        Report Section Below
                             ****************************************************************************************************************-->

                        <!-- *******************************************************************************************************************
                                                                        Service Delivery
                             ****************************************************************************************************************-->
                        <div v-show="revealAll">
                            <center><h2 class="text-uppercase" style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; color: #8FBC8F"><b>{{header_2}}</b></h2></center>
                            <div class="row" v-show="this.serviceDeliverySelected"> <!-- Service Delivery -->
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-1">
                                        </div>
                                        <div class="col-sm-11 d-flex p-2">
                                            <h3 style="border-bottom: 2px solid #8FBC8F">Service Delivery</h3>
                                        </div>
                                    </div>
                                    <div class="row"> <!-- Service Delivery Question 1 -->
                                        <div class="col-sm-1">
                                        </div>
                                        <div class="col-sm-10"><!-- Begin Numbers -->
                                            <div class="row">
                                                <div class="col-sm-10"><i class="fas fa-question-circle"></i>  <b>Are you satisfied with the conduct of the Name Availability for your registration?</b></div>
                                            </div>
                                            <br />
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <b>Participants</b>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <b>Combined</b>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <b>Agents</b>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <b>Public</b>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            Total:
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            Very Satisfied:
                                                        </li>
                                                    
                                                        <li class="list-group-item" style="border:none">
                                                            Satisfied
                                                        </li>
                                                        
                                                        <li class="list-group-item" style="border:none">
                                                            Dissatisfied
                                                        </li>
                                                        
                                                        <li class="list-group-item" style="border:none">
                                                            Very Dissatisfied
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3"> <!-- For Charts -->
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="sd_q1_total"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="sd_q1_a"></span>
                                                        </li>
                                                    
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="sd_q1_b"></span>
                                                        </li>
                                                        
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="sd_q1_c"></span>
                                                        </li>
                                                        
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="sd_q1_d"></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3"> <!-- For Charts -->
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="agent_sd_q1_total"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="agent_sd_q1_a"></span>
                                                        </li>
                                                    
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="agent_sd_q1_b"></span>
                                                        </li>
                                                        
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="agent_sd_q1_c"></span>
                                                        </li>
                                                        
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="agent_sd_q1_d"></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3"> <!-- For Charts -->
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="public_sd_q1_total"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="public_sd_q1_a"></span>
                                                        </li>
                                                    
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="public_sd_q1_b"></span>
                                                        </li>
                                                        
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="public_sd_q1_c"></span>
                                                        </li>
                                                        
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="public_sd_q1_d"></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <br />
                                            <div class="row">
                                                <div class="col-sm-3">
                                                </div>
                                                <div class="col-sm-3">
                                                    <SdQ1aChart v-if="Sd_Q1_loaded"  :_chartData="this.Sd_Q1_C_chartData" :height="270" />
                                                </div>
                                                <div class="col-sm-3">
                                                    <SdQ1cChart v-if="Sd_Q1_loaded"  :_chartData="this.Sd_Q1_A_chartData" :height="270" />
                                                </div>
                                                <div class="col-sm-3">
                                                    <SdQ1cChart v-if="Sd_Q1_loaded"  :_chartData="this.Sd_Q1_P_chartData" :height="270" />
                                                </div>
                                            </div>
                                            <br />
                                        </div><!-- End Numbers -->
                                        <div class="col-sm-1"><!-- Begin Chart -->
                                        </div><!-- End Chart -->
                                    </div>
                                    
                                    <br />
                                    <div class="row"> <!-- Service Delivery Question 2 -->
                                        <div class="col-sm-1">
                                        </div>
                                        <div class="col-sm-10"><!-- Begin Numbers -->
                                            <div class="row">
                                                <div class="col-sm-10"><i class="fas fa-question-circle"></i>  <b>Which registration service have you done online?</b></div>
                                            </div>
                                            <br />
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <b>Participants</b>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <b>Combined</b>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <b>Agents</b>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <b>Public</b>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            Total:
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            Company (LLC):
                                                        </li>
                                                    
                                                        <li class="list-group-item" style="border:none">
                                                            Business Names
                                                        </li>
                                                        
                                                        <li class="list-group-item" style="border:none">
                                                            Incorporated Trustees
                                                        </li>
                                                        
                                                        <li class="list-group-item" style="border:none">
                                                            Limited Partnership
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            Limited Liability Partnership
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="sd_q2_total"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="sd_q2_a"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="sd_q2_b"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="sd_q2_c"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="sd_q2_d"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="sd_q2_e"></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="agent_sd_q2_total"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="agent_sd_q2_a"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="agent_sd_q2_b"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="agent_sd_q2_c"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="agent_sd_q2_d"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="agent_sd_q2_e"></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="public_sd_q2_total"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="public_sd_q2_a"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="public_sd_q2_b"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="public_sd_q2_c"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="public_sd_q2_d"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="public_sd_q2_e"></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <br />
                                            <div class="row">
                                                <div class="col-sm-3">
                                                </div>
                                                <div class="col-sm-3">
                                                    <SdQ2cChart v-if="Sd_Q2_loaded"  :_chartData="this.Sd_Q2_C_chartData" :height="350" />
                                                </div>
                                                <div class="col-sm-3">
                                                    <SdQ2aChart v-if="Sd_Q2_loaded"  :_chartData="this.Sd_Q2_A_chartData" :height="350" />
                                                </div>
                                                <div class="col-sm-3">
                                                    <SdQ2pChart v-if="Sd_Q2_loaded"  :_chartData="this.Sd_Q2_P_chartData" :height="350" />
                                                </div>
                                            </div>
                                        </div><!-- End Numbers -->
                                        <div class="col-sm-1"><!-- Begin Chart -->
                                        </div><!-- End Chart -->
                                    </div>
                                </div> <!-- End of Column 12 -->
                            </div><!-- End of Service Delivery-->

                            <br />
                            <br />

                            <!-- *******************************************************************************************************************
                                                                            Quality
                                ****************************************************************************************************************-->
                            <div class="row" v-show="qualitySelected"> <!-- Quality -->
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-1">
                                        </div>
                                        <div class="col-sm-11 d-flex p-2">
                                            <h3 style="border-bottom: 2px solid #8FBC8F">Quality</h3>
                                        </div>
                                    </div>
                                    <div class="row"> <!-- Quality Question 1 -->
                                        <div class="col-sm-1">
                                        </div>
                                        <div class="col-sm-10"><!-- Begin Numbers -->
                                            <div class="row">
                                                <div class="col-sm-10"><i class="fas fa-question-circle"></i>  <b>How satisfied are you with the services we provide?</b></div>
                                            </div>
                                            <br />
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <b>Participants</b>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <b>Combined</b>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <b>Agents</b>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <b>Public</b>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            Total:
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            Very Satisfied:
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            Satisfied
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            Dissatisfied
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            Very Dissatisfied
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="q_total"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="q_a"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="q_b"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="q_c"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="q_d"></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3"> 
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="agent_q_total"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="agent_q_a"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="agent_q_b"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="agent_q_c"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="agent_q_d"></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3"> <!-- For Charts -->
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="public_q_total"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="public_q_a"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="public_q_b"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="public_q_c"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="public_q_d"></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <br />
                                            <div class="row">
                                                <div class="col-sm-3">
                                                </div>
                                                <div class="col-sm-3">
                                                    <QQ1cChart v-if="Q_Q1_loaded"  :_chartData="this.Q_Q1_C_chartData" :height="270" />
                                                </div>
                                                <div class="col-sm-3">
                                                    <QQ1aChart v-if="Q_Q1_loaded"  :_chartData="this.Q_Q1_A_chartData" :height="270" />
                                                </div>
                                                <div class="col-sm-3">
                                                    <QQ1pChart v-if="Q_Q1_loaded"  :_chartData="this.Q_Q1_P_chartData" :height="270" />
                                                </div>
                                            </div>
                                        </div><!-- End Numbers -->
                                        <div class="col-sm-1"><!-- Begin Chart -->
                                        </div><!-- End Chart -->
                                    </div>
                                    <br />
                                </div> <!-- End of Column 12 -->
                            </div><!-- End of Quality-->

                            <br />
                            <br />

                            <!-- *******************************************************************************************************************
                                                                            Timeliness
                                ****************************************************************************************************************-->
                            <div class="row" v-show="timelinessSelected"> <!-- Timeliness -->
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-1">
                                        </div>
                                        <div class="col-sm-11 d-flex p-2">
                                            <h3 style="border-bottom: 2px solid #8FBC8F">Timeliness</h3>
                                        </div>
                                    </div>
                                    <div class="row"> <!-- Timeliness Question 1 -->
                                        <div class="col-sm-1">
                                        </div>
                                        <div class="col-sm-10"><!-- Begin Numbers -->
                                            <div class="row">
                                                <div class="col-sm-10"><i class="fas fa-question-circle"></i>  <b>How fast did we deliver the services you asked for?</b></div>
                                            </div>
                                            <br />
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <b>Participants</b>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <b>Combined</b>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <b>Agents</b>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <b>Public</b>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            Total:
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            Less than 24 Hours:
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            24 Hours:
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            48 Hours:
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            3 Days:
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            Over 3 Days:
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="t_q1_total"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="t_q1_a"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="t_q1_b"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="t_q1_c"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="t_q1_d"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="t_q1_e"></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="agent_t_q1_total"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="agent_t_q1_a"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="agent_t_q1_b"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="agent_t_q1_c"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="agent_t_q1_d"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="agent_t_q1_e"></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="public_t_q1_total"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="public_t_q1_a"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="public_t_q1_b"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="public_t_q1_c"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="public_t_q1_d"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="public_t_q1_e"></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <br />
                                            <div class="row">
                                                <div class="col-sm-3">
                                                </div>
                                                <div class="col-sm-3">
                                                    <TQ1cChart v-if="T_Q1_loaded"  :_chartData="this.T_Q1_C_chartData" :height="270" />
                                                </div>
                                                <div class="col-sm-3">
                                                    <TQ1aChart v-if="T_Q1_loaded"  :_chartData="this.T_Q1_A_chartData" :height="270" />
                                                </div>
                                                <div class="col-sm-3">
                                                    <TQ1pChart v-if="T_Q1_loaded"  :_chartData="this.T_Q1_P_chartData" :height="270" />
                                                </div>
                                            </div>
                                        </div><!-- End Numbers -->
                                        <div class="col-sm-5">
                                        </div><!-- End Chart -->
                                    </div>
                                    <br />
                                    <div class="row"> <!-- Timeliness Question 2 -->
                                        <div class="col-sm-1">
                                        </div>
                                        <div class="col-sm-10"><!-- Begin Numbers -->
                                            <div class="row">
                                                <div class="col-sm-10"><i class="fas fa-question-circle"></i>  <b>Which was your preferred channel of communicating the complaints?</b></div>
                                            </div>
                                            <br />
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <b>Participants</b>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <b>Combined</b>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <b>Agents</b>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <b>Public</b>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            Total:
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            Email:
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            Telephone:
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            Face-to-Face:
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            Online Support Ticket System:
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            Others:
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="t_q2_total"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="t_q2_a"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="t_q2_b"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="t_q2_c"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="t_q2_d"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="t_q2_e"></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="agent_t_q2_total"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="agent_t_q2_a"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="agent_t_q2_b"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="agent_t_q2_c"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="agent_t_q2_d"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="agent_t_q2_e"></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="public_t_q2_total"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="public_t_q2_a"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="public_t_q2_b"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="public_t_q2_c"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="public_t_q2_d"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="public_t_q2_e"></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <br />
                                            <div class="row">
                                                <div class="col-sm-3">
                                                </div>
                                                <div class="col-sm-3">
                                                    <TQ2cChart v-if="T_Q2_loaded"  :_chartData="this.T_Q2_C_chartData" :height="350" />
                                                </div>
                                                <div class="col-sm-3">
                                                    <TQ2aChart v-if="T_Q2_loaded"  :_chartData="this.T_Q2_A_chartData" :height="350" />
                                                </div>
                                                <div class="col-sm-3">
                                                    <TQ2pChart v-if="T_Q2_loaded"  :_chartData="this.T_Q2_P_chartData" :height="350" />
                                                </div>
                                            </div>
                                        </div><!-- End Numbers -->
                                        <div class="col-sm-5">
                                        </div>
                                    </div>
                                    <br /><br />
                                    <div class="row"> <!-- Timeliness Question 3 -->
                                        <div class="col-sm-1">
                                        </div>
                                        <div class="col-sm-10"><!-- Begin Numbers -->
                                            <div class="row">
                                                <div class="col-sm-10"><i class="fas fa-question-circle"></i>  <b>Were you satisfied with the way the complaint was handled?</b></div>
                                            </div>
                                            <br />
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <b>Participants</b>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <b>Combined</b>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <b>Agents</b>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <b>Public</b>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            Total:
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            Very Satisfied:
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            Satisfied:
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            Dissatisfied:
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            Very Dissatisfied:
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="t_q3_total"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="t_q3_a"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="t_q3_b"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="t_q3_c"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="t_q3_d"></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="agent_t_q3_total"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="agent_t_q3_a"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="agent_t_q3_b"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="agent_t_q3_c"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="agent_t_q3_d"></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="public_t_q3_total"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="public_t_q3_a"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="public_t_q3_b"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="public_t_q3_c"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="public_t_q3_d"></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                </div>
                                                <div class="col-sm-3">
                                                    <TQ3cChart v-if="T_Q3_loaded"  :_chartData="this.T_Q3_C_chartData" :height="270" />
                                                </div>
                                                <div class="col-sm-3">
                                                    <TQ3aChart v-if="T_Q3_loaded"  :_chartData="this.T_Q3_A_chartData" :height="270" />
                                                </div>
                                                <div class="col-sm-3">
                                                    <TQ3pChart v-if="T_Q3_loaded"  :_chartData="this.T_Q3_P_chartData" :height="270" />
                                                </div>
                                            </div>
                                        </div><!-- End Numbers -->
                                        <div class="col-sm-5"><!-- Begin Chart -->
                                        </div><!-- End Chart -->
                                    </div>
                                    <br />
                                    <div class="row"> <!-- Timeliness Question 4 -->
                                        <div class="col-sm-1">
                                        </div>
                                        <div class="col-sm-10"><!-- Begin Numbers -->
                                            <div class="row">
                                                <div class="col-sm-10"><i class="fas fa-question-circle"></i>  <b>How helpful did you find our Staff?</b></div>
                                            </div>
                                            <br />
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <b>Participants</b>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <b>Combined</b>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <b>Agents</b>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <b>Public</b>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            Total:
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            Excellent:
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            Very Good:
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            Good:
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            Fair:
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            Poor:
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="t_q4_total"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="t_q4_a"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="t_q4_b"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="t_q4_c"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="t_q4_d"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="t_q4_e"></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="agent_t_q4_total"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="agent_t_q4_a"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="agent_t_q4_b"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="agent_t_q4_c"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="agent_t_q4_d"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="agent_t_q4_e"></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="public_t_q4_total"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="public_t_q4_a"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="public_t_q4_b"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="public_t_q4_c"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="public_t_q4_d"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="public_t_q4_e"></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                </div>
                                                <div class="col-sm-3">
                                                    <TQ4cChart v-if="T_Q4_loaded"  :_chartData="this.T_Q4_C_chartData" :height="270" />
                                                </div>
                                                <div class="col-sm-3">
                                                    <TQ4aChart v-if="T_Q4_loaded"  :_chartData="this.T_Q4_A_chartData" :height="270" />
                                                </div>
                                                <div class="col-sm-3">
                                                    <TQ4pChart v-if="T_Q4_loaded"  :_chartData="this.T_Q4_P_chartData" :height="270" />
                                                </div>
                                            </div>
                                        </div><!-- End Numbers -->
                                        <div class="col-sm-5"><!-- Begin Chart -->
                                        </div><!-- End Chart -->
                                    </div>
                                </div> <!-- End of Column 12 -->
                            </div><!-- End of Timeliness-->

                            <br />
                            <br />

                            <!-- *******************************************************************************************************************
                                                                            Online Environment
                                ****************************************************************************************************************-->
                            <div class="row" v-show="onlineEnvironmentSelected"> <!--  Online Environment -->
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-1">
                                        </div>
                                        <div class="col-sm-11 d-flex p-2">
                                            <h3 style="border-bottom: 2px solid #8FBC8F">Online Environment</h3>
                                        </div>
                                    </div>
                                    <div class="row"> <!-- Online Environment 1 -->
                                        <div class="col-sm-1">
                                        </div>
                                        <div class="col-sm-10"><!-- Begin Numbers -->
                                            <div class="row">
                                                <div class="col-sm-10"><i class="fas fa-question-circle"></i>  <b>How satisfied are you with the effectiveness of the process flow of the online registration system?</b></div>
                                            </div>
                                            <br />
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <b>Participants</b>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <b>Combined</b>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <b>Agents</b>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <b>Public</b>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            Total:
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            Excellent:
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            Very Good:
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            Good:
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            Fair:
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            Poor:
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="oe_q1_total"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="oe_q1_a"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="oe_q1_b"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="oe_q1_c"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="oe_q1_d"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="oe_q1_e"></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="agent_oe_q1_total"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="agent_oe_q1_a"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="agent_oe_q1_b"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="agent_oe_q1_c"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="agent_oe_q1_d"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="agent_oe_q1_e"></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="public_oe_q1_total"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="public_oe_q1_a"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="public_oe_q1_b"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="public_oe_q1_c"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="public_oe_q1_d"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="public_oe_q1_e"></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                </div>
                                                <div class="col-sm-3">
                                                    <OeQ1cChart v-if="Oe_Q1_loaded"  :_chartData="this.Oe_Q1_C_chartData" :height="270" />
                                                </div>
                                                <div class="col-sm-3">
                                                    <OeQ1aChart v-if="Oe_Q1_loaded"  :_chartData="this.Oe_Q1_A_chartData" :height="270" />
                                                </div>
                                                <div class="col-sm-3">
                                                    <OeQ1pChart v-if="Oe_Q1_loaded"  :_chartData="this.Oe_Q1_P_chartData" :height="270" />
                                                </div>
                                            </div>
                                        </div><!-- End Numbers -->
                                        <div class="col-sm-5"><!-- Begin Chart -->
                                            
                                        </div><!-- End Chart -->
                                    </div>
                                    <br />
                                    <div class="row"> <!-- Online Environment 2 -->
                                        <div class="col-sm-1">
                                        </div>
                                        <div class="col-sm-10"><!-- Begin Numbers -->
                                            <div class="row">
                                                <div class="col-sm-10"><i class="fas fa-question-circle"></i><b>How would you rate the e-stamping interface on the CRP?</b></div>
                                            </div>
                                            <br />
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <b>Participants</b>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <b>Combined</b>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <b>Agents</b>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <b>Public</b>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            Total:
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            Excellent:
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            Very Good:
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            Good:
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            Fair:
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            Poor:
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            Not Applicable:
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="oe_q2_total"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="oe_q2_a"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="oe_q2_b"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="oe_q2_c"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="oe_q2_d"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="oe_q2_e"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="oe_q2_f"></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="agent_oe_q2_total"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="agent_oe_q2_a"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="agent_oe_q2_b"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="agent_oe_q2_c"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="agent_oe_q2_d"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="agent_oe_q2_e"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="agent_oe_q2_f"></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="public_oe_q2_total"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="public_oe_q2_a"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="public_oe_q2_b"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="public_oe_q2_c"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="public_oe_q2_d"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="public_oe_q2_e"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="public_oe_q2_f"></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                </div>
                                                <div class="col-sm-3">
                                                    <OeQ2cChart v-if="Oe_Q2_loaded"  :_chartData="this.Oe_Q2_C_chartData" :height="270" />
                                                </div>
                                                <div class="col-sm-3">
                                                    <OeQ2aChart v-if="Oe_Q2_loaded"  :_chartData="this.Oe_Q2_A_chartData" :height="270" />
                                                </div>
                                                <div class="col-sm-3">
                                                    <OeQ2pChart v-if="Oe_Q2_loaded"  :_chartData="this.Oe_Q2_P_chartData" :height="270" />
                                                </div>
                                            </div>
                                        </div><!-- End Numbers -->
                                        <div class="col-sm-5"><!-- Begin Chart -->
                                        </div><!-- End Chart -->
                                    </div>
                                    <br />
                                    <div class="row"> <!--  Online Environment Question 3 -->
                                        <div class="col-sm-1">
                                        </div>
                                        <div class="col-sm-10"><!-- Begin Numbers -->
                                            <div class="row">
                                                <div class="col-sm-10"><i class="fas fa-question-circle"></i>  <b>How satisfied are you with the Remita payment platform on the CRP?</b></div>
                                            </div>
                                            <br />
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <b>Participants</b>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <b>Combined</b>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <b>Agents</b>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <b>Public</b>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            Total:
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            Very Satisfied:
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            Satisfied:
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            Dissatisfied:
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            Very Dissatisfied:
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="oe_q3_total"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="oe_q3_a"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="oe_q3_b"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="oe_q3_c"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="oe_q3_d"></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="agent_oe_q3_total"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="agent_oe_q3_a"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="agent_oe_q3_b"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="agent_oe_q3_c"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="agent_oe_q3_d"></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="public_oe_q3_total"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="public_oe_q3_a"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="public_oe_q3_b"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="public_oe_q3_c"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="public_oe_q3_d"></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                </div>
                                                <div class="col-sm-3">
                                                    <OeQ3cChart v-if="Oe_Q3_loaded"  :_chartData="this.Oe_Q3_C_chartData" :height="270" />
                                                </div>
                                                <div class="col-sm-3">
                                                    <OeQ3aChart v-if="Oe_Q3_loaded"  :_chartData="this.Oe_Q3_A_chartData" :height="270" />
                                                </div>
                                                <div class="col-sm-3">
                                                    <OeQ3pChart v-if="Oe_Q3_loaded"  :_chartData="this.Oe_Q3_P_chartData" :height="270" />
                                                </div>
                                            </div>
                                        </div><!-- End Numbers -->
                                        <div class="col-sm-5"><!-- Begin Chart -->
                                        </div><!-- End Chart -->
                                    </div>
                                    <br />
                                </div> <!-- End of Column 12 -->
                            </div><!-- End of Online Environment-->
                            <br />
                            <br />
                            <!-- *******************************************************************************************************************
                                                                            Challenges
                                ****************************************************************************************************************-->
                            <div class="row" v-show="challengesSelected"> <!--  Challenges -->
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-1">
                                        </div>
                                        <div class="col-sm-11 d-flex p-2">
                                            <h3 style="border-bottom: 2px solid #8FBC8F">Challenges</h3>
                                        </div>
                                    </div>
                                    <div class="row"> <!-- Challenges  -->
                                        <div class="col-sm-1">
                                        </div>
                                        <div class="col-sm-10"><!-- Begin Numbers -->
                                            <div class="row">
                                                <div class="col-sm-10"><i class="fas fa-question-circle"></i><b> What are the most common challenges you usually encounter ?</b></div>
                                            </div>
                                            <br />
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <b>Participants</b>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <b>Combined</b>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <b>Agents</b>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <b>Public</b>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            Total:
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            Document Editing:
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            Password/Username Reset:
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            Incomplete Report:
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            Entity Status Update:
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            Stamp Duty Deleted:
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            Others:
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="c_q1_total"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="c_q1_a"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="c_q1_b"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="c_q1_c"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="c_q1_d"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="c_q1_e"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="c_q1_f"></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="agent_c_q1_total"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="agent_c_q1_a"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="agent_c_q1_b"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="agent_c_q1_c"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="agent_c_q1_d"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="agent_c_q1_e"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="agent_c_q1_f"></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="public_c_q1_total"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="public_c_q1_a"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="public_c_q1_b"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="public_c_q1_c"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="public_c_q1_d"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="public_c_q1_e"></span>
                                                        </li>
                                                        <li class="list-group-item" style="border:none">
                                                            <span v-html="public_c_q1_f"></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                </div>
                                                <div class="col-sm-3">
                                                    <CQ1cChart v-if="C_Q1_loaded"  :_chartData="this.C_Q1_C_chartData" :height="350" />
                                                </div>
                                                <div class="col-sm-3">
                                                    <CQ1aChart v-if="C_Q1_loaded"  :_chartData="this.C_Q1_A_chartData" :height="350" />
                                                </div>
                                                <div class="col-sm-3">
                                                    <CQ1pChart v-if="C_Q1_loaded"  :_chartData="this.C_Q1_P_chartData" :height="350" />
                                                </div>
                                            </div>
                                        </div><!-- End Numbers -->
                                        <div class="col-sm-5"><!-- Begin Chart -->
                                            
                                        </div><!-- End Chart -->
                                    </div>
                                </div>
                            </div> <!-- End of Challenges -->
                        </div> <!-- Reveal or Not -->
                    </div>
                </div>
            </div>
            <div class="col-sm-1">
            </div>
        </div>
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
    </div>
</template>

<script>
import NavBar from './navigations/BiNav.vue';
import axios from 'axios';
import SdQ1cChart from './charts/Sd_Q1_C_LineChart.vue';
import SdQ1aChart from './charts/Sd_Q1_A_LineChart.vue';
import SdQ1pChart from './charts/Sd_Q1_P_LineChart.vue';
import SdQ2cChart from './charts/Sd_Q2_C_LineChart.vue';
import SdQ2aChart from './charts/Sd_Q2_A_LineChart.vue';
import SdQ2pChart from './charts/Sd_Q2_P_LineChart.vue';

import QQ1cChart from './charts/Q_Q1_C_LineChart.vue';
import QQ1aChart from './charts/Q_Q1_A_LineChart.vue';
import QQ1pChart from './charts/Q_Q1_P_LineChart.vue';

import TQ1cChart from './charts/T_Q1_C_LineChart.vue';
import TQ1aChart from './charts/T_Q1_A_LineChart.vue';
import TQ1pChart from './charts/T_Q1_P_LineChart.vue';
import TQ2cChart from './charts/T_Q2_C_LineChart.vue';
import TQ2aChart from './charts/T_Q2_A_LineChart.vue';
import TQ2pChart from './charts/T_Q2_P_LineChart.vue';
import TQ3cChart from './charts/T_Q3_C_LineChart.vue';
import TQ3aChart from './charts/T_Q3_A_LineChart.vue';
import TQ3pChart from './charts/T_Q3_P_LineChart.vue';
import TQ4cChart from './charts/T_Q4_C_LineChart.vue';
import TQ4aChart from './charts/T_Q4_A_LineChart.vue';
import TQ4pChart from './charts/T_Q4_P_LineChart.vue';

import OeQ1cChart from './charts/Oe_Q1_C_LineChart.vue';
import OeQ1aChart from './charts/Oe_Q1_A_LineChart.vue';
import OeQ1pChart from './charts/Oe_Q1_P_LineChart.vue';
import OeQ2cChart from './charts/Oe_Q2_C_LineChart.vue';
import OeQ2aChart from './charts/Oe_Q2_A_LineChart.vue';
import OeQ2pChart from './charts/Oe_Q2_P_LineChart.vue';
import OeQ3cChart from './charts/Oe_Q3_C_LineChart.vue';
import OeQ3aChart from './charts/Oe_Q3_A_LineChart.vue';
import OeQ3pChart from './charts/Oe_Q3_P_LineChart.vue';

import CQ1cChart from './charts/C_Q1_C_LineChart.vue';
import CQ1aChart from './charts/C_Q1_A_LineChart.vue';
import CQ1pChart from './charts/C_Q1_P_LineChart.vue';

export default {
    data() {
        return {

            header_1: "Business Intelligence Report",
            header_2: "",
            counter: 0,
            enableSubmit: true,
            revealAll: false,
            rotor: '&nbsp;<i class="fas fa-cog"></i>',
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            AlertMsg:'',
            serviceDeliverySelected: false,
            qualitySelected: false,
            timelinessSelected: false,
            onlineEnvironmentSelected: false,
            challengesSelected: false,
            serviceDeliveryBox: null,
            qualityBox: null,
            timelinessBox: null,
            onlineEnvBox: null,
            challengesBox: null,
            showReport: false,
            endDate: null,
            beginDate: null,
            loader: '',
            sd_q1_total:'',
            sd_q1_a: '',
            sd_q1_b: '',
            sd_q1_c: '',
            sd_q1_d: '',
            agent_sd_q1_total:'',
            agent_sd_q1_a: '',
            agent_sd_q1_b: '',
            agent_sd_q1_c: '',
            agent_sd_q1_d: '',
            public_sd_q1_total:'',
            public_sd_q1_a: '',
            public_sd_q1_b: '',
            public_sd_q1_c: '',
            public_sd_q1_d: '',
            sd_q2_total: '',
            sd_q2_a: '',
            sd_q2_b: '',
            sd_q2_c: '',
            sd_q2_d: '',
            sd_q2_e: '',
            agent_sd_q2_total: '',
            agent_sd_q2_a: '',
            agent_sd_q2_b: '',
            agent_sd_q2_c: '',
            agent_sd_q2_d: '',
            agent_sd_q2_e: '',
            public_sd_q2_total: '',
            public_sd_q2_a: '',
            public_sd_q2_b: '',
            public_sd_q2_c: '',
            public_sd_q2_d: '',
            public_sd_q2_e: '',
            q_total: '',
            q_a: '',
            q_b: '',
            q_c: '',
            q_d: '',
            agent_q_total: '',
            agent_q_a: '',
            agent_q_b: '',
            agent_q_c: '',
            agent_q_d: '',
            public_q_total: '',
            public_q_a: '',
            public_q_b: '',
            public_q_c: '',
            public_q_d: '',
            t_q1_total:'',
            t_q1_a: '',
            t_q1_b: '',
            t_q1_c: '',
            t_q1_d: '',
            t_q1_e: '',
            agent_t_q1_total:'',
            agent_t_q1_a: '',
            agent_t_q1_b: '',
            agent_t_q1_c: '',
            agent_t_q1_d: '',
            agent_t_q1_e: '',
            public_t_q1_total:'',
            public_t_q1_a: '',
            public_t_q1_b: '',
            public_t_q1_c: '',
            public_t_q1_d: '',
            public_t_q1_e: '',
            t_q2_total: '',
            t_q2_a: '',
            t_q2_b: '',
            t_q2_c: '',
            t_q2_d: '',
            t_q2_e: '',
            agent_t_q2_total: '',
            agent_t_q2_a: '',
            agent_t_q2_b: '',
            agent_t_q2_c: '',
            agent_t_q2_d: '',
            agent_t_q2_e: '',
            public_t_q2_total: '',
            public_t_q2_a: '',
            public_t_q2_b: '',
            public_t_q2_c: '',
            public_t_q2_d: '',
            public_t_q2_e: '',
            t_q3_total: '',
            t_q3_a: '',
            t_q3_b: '',
            t_q3_c: '',
            t_q3_d: '',
            agent_t_q3_total: '',
            agent_t_q3_a: '',
            agent_t_q3_b: '',
            agent_t_q3_c: '',
            agent_t_q3_d: '',
            public_t_q3_total: '',
            public_t_q3_a: '',
            public_t_q3_b: '',
            public_t_q3_c: '',
            public_t_q3_d: '',
            t_q4_total: '',
            t_q4_a: '',
            t_q4_b: '',
            t_q4_c: '',
            t_q4_d: '',
            t_q4_e: '',
            agent_t_q4_total: '',
            agent_t_q4_a: '',
            agent_t_q4_b: '',
            agent_t_q4_c: '',
            agent_t_q4_d: '',
            agent_t_q4_e: '',
            public_t_q4_total: '',
            public_t_q4_a: '',
            public_t_q4_b: '',
            public_t_q4_c: '',
            public_t_q4_d: '',
            public_t_q4_e: '',
            oe_q1_total: '',
            oe_q1_a: '',
            oe_q1_b: '',
            oe_q1_c: '',
            oe_q1_d: '',
            oe_q1_e: '',
            agent_oe_q1_total: '',
            agent_oe_q1_a: '',
            agent_oe_q1_b: '',
            agent_oe_q1_c: '',
            agent_oe_q1_d: '',
            agent_oe_q1_e: '',
            public_oe_q1_total: '',
            public_oe_q1_a: '',
            public_oe_q1_b: '',
            public_oe_q1_c: '',
            public_oe_q1_d: '',
            public_oe_q1_e: '',
            oe_q2_total: '',
            oe_q2_a: '',
            oe_q2_b: '',
            oe_q2_c: '',
            oe_q2_d: '',
            oe_q2_e: '',
            oe_q2_f: '',
            agent_oe_q2_total: '',
            agent_oe_q2_a: '',
            agent_oe_q2_b: '',
            agent_oe_q2_c: '',
            agent_oe_q2_d: '',
            agent_oe_q2_e: '',
            agent_oe_q2_f: '',
            public_oe_q2_total: '',
            public_oe_q2_a: '',
            public_oe_q2_b: '',
            public_oe_q2_c: '',
            public_oe_q2_d: '',
            public_oe_q2_e: '',
            public_oe_q2_f: '',
            oe_q3_total: '',
            oe_q3_a: '',
            oe_q3_b: '',
            oe_q3_c: '',
            oe_q3_d: '',
            agent_oe_q3_total: '',
            agent_oe_q3_a: '',
            agent_oe_q3_b: '',
            agent_oe_q3_c: '',
            agent_oe_q3_d: '',
            public_oe_q3_total: '',
            public_oe_q3_a: '',
            public_oe_q3_b: '',
            public_oe_q3_c: '',
            public_oe_q3_d: '',
            c_q1_total: '',
            c_q1_a: '',
            c_q1_b: '',
            c_q1_c: '',
            c_q1_d: '',
            c_q1_e: '',
            c_q1_f: '',
            agent_c_q1_total: '',
            agent_c_q1_a: '',
            agent_c_q1_b: '',
            agent_c_q1_c: '',
            agent_c_q1_d: '',
            agent_c_q1_e: '',
            agent_c_q1_f: '',
            public_c_q1_total: '',
            public_c_q1_a: '',
            public_c_q1_b: '',
            public_c_q1_c: '',
            public_c_q1_d: '',
            public_c_q1_e: '',
            public_c_q1_f: '',
            Sd_Q1_C_chartData: [],
            Sd_Q1_A_chartData: [],
            Sd_Q1_P_chartData: [],
            Sd_Q1_loaded: false,
            Sd_Q2_C_chartData: [],
            Sd_Q2_A_chartData: [],
            Sd_Q2_P_chartData: [],
            Sd_Q2_loaded: false,
            Q_Q1_C_chartData: [],
            Q_Q1_A_chartData: [],
            Q_Q1_P_chartData: [],
            Q_Q1_loaded: false,
            T_Q1_C_chartData: [],
            T_Q1_A_chartData: [],
            T_Q1_P_chartData: [],
            T_Q1_loaded: false,
            T_Q2_C_chartData: [],
            T_Q2_A_chartData: [],
            T_Q2_P_chartData: [],
            T_Q2_loaded: false,
            T_Q3_C_chartData: [],
            T_Q3_A_chartData: [],
            T_Q3_P_chartData: [],
            T_Q3_loaded: false,
            T_Q4_C_chartData: [],
            T_Q4_A_chartData: [],
            T_Q4_P_chartData: [],
            T_Q4_loaded: false,
            Oe_Q1_C_chartData: [],
            Oe_Q1_A_chartData: [],
            Oe_Q1_P_chartData: [],
            Oe_Q1_loaded: false,
            Oe_Q2_C_chartData: [],
            Oe_Q2_A_chartData: [],
            Oe_Q2_P_chartData: [],
            Oe_Q2_loaded: false,
            Oe_Q3_C_chartData: [],
            Oe_Q3_A_chartData: [],
            Oe_Q3_P_chartData: [],
            Oe_Q3_loaded: false,
            C_Q1_C_chartData: [],
            C_Q1_A_chartData: [],
            C_Q1_P_chartData: [],
            C_Q1_loaded: false,
            days: ['Sun','Mon','Tue','Wed','Thur','Fri','Sat'],
            months: ['January','February','March','April','May','June','July','August','September','October','November','December']
        }
    },
    components:{
         NavBar, SdQ1cChart, SdQ1aChart, SdQ1pChart, SdQ2cChart, SdQ2aChart, SdQ2pChart, QQ1cChart, QQ1aChart, QQ1pChart, TQ1cChart, TQ1aChart, TQ1pChart,
         TQ2cChart, TQ2aChart, TQ2pChart, TQ3cChart, TQ3aChart, TQ3pChart, TQ4cChart, TQ4aChart, TQ4pChart, OeQ1cChart, OeQ1aChart, OeQ1pChart, OeQ2cChart,
         OeQ2aChart, OeQ2pChart, OeQ3cChart, OeQ3aChart, OeQ3pChart, CQ1cChart, CQ1aChart, CQ1pChart
    },
    beforeCreate: function () {
        if (!this.$session.exists()) {
            this.$router.push('/admin');
        }
        else{
            if(this.$session.get("role") != "Admin"){
                alert("You do not have privilege to visit this page.");
                this.$session.destroy();
                this.$router.push('/');
            }
        }
    },
    watch: {
        beginDate() {
            if(this.counter >= 1 && (this.beginDate != null && this.endDate != null))
                this.enableSubmit = false;
            else
                this.enableSubmit = true;
        },
        endDate() {
            if(this.counter >= 1 && (this.beginDate != null && this.endDate != null))
                this.enableSubmit = false;
            else
                this.enableSubmit = true;
        }
    },
    methods:{
        check(e) {  
            if(e.target.checked)
                this.counter++;
            else
                this.counter--;
            if(this.counter >= 1 && (this.beginDate != null && this.endDate != null))
                this.enableSubmit = false;
            else
                this.enableSubmit = true;
        },
        GenerateReport(){
            this.revealAll = false;
            this.Sd_Q1_loaded = false;
            this.Sd_Q2_loaded = false;
            this.Q_Q1_loaded = false;
            this.T_Q1_loaded = false;
            this.T_Q2_loaded = false;
            this.T_Q3_loaded = false;
            this.T_Q4_loaded = false;
            this.Oe_Q1_loaded = false;
            this.Oe_Q2_loaded = false;
            this.Oe_Q3_loaded = false;
            this.C_Q1_loaded = false;
            this.enableSubmit = false;
            var d1 = new Date(this.beginDate);
            var d2 = new Date(this.endDate);
            if(d1.getTime() === d2.getTime())
            {
                this.header_2 = "BI REPORT FOR " + this.days[ d1.getDay() ] + " " + d1.getDate() + " " + this.months[ d1.getMonth() ] + ", " + d1.getFullYear();
            }
            else
            {
                this.header_2 = "BI REPORT BETWEEN " + this.days[ d1.getDay() ] + " " + d1.getDate() + " " + this.months[ d1.getMonth() ] + ", " + d1.getFullYear() + " AND " + this.days[ d2.getDay() ] + " " + d2.getDate() + " " + this.months[ d2.getMonth() ] + ", " + d2.getFullYear();
            }
            this.loader = '<center><i class="fas fa-spinner fa-spin fa-5x fa-fw" style="color: #8FBC8F"></i></center>';
            this.rotor = '&nbsp;<i class="fa fa-cog fa-spin fa-1x fa-fw"></i>';
            this.serviceDeliverySelected = false;
            this.qualitySelected = false;
            this.timelinessSelected = false;
            this.onlineEnvironmentSelected = false;
            this.challengesSelected = false;
            var postData = {
                "beginDate": this.beginDate,
                "endDate": this.endDate,
            }
            if(this.serviceDeliveryBox)
            {
                this.serviceDeliverySelected = true;
                //Start Service Delivery Q1
                try{
                    axios.post("http://127.0.0.1:8000/api/service_delivery_Q1", postData) 
                    .then(response =>{
                        var a = response.data["sd_q1_a"];
                        var b = response.data["sd_q1_b"];
                        var c = response.data["sd_q1_c"];
                        var d = response.data["sd_q1_d"];
                        var x = response.data["sd_q1_total"]
                        this.Sd_Q1_C_chartData = [x, a, b, c, d];
                        var e = response.data["agent_sd_q1_a"];
                        var f = response.data["agent_sd_q1_b"];
                        var g = response.data["agent_sd_q1_c"];
                        var h = response.data["agent_sd_q1_d"];
                        var y = response.data["agent_sd_q1_total"]
                        this.Sd_Q1_A_chartData = [y, e, f, g, h];
                        var i = response.data["public_sd_q1_a"];
                        var j = response.data["public_sd_q1_b"];
                        var k = response.data["public_sd_q1_c"];
                        var l = response.data["public_sd_q1_d"];
                        var z = response.data["public_sd_q1_total"]
                        this.Sd_Q1_P_chartData = [z, i, j, k, l];
                        this.sd_q1_total = '<b style="color: #899499">' + x + "</b>";
                        this.agent_sd_q1_total = '<b style="color: #899499">' + y + "</b>";
                        this.public_sd_q1_total = '<b style="color: #899499">' + z + "</b>";
                        if(x != 0)
                        {
                            this.sd_q1_a = '<b style="color: #72cc66">' + a + ' (' + ((a/x)*100).toFixed(2) +' %)</b>';
                            this.sd_q1_b = '<b style="color: #40B5AD">' + b + ' (' + ((b/x)*100).toFixed(2) +' %)</b>';
                            this.sd_q1_c = '<b style="color: #FFBF00">' + c + ' (' + ((c/x)*100).toFixed(2) +' %)</b>';
                            this.sd_q1_d = '<b style="color: red">' + d + ' (' + ((d/x)*100).toFixed(2) +' %)</b>';
                        }
                        else{
                            this.sd_q1_a = '<b style="color: #72cc66">' + a + '</b>';
                            this.sd_q1_b = '<b style="color: #40B5AD">' + b + '</b>';
                            this.sd_q1_c = '<b style="color: #FFBF00">' + c + '</b>';
                            this.sd_q1_d = '<b style="color: red">' + d + '</b>';
                        }
                        if(y != 0)
                        {
                            this.agent_sd_q1_a = '<b style="color: #72cc66">' + e + ' (' + ((e/y)*100).toFixed(2) +' %)</b>';
                            this.agent_sd_q1_b = '<b style="color: #40B5AD">' + f + ' (' + ((f/y)*100).toFixed(2) +' %)</b>';
                            this.agent_sd_q1_c = '<b style="color: #FFBF00">' + g + ' (' + ((g/y)*100).toFixed(2) +' %)</b>';
                            this.agent_sd_q1_d = '<b style="color: red">' + h + ' (' + ((h/y)*100).toFixed(2) +' %)</b>';
                        }
                        else{
                            this.agent_sd_q1_a = '<b style="color: #72cc66">' + e + '</b>';
                            this.agent_sd_q1_b = '<b style="color: #40B5AD">' + f + '</b>';
                            this.agent_sd_q1_c = '<b style="color: #FFBF00">' + g + '</b>';
                            this.agent_sd_q1_d = '<b style="color: red">' + h + '</b>';
                        }
                        if(z != 0)
                        {
                            this.public_sd_q1_a = '<b style="color: #72cc66">' + i + ' (' + ((i/z)*100).toFixed(2) +' %)</b>';
                            this.public_sd_q1_b = '<b style="color: #40B5AD">' + j + ' (' + ((j/z)*100).toFixed(2) +' %)</b>';
                            this.public_sd_q1_c = '<b style="color: #FFBF00">' + k + ' (' + ((k/z)*100).toFixed(2) +' %)</b>';
                            this.public_sd_q1_d = '<b style="color: red">' + l + ' (' + ((l/z)*100).toFixed(2) +' %)</b>';
                        }
                        else{
                            this.public_sd_q1_a = '<b style="color: #72cc66">' + i + '</b>';
                            this.public_sd_q1_b = '<b style="color: #40B5AD">' + j + '</b>';
                            this.public_sd_q1_c = '<b style="color: #FFBF00">' + k + '</b>';
                            this.public_sd_q1_d = '<b style="color: red">' + l + '</b>';
                        }
                        this.Sd_Q1_loaded = true;
                    })
                }
                catch(err){    
                        console.log("SDQ1: " + err);
                }

                //Start Service Delivery Q2
                try{
                    axios.post("http://127.0.0.1:8000/api/service_delivery_Q2", postData) 
                    .then(response =>{
                        var a = response.data["sd_q2_a"];
                        var b = response.data["sd_q2_b"];
                        var c = response.data["sd_q2_c"];
                        var d = response.data["sd_q2_d"];
                        var e = response.data["sd_q2_e"];
                        var x = response.data["sd_q2_total"];
                        this.Sd_Q2_C_chartData = [x, a, b, c, d, e];
                        var f = response.data["agent_sd_q2_a"];
                        var g = response.data["agent_sd_q2_b"];
                        var h = response.data["agent_sd_q2_c"];
                        var i = response.data["agent_sd_q2_d"];
                        var j = response.data["agent_sd_q2_e"];
                        var y = response.data["agent_sd_q2_total"];
                        this.Sd_Q2_A_chartData = [y, f, g, h, i, j];
                        var k = response.data["public_sd_q2_a"];
                        var l = response.data["public_sd_q2_b"];
                        var m = response.data["public_sd_q2_c"];
                        var n = response.data["public_sd_q2_d"];
                        var o = response.data["public_sd_q2_e"];
                        var z = response.data["public_sd_q2_total"];
                        this.Sd_Q2_P_chartData = [z, k, l, m, n, o];
                        this.sd_q2_total = '<b style="color: #899499">' + x + "</b>";
                        this.agent_sd_q2_total = '<b style="color: #899499">' + y + "</b>";
                        this.public_sd_q2_total = '<b style="color: #899499">' + z + "</b>";
                        if(x != 0)
                        {
                            this.sd_q2_a = '<b style="color: #FF7F50">' + a + ' (' + ((a/x)*100).toFixed(2) +' %)</b>';
                            this.sd_q2_b = '<b style="color: #89CFF0">' + b + ' (' + ((b/x)*100).toFixed(2) +' %)</b>';
                            this.sd_q2_c = '<b style="color: #FFEA00">' + c + ' (' + ((c/x)*100).toFixed(2) +' %)</b>';
                            this.sd_q2_d = '<b style="color: #C0C0C0">' + d + ' (' + ((d/x)*100).toFixed(2) +' %)</b>';
                            this.sd_q2_e = '<b style="color: #71797E">' + e + ' (' + ((e/x)*100).toFixed(2) +' %)</b>';
                        }
                        else{
                            this.sd_q2_a = '<b style="color: #FF7F50">' + a + '</b>';
                            this.sd_q2_b = '<b style="color: #89CFF0">' + b + '</b>';
                            this.sd_q2_c = '<b style="color: #FFEA00">' + c + '</b>';
                            this.sd_q2_d = '<b style="color: #C0C0C0">' + d + '</b>';
                            this.sd_q2_e = '<b style="color: #71797E">' + e + '</b>';
                        }
                        if(y != 0)
                        {
                            this.agent_sd_q2_a = '<b style="color: #FF7F50">' + f + ' (' + ((f/y)*100).toFixed(2) +' %)</b>';
                            this.agent_sd_q2_b = '<b style="color: #89CFF0">' + g + ' (' + ((g/y)*100).toFixed(2) +' %)</b>';
                            this.agent_sd_q2_c = '<b style="color: #FFEA00">' + h + ' (' + ((h/y)*100).toFixed(2) +' %)</b>';
                            this.agent_sd_q2_d = '<b style="color: #C0C0C0">' + i + ' (' + ((i/y)*100).toFixed(2) +' %)</b>';
                            this.agent_sd_q2_e = '<b style="color: #71797E">' + j + ' (' + ((j/y)*100).toFixed(2) +' %)</b>';
                        }
                        else{
                            this.agent_sd_q2_a = '<b style="color: #FF7F50">' + f + '</b>';
                            this.agent_sd_q2_b = '<b style="color: #89CFF0">' + g + '</b>';
                            this.agent_sd_q2_c = '<b style="color: #FFEA00">' + h + '</b>';
                            this.agent_sd_q2_d = '<b style="color: #C0C0C0">' + i + '</b>';
                            this.agent_sd_q2_e = '<b style="color: #71797E">' + j + '</b>';
                        }
                        if(z != 0)
                        {
                            this.public_sd_q2_a = '<b style="color: #FF7F50">' + k + ' (' + ((k/z)*100).toFixed(2) +' %)</b>';
                            this.public_sd_q2_b = '<b style="color: #89CFF0">' + l + ' (' + ((l/z)*100).toFixed(2) +' %)</b>';
                            this.public_sd_q2_c = '<b style="color: #FFEA00">' + m + ' (' + ((m/z)*100).toFixed(2) +' %)</b>';
                            this.public_sd_q2_d = '<b style="color: #C0C0C0">' + n + ' (' + ((n/z)*100).toFixed(2) +' %)</b>';
                            this.public_sd_q2_e = '<b style="color: #71797E">' + o + ' (' + ((o/z)*100).toFixed(2) +' %)</b>';
                        }
                        else{
                            this.public_sd_q2_a = '<b style="color: #FF7F50">' + k + '</b>';
                            this.public_sd_q2_b = '<b style="color: #89CFF0">' + l + '</b>';
                            this.public_sd_q2_c = '<b style="color: #FFEA00">' + m + '</b>';
                            this.public_sd_q2_d = '<b style="color: #C0C0C0">' + n + '</b>';
                            this.public_sd_q2_e = '<b style="color: #71797E">' + o + '</b>';
                        }
                        this.Sd_Q2_loaded = true;
                    })
                    this.rotor = '&nbsp;<i class="fas fa-cog"></i>';
                    this.loader = '';
                    this.revealAll = true;
                    this.enableSubmit = false;
                }
                catch(err){    
                        console.log("SDQ2: " + err);
                }
            }
            if(this.qualityBox)
            {
                this.qualitySelected = true;

                //Start Quality
                try{
                    axios.post("http://127.0.0.1:8000/api/qualityQ1", postData) 
                    .then(response =>{
                        var a = response.data["q_a"];
                        var b = response.data["q_b"];
                        var c = response.data["q_c"];
                        var d = response.data["q_d"];
                        var x = response.data["q_total"];
                        this.Q_Q1_C_chartData = [x, a, b, c, d];
                        var e = response.data["agent_q_a"];
                        var f = response.data["agent_q_b"];
                        var g = response.data["agent_q_c"];
                        var h = response.data["agent_q_d"];
                        var y = response.data["agent_q_total"];
                        this.Q_Q1_A_chartData = [y, e, f, g, h];
                        var i = response.data["public_q_a"];
                        var j = response.data["public_q_b"];
                        var k = response.data["public_q_c"];
                        var l = response.data["public_q_d"];
                        var z = response.data["public_q_total"];
                        this.Q_Q1_P_chartData = [z, i, j, k, l];
                        this.q_total = '<b style="color: #899499">' + x + "</b>";
                        this.agent_q_total = '<b style="color: #899499">' + y + "</b>";
                        this.public_q_total = '<b style="color: #899499">' + z + "</b>";
                        if(x != 0)
                        {
                            this.q_a = '<b style="color: #72cc66">' + a + ' (' + ((a/x)*100).toFixed(2) +' %)</b>';
                            this.q_b = '<b style="color: #40B5AD">' + b + ' (' + ((b/x)*100).toFixed(2) +' %)</b>';
                            this.q_c = '<b style="color: #FFBF00">' + c + ' (' + ((c/x)*100).toFixed(2) +' %)</b>';
                            this.q_d = '<b style="color: red">' + d + ' (' + ((d/x)*100).toFixed(2) +' %)</b>';
                        }
                        else{
                            this.q_a = '<b style="color: #72cc66">' + a + '</b>';
                            this.q_b = '<b style="color: #40B5AD">' + b + '</b>';
                            this.q_c = '<b style="color: #FFBF00">' + c + '</b>';
                            this.q_d = '<b style="color: red">' + d + '</b>';
                        }
                        if(y != 0)
                        {
                            this.agent_q_a = '<b style="color: #72cc66">' + e + ' (' + ((e/y)*100).toFixed(2) +' %)</b>';
                            this.agent_q_b = '<b style="color: #40B5AD">' + f + ' (' + ((f/y)*100).toFixed(2) +' %)</b>';
                            this.agent_q_c = '<b style="color: #FFBF00">' + g + ' (' + ((g/y)*100).toFixed(2) +' %)</b>';
                            this.agent_q_d = '<b style="color: red">' + h + ' (' + ((h/y)*100).toFixed(2) +' %)</b>';
                        }
                        else{
                            this.agent_q_a = '<b style="color: #72cc66">' + e + '</b>';
                            this.agent_q_b = '<b style="color: #40B5AD">' + f + '</b>';
                            this.agent_q_c = '<b style="color: #FFBF00">' + g + '</b>';
                            this.agent_q_d = '<b style="color: red">' + h + '</b>';
                        }
                        if(z != 0)
                        {
                            this.public_q_a = '<b style="color: #72cc66">' + i + ' (' + ((i/z)*100).toFixed(2) +' %)</b>';
                            this.public_q_b = '<b style="color: #40B5AD">' + j + ' (' + ((j/z)*100).toFixed(2) +' %)</b>';
                            this.public_q_c = '<b style="color: #FFBF00">' + k + ' (' + ((k/z)*100).toFixed(2) +' %)</b>';
                            this.public_q_d = '<b style="color: red">' + l + ' (' + ((l/z)*100).toFixed(2) +' %)</b>';
                        }
                        else{
                            this.public_sd_q1_a = '<b style="color: #72cc66">' + i + '</b>';
                            this.public_sd_q1_b = '<b style="color: #40B5AD">' + j + '</b>';
                            this.public_sd_q1_c = '<b style="color: #E39802">' + k + '</b>';
                            this.public_sd_q1_d = '<b style="color: red">' + l + '</b>';
                        }
                        this.Q_Q1_loaded = true;
                    })
                    this.rotor = '&nbsp;<i class="fas fa-cog"></i>';
                    this.loader = '';
                    this.revealAll = true;
                    this.enableSubmit = false;
                }
                catch(err){    
                        console.log("QQ1: " + err);
                }
            }
            if(this.timelinessBox)
            {
                this.timelinessSelected = true;
                //Start Timeliness Q1
                try{
                    axios.post("http://127.0.0.1:8000/api/timeliness_Q1", postData) 
                    .then(response =>{
                        var a = response.data["t_q1_a"];
                        var b = response.data["t_q1_b"];
                        var c = response.data["t_q1_c"];
                        var d = response.data["t_q1_d"];
                        var e = response.data["t_q1_e"];
                        var x = response.data["t_q1_total"];
                        this.T_Q1_C_chartData = [x, a, b, c, d, e];
                        var f = response.data["agent_t_q1_a"];
                        var g = response.data["agent_t_q1_b"];
                        var h = response.data["agent_t_q1_c"];
                        var i = response.data["agent_t_q1_d"];
                        var j = response.data["agent_t_q1_e"];
                        var y = response.data["agent_t_q1_total"];
                        this.T_Q1_A_chartData = [y, f, g, h, i, j];
                        var k = response.data["public_t_q1_a"];
                        var l = response.data["public_t_q1_b"];
                        var m = response.data["public_t_q1_c"];
                        var n = response.data["public_t_q1_d"];
                        var o = response.data["public_t_q1_e"];
                        var z = response.data["public_t_q1_total"];
                        this.T_Q1_P_chartData = [z, k, l, m, n, o];
                        this.t_q1_total = '<b style="color: #899499">' + x + "</b>";
                        this.agent_t_q1_total = '<b style="color: #899499">' + y + "</b>";
                        this.public_t_q1_total = '<b style="color: #899499">' + z + "</b>";
                        if(x != 0)
                        {
                            this.t_q1_a = '<b style="color: #72cc66">' + a + ' (' + ((a/x)*100).toFixed(2) +' %)</b>';
                            this.t_q1_b = '<b style="color: #40B5AD">' + b + ' (' + ((b/x)*100).toFixed(2) +' %)</b>';
                            this.t_q1_c = '<b style="color: #DAE021">' + c + ' (' + ((c/x)*100).toFixed(2) +' %)</b>';
                            this.t_q1_d = '<b style="color: #FFBF00">' + d + ' (' + ((d/x)*100).toFixed(2) +' %)</b>';
                            this.t_q1_e = '<b style="color: red">' + e + ' (' + ((e/x)*100).toFixed(2) +' %)</b>';
                        }
                        else{
                            this.t_q1_a = '<b style="color: #72cc66">' + a + '</b>';
                            this.t_q1_b = '<b style="color: #40B5AD">' + b + '</b>';
                            this.t_q1_c = '<b style="color: #DAE021">' + c + '</b>';
                            this.t_q1_d = '<b style="color: #FFBF00">' + d + '</b>';
                            this.t_q1_e = '<b style="color: red">' + e + '</b>';
                        }
                        if(y != 0)
                        {
                            this.agent_t_q1_a = '<b style="color: #72cc66">' + f + ' (' + ((f/y)*100).toFixed(2) +' %)</b>';
                            this.agent_t_q1_b = '<b style="color: #40B5AD">' + g + ' (' + ((g/y)*100).toFixed(2) +' %)</b>';
                            this.agent_t_q1_c = '<b style="color: #DAE021">' + h + ' (' + ((h/y)*100).toFixed(2) +' %)</b>';
                            this.agent_t_q1_d = '<b style="color: #FFBF00">' + i + ' (' + ((i/y)*100).toFixed(2) +' %)</b>';
                            this.agent_t_q1_e = '<b style="color: red">' + j + ' (' + ((j/y)*100).toFixed(2) +' %)</b>';
                        }
                        else{
                            this.agent_t_q1_a = '<b style="color: #72cc66">' + f + '</b>';
                            this.agent_t_q1_b = '<b style="color: #40B5AD">' + g + '</b>';
                            this.agent_t_q1_c = '<b style="color: #DAE021">' + h + '</b>';
                            this.agent_t_q1_d = '<b style="color: #FFBF00">' + i + '</b>';
                            this.agent_t_q1_e = '<b style="color: red">' + j + '</b>';
                        }
                        if(z != 0)
                        {
                            this.public_t_q1_a = '<b style="color: #72cc66">' + k + ' (' + ((k/z)*100).toFixed(2) +' %)</b>';
                            this.public_t_q1_b = '<b style="color: #40B5AD">' + l + ' (' + ((l/z)*100).toFixed(2) +' %)</b>';
                            this.public_t_q1_c = '<b style="color: #DAE021">' + m + ' (' + ((m/z)*100).toFixed(2) +' %)</b>';
                            this.public_t_q1_d = '<b style="color: #FFBF00">' + n + ' (' + ((n/z)*100).toFixed(2) +' %)</b>';
                            this.public_t_q1_e = '<b style="color: red">' + o + ' (' + ((o/z)*100).toFixed(2) +' %)</b>';
                        }
                        else{
                            this.public_t_q1_a = '<b style="color: #72cc66">' + k + '</b>';
                            this.public_t_q1_b = '<b style="color: #40B5AD">' + l + '</b>';
                            this.public_t_q1_c = '<b style="color: #DAE021">' + m + '</b>';
                            this.public_t_q1_d = '<b style="color: #FFBF00">' + n + '</b>';
                            this.public_t_q1_e = '<b style="color: red">' + o + '</b>';
                        }
                        this.T_Q1_loaded = true;
                    })
                }
                catch(err){    
                        console.log("TQ1: " + err);
                }

                //Start Timeliness Q2
                try{
                    axios.post("http://127.0.0.1:8000/api/timeliness_Q2", postData) 
                    .then(response =>{
                        var a = response.data["t_q2_a"];
                        var b = response.data["t_q2_b"];
                        var c = response.data["t_q2_c"];
                        var d = response.data["t_q2_d"];
                        var e = response.data["t_q2_e"];
                        var x = response.data["t_q2_total"];
                        this.T_Q2_C_chartData = [x, a, b, c, d, e];
                        var f = response.data["agent_t_q2_a"];
                        var g = response.data["agent_t_q2_b"];
                        var h = response.data["agent_t_q2_c"];
                        var i = response.data["agent_t_q2_d"];
                        var j = response.data["agent_t_q2_e"];
                        var y = response.data["agent_t_q2_total"];
                        this.T_Q2_A_chartData = [y, f, g, h, i, j];
                        var k = response.data["public_t_q2_a"];
                        var l = response.data["public_t_q2_b"];
                        var m = response.data["public_t_q2_c"];
                        var n = response.data["public_t_q2_d"];
                        var o = response.data["public_t_q2_e"];
                        var z = response.data["public_t_q2_total"];
                        this.T_Q2_P_chartData = [z, k, l, m, n, o];
                        this.t_q2_total = '<b style="color: #899499">' + x + "</b>";
                        this.agent_t_q2_total = '<b style="color: #899499">' + y + "</b>";
                        this.public_t_q2_total = '<b style="color: #899499">' + z + "</b>";
                        if(x != 0)
                        {
                            this.t_q2_a = '<b style="color: #CBC3E3">' + a + ' (' + ((a/x)*100).toFixed(2) +' %)</b>';
                            this.t_q2_b = '<b style="color: #CCCCFF">' + b + ' (' + ((b/x)*100).toFixed(2) +' %)</b>';
                            this.t_q2_c = '<b style="color: #CF9FFF">' + c + ' (' + ((c/x)*100).toFixed(2) +' %)</b>';
                            this.t_q2_d = '<b style="color: #DA70D6">' + d + ' (' + ((d/x)*100).toFixed(2) +' %)</b>';
                            this.t_q2_e = '<b style="color: #800080">' + e + ' (' + ((e/x)*100).toFixed(2) +' %)</b>';
                        }
                        else{
                            this.t_q2_a = '<b style="color: #CBC3E3">' + a + '</b>';
                            this.t_q2_b = '<b style="color: #CCCCFF">' + b + '</b>';
                            this.t_q2_c = '<b style="color: #CF9FFF">' + c + '</b>';
                            this.t_q2_d = '<b style="color: #DA70D6">' + d + '</b>';
                            this.t_q2_e = '<b style="color: #800080">' + e + '</b>';
                        }
                        if(y != 0)
                        {
                            this.agent_t_q2_a = '<b style="color: #CBC3E3">' + f + ' (' + ((f/y)*100).toFixed(2) +' %)</b>';
                            this.agent_t_q2_b = '<b style="color: #CCCCFF">' + g + ' (' + ((g/y)*100).toFixed(2) +' %)</b>';
                            this.agent_t_q2_c = '<b style="color: #CF9FFF">' + h + ' (' + ((h/y)*100).toFixed(2) +' %)</b>';
                            this.agent_t_q2_d = '<b style="color: #DA70D6">' + i + ' (' + ((i/y)*100).toFixed(2) +' %)</b>';
                            this.agent_t_q2_e = '<b style="color: #800080">' + j + ' (' + ((j/y)*100).toFixed(2) +' %)</b>';
                        }
                        else{
                            this.agent_t_q2_a = '<b style="color: #CBC3E3">' + f + '</b>';
                            this.agent_t_q2_b = '<b style="color: #CCCCFF">' + g + '</b>';
                            this.agent_t_q2_c = '<b style="color: #CF9FFF">' + h + '</b>';
                            this.agent_t_q2_d = '<b style="color: #DA70D6">' + i + '</b>';
                            this.agent_t_q2_e = '<b style="color: #800080">' + j + '</b>';
                        }
                        if(z != 0)
                        {
                            this.public_t_q2_a = '<b style="color: #CBC3E3">' + k + ' (' + ((k/z)*100).toFixed(2) +' %)</b>';
                            this.public_t_q2_b = '<b style="color: #CCCCFF">' + l + ' (' + ((l/z)*100).toFixed(2) +' %)</b>';
                            this.public_t_q2_c = '<b style="color: #CF9FFF">' + m + ' (' + ((m/z)*100).toFixed(2) +' %)</b>';
                            this.public_t_q2_d = '<b style="color: #DA70D6">' + n + ' (' + ((n/z)*100).toFixed(2) +' %)</b>';
                            this.public_t_q2_e = '<b style="color: #800080">' + o + ' (' + ((o/z)*100).toFixed(2) +' %)</b>';
                        }
                        else{
                            this.public_t_q2_a = '<b style="color: #CBC3E3">' + k + '</b>';
                            this.public_t_q2_b = '<b style="color: #CCCCFF">' + l + '</b>';
                            this.public_t_q2_c = '<b style="color: #CF9FFF">' + m + '</b>';
                            this.public_t_q2_d = '<b style="color: #DA70D6">' + n + '</b>';
                            this.public_t_q2_e = '<b style="color: #800080">' + o + '</b>';
                        }
                        this.T_Q2_loaded = true;
                    })
                }
                catch(err){    
                        console.log("TQ2: " + err);
                }

                //Start Timeliness Q3
                try{
                    axios.post("http://127.0.0.1:8000/api/timeliness_Q3", postData) 
                    .then(response =>{
                        var a = response.data["t_q3_a"];
                        var b = response.data["t_q3_b"];
                        var c = response.data["t_q3_c"];
                        var d = response.data["t_q3_d"];
                        var x = response.data["t_q3_total"];
                        this.T_Q3_C_chartData = [x, a, b, c, d];
                        var f = response.data["agent_t_q3_a"];
                        var g = response.data["agent_t_q3_b"];
                        var h = response.data["agent_t_q3_c"];
                        var i = response.data["agent_t_q3_d"];
                        var y = response.data["agent_t_q3_total"];
                        this.T_Q3_A_chartData = [y, f, g, h, i];
                        var k = response.data["public_t_q3_a"];
                        var l = response.data["public_t_q3_b"];
                        var m = response.data["public_t_q3_c"];
                        var n = response.data["public_t_q3_d"];
                        var z = response.data["public_t_q3_total"];
                        this.T_Q3_P_chartData = [z, k, l, m, n];
                        this.t_q3_total = '<b style="color: #899499">' + x + "</b>";
                        this.agent_t_q3_total = '<b style="color: #899499">' + y + "</b>";
                        this.public_t_q3_total = '<b style="color: #899499">' + z + "</b>";
                        if(x != 0)
                        {
                            this.t_q3_a = '<b style="color: #72cc66">' + a + ' (' + ((a/x)*100).toFixed(2) +' %)</b>';
                            this.t_q3_b = '<b style="color: #40B5AD">' + b + ' (' + ((b/x)*100).toFixed(2) +' %)</b>';
                            this.t_q3_c = '<b style="color: #FFBF00">' + c + ' (' + ((c/x)*100).toFixed(2) +' %)</b>';
                            this.t_q3_d = '<b style="color: red">' + d + ' (' + ((d/x)*100).toFixed(2) +' %)</b>';
                        }
                        else{
                            this.t_q3_a = '<b style="color: #72cc66">' + a + '</b>';
                            this.t_q3_b = '<b style="color: #40B5AD">' + b + '</b>';
                            this.t_q3_c = '<b style="color: #FFBF00">' + c + '</b>';
                            this.t_q3_d = '<b style="color: red">' + d + '</b>';
                        }
                        if(y != 0)
                        {
                            this.agent_t_q3_a = '<b style="color: #72cc66">' + f + ' (' + ((f/y)*100).toFixed(2) +' %)</b>';
                            this.agent_t_q3_b = '<b style="color: #40B5AD">' + g + ' (' + ((g/y)*100).toFixed(2) +' %)</b>';
                            this.agent_t_q3_c = '<b style="color: #FFBF00">' + h + ' (' + ((h/y)*100).toFixed(2) +' %)</b>';
                            this.agent_t_q3_d = '<b style="color: red">' + i + ' (' + ((i/y)*100).toFixed(2) +' %)</b>';
                        }
                        else{
                            this.agent_t_q3_a = '<b style="color: #72cc66">' + f + '</b>';
                            this.agent_t_q3_b = '<b style="color: #40B5AD">' + g + '</b>';
                            this.agent_t_q3_c = '<b style="color: #FFBF00">' + h + '</b>';
                            this.agent_t_q3_d = '<b style="color: red">' + i + '</b>';
                        }
                        if(z != 0)
                        {
                            this.public_t_q3_a = '<b style="color: #72cc66">' + k + ' (' + ((k/z)*100).toFixed(2) +' %)</b>';
                            this.public_t_q3_b = '<b style="color: #40B5AD">' + l + ' (' + ((l/z)*100).toFixed(2) +' %)</b>';
                            this.public_t_q3_c = '<b style="color: #FFBF00">' + m + ' (' + ((m/z)*100).toFixed(2) +' %)</b>';
                            this.public_t_q3_d = '<b style="color: red">' + n + ' (' + ((n/z)*100).toFixed(2) +' %)</b>';
                        }
                        else{
                            this.public_t_q3_a = '<b style="color: #72cc66">' + k + '</b>';
                            this.public_t_q3_b = '<b style="color: #40B5AD">' + l + '</b>';
                            this.public_t_q3_c = '<b style="color: #FFBF00">' + m + '</b>';
                            this.public_t_q3_d = '<b style="color: red">' + n + '</b>';
                        }
                        this.T_Q3_loaded = true;
                    })
                }
                catch(err){    
                        console.log("TQ2: " + err);
                }

                //Start Timeliness Q4
                try{
                    axios.post("http://127.0.0.1:8000/api/timeliness_Q4", postData) 
                    .then(response =>{
                        var a = response.data["t_q4_a"];
                        var b = response.data["t_q4_b"];
                        var c = response.data["t_q4_c"];
                        var d = response.data["t_q4_d"];
                        var e = response.data["t_q4_e"];
                        var x = response.data["t_q4_total"];
                        this.T_Q4_C_chartData = [x, a, b, c, d, e];
                        var f = response.data["agent_t_q4_a"];
                        var g = response.data["agent_t_q4_b"];
                        var h = response.data["agent_t_q4_c"];
                        var i = response.data["agent_t_q4_d"];
                        var j = response.data["agent_t_q4_e"];
                        var y = response.data["agent_t_q4_total"];
                        this.T_Q4_A_chartData = [y, f, g, h, i, j];
                        var k = response.data["public_t_q4_a"];
                        var l = response.data["public_t_q4_b"];
                        var m = response.data["public_t_q4_c"];
                        var n = response.data["public_t_q4_d"];
                        var o = response.data["public_t_q4_e"];
                        var z = response.data["public_t_q4_total"];
                        this.T_Q4_P_chartData = [z, k, l, m, n, o];
                        this.t_q4_total = '<b style="color: #899499">' + x + "</b>";
                        this.agent_t_q4_total = '<b style="color: #899499">' + y + "</b>";
                        this.public_t_q4_total = '<b style="color: #899499">' + z + "</b>";
                        if(x != 0)
                        {
                            this.t_q4_a = '<b style="color: #72cc66">' + a + ' (' + ((a/x)*100).toFixed(2) +' %)</b>';
                            this.t_q4_b = '<b style="color: #40B5AD">' + b + ' (' + ((b/x)*100).toFixed(2) +' %)</b>';
                            this.t_q4_c = '<b style="color: #DAE021">' + c + ' (' + ((c/x)*100).toFixed(2) +' %)</b>';
                            this.t_q4_d = '<b style="color: #FFBF00">' + d + ' (' + ((d/x)*100).toFixed(2) +' %)</b>';
                            this.t_q4_e = '<b style="color: red">' + e + ' (' + ((e/x)*100).toFixed(2) +' %)</b>';
                        }
                        else{
                            this.t_q4_a = '<b style="color: #72cc66">' + a + '</b>';
                            this.t_q4_b = '<b style="color: #40B5AD">' + b + '</b>';
                            this.t_q4_c = '<b style="color: #DAE021">' + c + '</b>';
                            this.t_q4_d = '<b style="color: #FFBF00">' + d + '</b>';
                            this.t_q4_e = '<b style="color: red">' + e + '</b>';
                        }
                        if(y != 0)
                        {
                            this.agent_t_q4_a = '<b style="color: #72cc66">' + f + ' (' + ((f/y)*100).toFixed(2) +' %)</b>';
                            this.agent_t_q4_b = '<b style="color: #40B5AD">' + g + ' (' + ((g/y)*100).toFixed(2) +' %)</b>';
                            this.agent_t_q4_c = '<b style="color: #DAE021">' + h + ' (' + ((h/y)*100).toFixed(2) +' %)</b>';
                            this.agent_t_q4_d = '<b style="color: #FFBF00">' + i + ' (' + ((i/y)*100).toFixed(2) +' %)</b>';
                            this.agent_t_q4_e = '<b style="color: red">' + j + ' (' + ((j/y)*100).toFixed(2) +' %)</b>';
                        }
                        else{
                            this.agent_t_q4_a = '<b style="color: #72cc66">' + f + '</b>';
                            this.agent_t_q4_b = '<b style="color: #40B5AD">' + g + '</b>';
                            this.agent_t_q4_c = '<b style="color: #DAE021">' + h + '</b>';
                            this.agent_t_q4_d = '<b style="color: #FFBF00">' + i + '</b>';
                            this.agent_t_q4_e = '<b style="color: red">' + j + '</b>';
                        }
                        if(z != 0)
                        {
                            this.public_t_q4_a = '<b style="color: #72cc66">' + k + ' (' + ((k/z)*100).toFixed(2) +' %)</b>';
                            this.public_t_q4_b = '<b style="color: #40B5AD">' + l + ' (' + ((l/z)*100).toFixed(2) +' %)</b>';
                            this.public_t_q4_c = '<b style="color: #DAE021">' + m + ' (' + ((m/z)*100).toFixed(2) +' %)</b>';
                            this.public_t_q4_d = '<b style="color: #FFBF00">' + n + ' (' + ((n/z)*100).toFixed(2) +' %)</b>';
                            this.public_t_q4_e = '<b style="color: red">' + o + ' (' + ((o/z)*100).toFixed(2) +' %)</b>';
                        }
                        else{
                            this.public_t_q4_a = '<b style="color: #72cc66">' + k + '</b>';
                            this.public_t_q4_b = '<b style="color: #40B5AD">' + l + '</b>';
                            this.public_t_q4_c = '<b style="color: #DAE021">' + m + '</b>';
                            this.public_t_q4_d = '<b style="color: #FFBF00">' + n + '</b>';
                            this.public_t_q4_e = '<b style="color: red">' + o + '</b>';
                        }
                        this.T_Q4_loaded = true;
                    })
                    this.rotor = '&nbsp;<i class="fas fa-cog"></i>';
                    this.loader = '';
                    this.revealAll = true;
                    this.enableSubmit = false;
                }
                catch(err){    
                        console.log("TQ1: " + err);
                }
            }
            if(this.onlineEnvBox)
            {
                this.onlineEnvironmentSelected = true;

                //Start Online Environment Q1
                try{
                    axios.post("http://127.0.0.1:8000/api/online_environment_Q1", postData) 
                    .then(response =>{
                        var a = response.data["oe_q1_a"];
                        var b = response.data["oe_q1_b"];
                        var c = response.data["oe_q1_c"];
                        var d = response.data["oe_q1_d"];
                        var e = response.data["oe_q1_e"];
                        var x = response.data["oe_q1_total"];
                        this.Oe_Q1_C_chartData = [x, a, b, c, d, e];
                        var f = response.data["agent_oe_q1_a"];
                        var g = response.data["agent_oe_q1_b"];
                        var h = response.data["agent_oe_q1_c"];
                        var i = response.data["agent_oe_q1_d"];
                        var j = response.data["agent_oe_q1_e"];
                        var y = response.data["agent_oe_q1_total"]
                        this.Oe_Q1_A_chartData = [y, f, g, h, i, j];
                        var k = response.data["public_oe_q1_a"];
                        var l = response.data["public_oe_q1_b"];
                        var m = response.data["public_oe_q1_c"];
                        var n = response.data["public_oe_q1_d"];
                        var o = response.data["public_oe_q1_e"];
                        var z = response.data["public_oe_q1_total"];
                        this.Oe_Q1_P_chartData = [z, k, l, m, n, o];
                        this.oe_q1_total = '<b style="color: #899499">' + x + "</b>";
                        this.agent_oe_q1_total = '<b style="color: #899499">' + y + "</b>";
                        this.public_oe_q1_total = '<b style="color: #899499">' + z + "</b>";
                        if(x != 0)
                        {
                            this.oe_q1_a = '<b style="color: #72cc66">' + a + ' (' + ((a/x)*100).toFixed(2) +' %)</b>';
                            this.oe_q1_b = '<b style="color: #40B5AD">' + b + ' (' + ((b/x)*100).toFixed(2) +' %)</b>';
                            this.oe_q1_c = '<b style="color: #DAE021">' + c + ' (' + ((c/x)*100).toFixed(2) +' %)</b>';
                            this.oe_q1_d = '<b style="color: #FFBF00">' + d + ' (' + ((d/x)*100).toFixed(2) +' %)</b>';
                            this.oe_q1_e = '<b style="color: red">' + e + ' (' + ((e/x)*100).toFixed(2) +' %)</b>';
                        }
                        else{
                            this.oe_q1_a = '<b style="color: #72cc66">' + a + '</b>';
                            this.oe_q1_b = '<b style="color: #40B5AD">' + b + '</b>';
                            this.oe_q1_c = '<b style="color: #DAE021">' + c + '</b>';
                            this.oe_q1_d = '<b style="color: #FFBF00">' + d + '</b>';
                            this.oe_q1_e = '<b style="color: red">' + e + '</b>';
                        }
                        if(y != 0)
                        {
                            this.agent_oe_q1_a = '<b style="color: #72cc66">' + f + ' (' + ((f/y)*100).toFixed(2) +' %)</b>';
                            this.agent_oe_q1_b = '<b style="color: #40B5AD">' + g + ' (' + ((g/y)*100).toFixed(2) +' %)</b>';
                            this.agent_oe_q1_c = '<b style="color: #DAE021">' + h + ' (' + ((h/y)*100).toFixed(2) +' %)</b>';
                            this.agent_oe_q1_d = '<b style="color: #FFBF00">' + i + ' (' + ((i/y)*100).toFixed(2) +' %)</b>';
                            this.agent_oe_q1_e = '<b style="color: red">' + j + ' (' + ((j/y)*100).toFixed(2) +' %)</b>';
                        }
                        else{
                            this.agent_oe_q1_a = '<b style="color: #72cc66">' + f + '</b>';
                            this.agent_oe_q1_b = '<b style="color: #40B5AD">' + g + '</b>';
                            this.agent_oe_q1_c = '<b style="color: #DAE021">' + h + '</b>';
                            this.agent_oe_q1_d = '<b style="color: #FFBF00">' + i + '</b>';
                            this.agent_oe_q1_e = '<b style="color: red">' + j + '</b>';
                        }
                        if(z != 0)
                        {
                            this.public_oe_q1_a = '<b style="color: #72cc66">' + k + ' (' + ((k/z)*100).toFixed(2) +' %)</b>';
                            this.public_oe_q1_b = '<b style="color: #40B5AD">' + l + ' (' + ((l/z)*100).toFixed(2) +' %)</b>';
                            this.public_oe_q1_c = '<b style="color: #DAE021">' + m + ' (' + ((m/z)*100).toFixed(2) +' %)</b>';
                            this.public_oe_q1_d = '<b style="color: #FFBF00">' + n + ' (' + ((n/z)*100).toFixed(2) +' %)</b>';
                            this.public_oe_q1_e = '<b style="color: red">' + o + ' (' + ((o/z)*100).toFixed(2) +' %)</b>';
                        }
                        else{
                            this.public_oe_q1_a = '<b style="color: #72cc66">' + k + '</b>';
                            this.public_oe_q1_b = '<b style="color: #40B5AD">' + l + '</b>';
                            this.public_oe_q1_c = '<b style="color: #DAE021">' + m + '</b>';
                            this.public_oe_q1_d = '<b style="color: #FFBF00">' + n + '</b>';
                            this.public_oe_q1_e = '<b style="color: red">' + o + '</b>';
                        }
                        this.Oe_Q1_loaded = true;
                    })
                }
                catch(err){    
                        console.log("OEQ1: " + err);
                }


                //Start Online Environment Q2
                try{
                    axios.post("http://127.0.0.1:8000/api/online_environment_Q2", postData) 
                    .then(response =>{
                        var a = response.data["oe_q2_a"];
                        var b = response.data["oe_q2_b"];
                        var c = response.data["oe_q2_c"];
                        var d = response.data["oe_q2_d"];
                        var e = response.data["oe_q2_e"];
                        var q = response.data["oe_q2_f"];
                        var x = response.data["oe_q2_total"]
                        this.Oe_Q2_C_chartData = [x, a, b, c, d, e, q];
                        var f = response.data["agent_oe_q2_a"];
                        var g = response.data["agent_oe_q2_b"];
                        var h = response.data["agent_oe_q2_c"];
                        var i = response.data["agent_oe_q2_d"];
                        var j = response.data["agent_oe_q2_e"];
                        var r = response.data["agent_oe_q2_f"];
                        var y = response.data["agent_oe_q2_total"];
                        this.Oe_Q2_A_chartData = [y, f, g, h, i, j, r];
                        var k = response.data["public_oe_q2_a"];
                        var l = response.data["public_oe_q2_b"];
                        var m = response.data["public_oe_q2_c"];
                        var n = response.data["public_oe_q2_d"];
                        var o = response.data["public_oe_q2_e"];
                        var s = response.data["public_oe_q2_f"];
                        var z = response.data["public_oe_q2_total"];
                        this.Oe_Q2_P_chartData = [z, k, l, m, n, o, s];
                        this.oe_q2_total = '<b style="color: #899499">' + x + "</b>";
                        this.agent_oe_q2_total = '<b style="color: #899499">' + y + "</b>";
                        this.public_oe_q2_total = '<b style="color: #899499">' + z + "</b>";
                        if(x != 0)
                        {
                            this.oe_q2_a = '<b style="color: #72cc66">' + a + ' (' + ((a/x)*100).toFixed(2) +' %)</b>';
                            this.oe_q2_b = '<b style="color: #40B5AD">' + b + ' (' + ((b/x)*100).toFixed(2) +' %)</b>';
                            this.oe_q2_c = '<b style="color: #DAE021">' + c + ' (' + ((c/x)*100).toFixed(2) +' %)</b>';
                            this.oe_q2_d = '<b style="color: #FFBF00">' + d + ' (' + ((d/x)*100).toFixed(2) +' %)</b>';
                            this.oe_q2_e = '<b style="color: red">' + e + ' (' + ((e/x)*100).toFixed(2) +' %)</b>';
                            this.oe_q2_f = '<b style="color: #191970">' + q + ' (' + ((q/x)*100).toFixed(2) +' %)</b>';
                        }
                        else{
                            this.oe_q2_a = '<b style="color: #72cc66">' + a + '</b>';
                            this.oe_q2_b = '<b style="color: #40B5AD">' + b + '</b>';
                            this.oe_q2_c = '<b style="color: #DAE021">' + c + '</b>';
                            this.oe_q2_d = '<b style="color: #FFBF00">' + d + '</b>';
                            this.oe_q2_e = '<b style="color: red">' + e + '</b>';
                            this.oe_q2_f = '<b style="color: #191970">' + q + '</b>';
                        }
                        if(y != 0)
                        {
                            this.agent_oe_q2_a = '<b style="color: #72cc66">' + f + ' (' + ((f/y)*100).toFixed(2) +' %)</b>';
                            this.agent_oe_q2_b = '<b style="color: #40B5AD">' + g + ' (' + ((g/y)*100).toFixed(2) +' %)</b>';
                            this.agent_oe_q2_c = '<b style="color: #DAE021">' + h + ' (' + ((h/y)*100).toFixed(2) +' %)</b>';
                            this.agent_oe_q2_d = '<b style="color: #FFBF00">' + i + ' (' + ((i/y)*100).toFixed(2) +' %)</b>';
                            this.agent_oe_q2_e = '<b style="color: red">' + j + ' (' + ((j/y)*100).toFixed(2) +' %)</b>';
                            this.agent_oe_q2_f = '<b style="color: #191970">' + r + ' (' + ((r/y)*100).toFixed(2) +' %)</b>';
                        }
                        else{
                            this.agent_oe_q2_a = '<b style="color: #72cc66">' + f + '</b>';
                            this.agent_oe_q2_b = '<b style="color: #40B5AD">' + g + '</b>';
                            this.agent_oe_q2_c = '<b style="color: #DAE021">' + h + '</b>';
                            this.agent_oe_q2_d = '<b style="color: #FFBF00">' + i + '</b>';
                            this.agent_oe_q2_e = '<b style="color: red">' + j + '</b>';
                            this.agent_oe_q2_f = '<b style="color: #191970">' + r + '</b>';
                        }
                        if(z != 0)
                        {
                            this.public_oe_q2_a = '<b style="color: #72cc66">' + k + ' (' + ((k/z)*100).toFixed(2) +' %)</b>';
                            this.public_oe_q2_b = '<b style="color: #40B5AD">' + l + ' (' + ((l/z)*100).toFixed(2) +' %)</b>';
                            this.public_oe_q2_c = '<b style="color: #DAE021">' + m + ' (' + ((m/z)*100).toFixed(2) +' %)</b>';
                            this.public_oe_q2_d = '<b style="color: #FFBF00">' + n + ' (' + ((n/z)*100).toFixed(2) +' %)</b>';
                            this.public_oe_q2_e = '<b style="color: red">' + o + ' (' + ((o/z)*100).toFixed(2) +' %)</b>';
                            this.public_oe_q2_f = '<b style="color: #191970">' + s + ' (' + ((s/z)*100).toFixed(2) +' %)</b>';
                        }
                        else{
                            this.public_oe_q2_a = '<b style="color: #72cc66">' + k + '</b>';
                            this.public_oe_q2_b = '<b style="color: #40B5AD">' + l + '</b>';
                            this.public_oe_q2_c = '<b style="color: #DAE021">' + m + '</b>';
                            this.public_oe_q2_d = '<b style="color: #FFBF00">' + n + '</b>';
                            this.public_oe_q2_e = '<b style="color: red">' + o + '</b>';
                            this.public_oe_q2_f = '<b style="color: #191970">' + s + '</b>';
                        }
                        this.Oe_Q2_loaded = true;
                    })
                }
                catch(err){    
                        console.log("OEQ2: " + err);
                }


                //Start Online Environment Q3
                try{
                    axios.post("http://127.0.0.1:8000/api/online_environment_Q3", postData) 
                    .then(response =>{
                        var a = response.data["oe_q3_a"];
                        var b = response.data["oe_q3_b"];
                        var c = response.data["oe_q3_c"];
                        var d = response.data["oe_q3_d"];
                        var x = response.data["oe_q3_total"];
                        this.Oe_Q3_C_chartData = [x, a, b, c, d];
                        var f = response.data["agent_oe_q3_a"];
                        var g = response.data["agent_oe_q3_b"];
                        var i = response.data["agent_oe_q3_c"];
                        var j = response.data["agent_oe_q3_d"];
                        var y = response.data["agent_oe_q3_total"];
                        this.Oe_Q3_A_chartData = [y, f, g, i, j];
                        var k = response.data["public_oe_q3_a"];
                        var l = response.data["public_oe_q3_b"];
                        var n = response.data["public_oe_q3_c"];
                        var o = response.data["public_oe_q3_d"];
                        var z = response.data["public_oe_q3_total"];
                        this.Oe_Q3_P_chartData = [z, k, l, n, o];
                        this.oe_q3_total = '<b style="color: #899499">' + x + "</b>";
                        this.agent_oe_q3_total = '<b style="color: #899499">' + y + "</b>";
                        this.public_oe_q3_total = '<b style="color: #899499">' + z + "</b>";
                        if(x != 0)
                        {
                            this.oe_q3_a = '<b style="color: #72cc66">' + a + ' (' + ((a/x)*100).toFixed(2) +' %)</b>';
                            this.oe_q3_b = '<b style="color: #40B5AD">' + b + ' (' + ((b/x)*100).toFixed(2) +' %)</b>';
                            this.oe_q3_c = '<b style="color: #FFBF00">' + c + ' (' + ((c/x)*100).toFixed(2) +' %)</b>';
                            this.oe_q3_d = '<b style="color: red">' + d + ' (' + ((d/x)*100).toFixed(2) +' %)</b>';
                        }
                        else{
                            this.oe_q3_a = '<b style="color: #72cc66">' + a + '</b>';
                            this.oe_q3_b = '<b style="color: #40B5AD">' + b + '</b>';
                            this.oe_q3_c = '<b style="color: #FFBF00">' + c + '</b>';
                            this.oe_q3_d = '<b style="color: red">' + d + '</b>';
                        }
                        if(y != 0)
                        {
                            this.agent_oe_q3_a = '<b style="color: #72cc66">' + f + ' (' + ((f/y)*100).toFixed(2) +' %)</b>';
                            this.agent_oe_q3_b = '<b style="color: #40B5AD">' + g + ' (' + ((g/y)*100).toFixed(2) +' %)</b>';
                            this.agent_oe_q3_c = '<b style="color: #FFBF00">' + i + ' (' + ((i/y)*100).toFixed(2) +' %)</b>';
                            this.agent_oe_q3_d = '<b style="color: red">' + j + ' (' + ((j/y)*100).toFixed(2) +' %)</b>';
                        }
                        else{
                            this.agent_oe_q3_a = '<b style="color: #72cc66">' + f + '</b>';
                            this.agent_oe_q3_b = '<b style="color: #40B5AD">' + g + '</b>';
                            this.agent_oe_q3_c = '<b style="color: #FFBF00">' + i + '</b>';
                            this.agent_oe_q3_d = '<b style="color: red">' + j + '</b>';
                        }
                        if(z != 0)
                        {
                            this.public_oe_q3_a = '<b style="color: #72cc66">' + k + ' (' + ((k/z)*100).toFixed(2) +' %)</b>';
                            this.public_oe_q3_b = '<b style="color: #40B5AD">' + l + ' (' + ((l/z)*100).toFixed(2) +' %)</b>';
                            this.public_oe_q3_c = '<b style="color: #FFBF00">' + n + ' (' + ((n/z)*100).toFixed(2) +' %)</b>';
                            this.public_oe_q3_d = '<b style="color: red">' + o + ' (' + ((o/z)*100).toFixed(2) +' %)</b>';
                        }
                        else{
                            this.public_oe_q3_a = '<b style="color: #72cc66">' + k + '</b>';
                            this.public_oe_q3_b = '<b style="color: #40B5AD">' + l + '</b>';
                            this.public_oe_q3_c = '<b style="color: #FFBF00">' + n + '</b>';
                            this.public_oe_q3_d = '<b style="color: red">' + o + '</b>';
                        }
                        this.Oe_Q3_loaded = true;
                    })
                    this.rotor = '&nbsp;<i class="fas fa-cog"></i>';
                    this.loader = '';
                    this.revealAll = true;
                    this.enableSubmit = false;
                }
                catch(err){    
                        console.log("OEQ3: " + err);
                }
            }
            if(this.challengesBox)
            {
                this.challengesSelected = true;

                //Start Challenges
                try{
                    axios.post("http://127.0.0.1:8000/api/challenges_Q1", postData) 
                    .then(response =>{
                        var a = response.data["c_q1_a"];
                        var b = response.data["c_q1_b"];
                        var c = response.data["c_q1_c"];
                        var d = response.data["c_q1_d"];
                        var e = response.data["c_q1_e"];
                        var q = response.data["c_q1_f"];
                        var x = response.data["c_q1_total"];
                        this.C_Q1_C_chartData = [a, b, c, d, e, q];
                        var f = response.data["agent_c_q1_a"];
                        var g = response.data["agent_c_q1_b"];
                        var h = response.data["agent_c_q1_c"];
                        var i = response.data["agent_c_q1_d"];
                        var j = response.data["agent_c_q1_e"];
                        var r = response.data["agent_c_q1_f"];
                        var y = response.data["agent_c_q1_total"]
                        this.C_Q1_A_chartData = [f, g, h, i, j, r];
                        var k = response.data["public_c_q1_a"];
                        var l = response.data["public_c_q1_b"];
                        var m = response.data["public_c_q1_c"];
                        var n = response.data["public_c_q1_d"];
                        var o = response.data["public_c_q1_e"];
                        var s = response.data["public_c_q1_f"];
                        var z = response.data["public_c_q1_total"];
                        this.C_Q1_P_chartData = [k, l, m, n, o, s];
                        this.c_q1_total = '<b style="color: #899499">' + x + "</b>";
                        this.agent_c_q1_total = '<b style="color: #899499">' + y + "</b>";
                        this.public_c_q1_total = '<b style="color: #899499">' + z + "</b>";
                        if(x != 0)
                        {
                            this.c_q1_a = '<b style="color: #72cc66">' + a + ' (' + ((a/x)*100).toFixed(2) +' %)</b>';
                            this.c_q1_b = '<b style="color: #40B5AD">' + b + ' (' + ((b/x)*100).toFixed(2) +' %)</b>';
                            this.c_q1_c = '<b style="color: #DAE021">' + c + ' (' + ((c/x)*100).toFixed(2) +' %)</b>';
                            this.c_q1_d = '<b style="color: #FFBF00">' + d + ' (' + ((d/x)*100).toFixed(2) +' %)</b>';
                            this.c_q1_e = '<b style="color: red">' + e + ' (' + ((e/x)*100).toFixed(2) +' %)</b>';
                            this.c_q1_f = '<b style="color: #FFBF00">' + q + ' (' + ((q/x)*100).toFixed(2) +' %)</b>';
                        }
                        else{
                            this.c_q1_a = '<b style="color: #72cc66">' + a + '</b>';
                            this.c_q1_b = '<b style="color: #40B5AD">' + b + '</b>';
                            this.c_q1_c = '<b style="color: #DAE021">' + c + '</b>';
                            this.c_q1_d = '<b style="color: #FFBF00">' + d + '</b>';
                            this.c_q1_e = '<b style="color: red">' + e + '</b>';
                            this.c_q1_f = '<b style="color: #FFBF00">' + q + '</b>';
                        }
                        if(y != 0)
                        {
                            this.agent_c_q1_a = '<b style="color: #72cc66">' + f + ' (' + ((f/y)*100).toFixed(2) +' %)</b>';
                            this.agent_c_q1_b = '<b style="color: #40B5AD">' + g + ' (' + ((g/y)*100).toFixed(2) +' %)</b>';
                            this.agent_c_q1_c = '<b style="color: #DAE021">' + h + ' (' + ((h/y)*100).toFixed(2) +' %)</b>';
                            this.agent_c_q1_d = '<b style="color: #FFBF00">' + i + ' (' + ((i/y)*100).toFixed(2) +' %)</b>';
                            this.agent_c_q1_e = '<b style="color: red">' + j + ' (' + ((j/y)*100).toFixed(2) +' %)</b>';
                            this.agent_c_q1_f = '<b style="color: #FFBF00">' + r + ' (' + ((r/y)*100).toFixed(2) +' %)</b>';
                        }
                        else{
                            this.agent_c_q1_a = '<b style="color: #72cc66">' + f + '</b>';
                            this.agent_c_q1_b = '<b style="color: #40B5AD">' + g + '</b>';
                            this.agent_c_q1_c = '<b style="color: #DAE021">' + h + '</b>';
                            this.agent_c_q1_d = '<b style="color: #FFBF00">' + i + '</b>';
                            this.agent_c_q1_e = '<b style="color: red">' + j + '</b>';
                            this.agent_c_q1_r = '<b style="color: #FFBF00">' + r + '</b>';
                        }
                        if(z != 0)
                        {
                            this.public_c_q1_a = '<b style="color: #72cc66">' + k + ' (' + ((k/z)*100).toFixed(2) +' %)</b>';
                            this.public_c_q1_b = '<b style="color: #40B5AD">' + l + ' (' + ((l/z)*100).toFixed(2) +' %)</b>';
                            this.public_c_q1_c = '<b style="color: #DAE021">' + m + ' (' + ((m/z)*100).toFixed(2) +' %)</b>';
                            this.public_c_q1_d = '<b style="color: #FFBF00">' + n + ' (' + ((n/z)*100).toFixed(2) +' %)</b>';
                            this.public_c_q1_e = '<b style="color: red">' + o + ' (' + ((o/z)*100).toFixed(2) +' %)</b>';
                            this.public_c_q1_f = '<b style="color: #FFBF00">' + s + ' (' + ((s/z)*100).toFixed(2) +' %)</b>';
                        }
                        else{
                            this.public_c_q1_a = '<b style="color: #72cc66">' + k + '</b>';
                            this.public_c_q1_b = '<b style="color: #40B5AD">' + l + '</b>';
                            this.public_c_q1_c = '<b style="color: #DAE021">' + m + '</b>';
                            this.public_c_q1_d = '<b style="color: #FFBF00">' + n + '</b>';
                            this.public_c_q1_e = '<b style="color: red">' + o + '</b>';
                            this.public_c_q1_f = '<b style="color: #FFBF00">' + s + '</b>';
                        }
                        this.C_Q1_loaded = true;
                    })
                }
                catch(err){    
                        console.log("CQ1: " + err);
                }
            }
        }
    }
}
</script>
