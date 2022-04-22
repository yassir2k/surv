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
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item" style="border:none">
                                                    <div class="chiller_cb form-check-inline align-items-center"><br />
                                                        <input id="sd" type="checkbox" v-model="serviceDeliveryBox" value="Service Delivery" aria-label="..." @change="check($event)">
                                                        <label for="sd">Service Delivery</label>
                                                        <span></span>
                                                    </div>
                                                </li>
                                            
                                                <li class="list-group-item" style="border:none">
                                                    <div class="chiller_cb form-check-inline align-items-center"><br />
                                                        <input id="q" type="checkbox" v-model="qualityBox" value="Quality" @change="check($event)">
                                                        <label for="q">Quality</label>
                                                        <span></span>
                                                    </div>
                                                </li>
                                                
                                                <li class="list-group-item" style="border:none">
                                                    <div class="chiller_cb form-check-inline align-items-center"><br />
                                                        <input id="t" type="checkbox" v-model="timelinessBox" value="Timeliness" @change="check($event)">
                                                        <label for="t">Timeliness</label>
                                                        <span></span>
                                                    </div>
                                                </li>
                                                
                                                <li class="list-group-item" style="border:none">
                                                    <div class="chiller_cb form-check-inline align-items-center"><br />
                                                        <input id="oe" type="checkbox" v-model="onlineEnvBox" value="Online Environment" @change="check($event)">
                                                        <label for="oe">Online Environment</label>
                                                        <span></span>
                                                    </div>
                                                </li>
                                            </ul>
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
                        <p class="card-text"><b class="font-pref14">REPORT SECTION</b></p>
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
                        <br />

                        <!-- *******************************************************************************************************************
                                                                        Service Delivery
                             ****************************************************************************************************************-->
                        <div v-show="revealAll">
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
                                <div class="row"> <!--  Online Environment Question 1 -->
                                    <div class="col-sm-1">
                                    </div>
                                    <div class="col-sm-10"><!-- Begin Numbers -->
                                        <div class="row">
                                            <div class="col-sm-10"><i class="fas fa-question-circle"></i>  <b>How satisfied are you with the effectiveness of the process flow of the online registration system?</b></div>
                                        </div>
                                        <br />
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <ul class="list-group list-group-flush">
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
                                            <div class="col-sm-3"> <!-- For Charts -->
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item" style="border:none">
                                                        3%
                                                    </li>
                                                    <li class="list-group-item" style="border:none">
                                                        23%
                                                    </li>
                                                    <li class="list-group-item" style="border:none">
                                                        34.4%
                                                    </li>
                                                    <li class="list-group-item" style="border:none">
                                                        50%
                                                    </li>
                                                    <li class="list-group-item" style="border:none">
                                                        50%
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div><!-- End Numbers -->
                                    <div class="col-sm-5"><!-- Begin Chart -->
                                    </div><!-- End Chart -->
                                </div>
                                <br />
                                <div class="row"> <!--  Online Environment Question 2 -->
                                    <div class="col-sm-1">
                                    </div>
                                    <div class="col-sm-10"><!-- Begin Numbers -->
                                        <div class="row">
                                            <div class="col-sm-10"><i class="fas fa-question-circle"></i>  <b>How would you rate the e-stamping interface on the CRP?</b></div>
                                        </div>
                                        <br />
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <ul class="list-group list-group-flush">
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
                                            <div class="col-sm-3"> <!-- For Charts -->
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item" style="border:none">
                                                        3%
                                                    </li>
                                                    <li class="list-group-item" style="border:none">
                                                        23%
                                                    </li>
                                                    <li class="list-group-item" style="border:none">
                                                        34.4%
                                                    </li>
                                                    <li class="list-group-item" style="border:none">
                                                        50%
                                                    </li>
                                                    <li class="list-group-item" style="border:none">
                                                        50%
                                                    </li>
                                                </ul>
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
                                            <div class="col-sm-5">
                                                <ul class="list-group list-group-flush">
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
                                            <div class="col-sm-3"> <!-- For Charts -->
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item" style="border:none">
                                                        3%
                                                    </li>
                                                    <li class="list-group-item" style="border:none">
                                                        23%
                                                    </li>
                                                    <li class="list-group-item" style="border:none">
                                                        34.4%
                                                    </li>
                                                    <li class="list-group-item" style="border:none">
                                                        50%
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div><!-- End Numbers -->
                                    <div class="col-sm-5"><!-- Begin Chart -->
                                    </div><!-- End Chart -->
                                </div>
                                <br />
                            </div> <!-- End of Column 12 -->
                        </div><!-- End of Online Environment-->
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
export default {
    data() {
        return {

            header_1: "Business Intelligence Report",
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
            serviceDeliveryBox: null,
            qualityBox: null,
            timelinessBox: null,
            onlineEnvBox: null,
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
        }
    },
    components:{
         NavBar
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
            this.loader = '<center><i class="fas fa-spinner fa-spin fa-5x fa-fw" style="color: #8FBC8F"></i></center>';
            this.revealAll = true;
            this.serviceDeliverySelected = false;
            this.qualitySelected = false;
            this.timelinessSelected = false;
            this.onlineEnvironmentSelected = false;
            var postData = {
                "beginDate": this.beginDate,
                "endDate": this.endDate,
            }
            if(this.serviceDeliveryBox)
            {
                this.serviceDeliverySelected = true;
                //Start with Service Delivery Q1
                try{
                    axios.post("http://127.0.0.1:8000/api/service_delivery_Q1", postData) 
                    .then(response =>{
                        console.log(response);
                        var a = response.data["sd_q1_a"];
                        var b = response.data["sd_q1_b"];
                        var c = response.data["sd_q1_c"];
                        var d = response.data["sd_q1_d"];
                        var x = response.data["sd_q1_total"]
                        var e = response.data["agent_sd_q1_a"];
                        var f = response.data["agent_sd_q1_b"];
                        var g = response.data["agent_sd_q1_c"];
                        var h = response.data["agent_sd_q1_d"];
                        var y = response.data["agent_sd_q1_total"]
                        var i = response.data["public_sd_q1_a"];
                        var j = response.data["public_sd_q1_b"];
                        var k = response.data["public_sd_q1_c"];
                        var l = response.data["public_sd_q1_d"];
                        var z = response.data["public_sd_q1_total"]
                        this.sd_q1_total = '<b style="color: #FF0000">' + x + "</b>";
                        this.agent_sd_q1_total = '<b style="color: #FF0000">' + y + "</b>";
                        this.public_sd_q1_total = '<b style="color: #FF0000">' + z + "</b>";
                        if(x != 0)
                        {
                            this.sd_q1_a = '<b style="color: #E39802">' + a + ' (' + ((a/x)*100).toFixed(2) +' %)</b>';
                            this.sd_q1_b = '<b style="color: #E39802">' + b + ' (' + ((b/x)*100).toFixed(2) +' %)</b>';
                            this.sd_q1_c = '<b style="color: #E39802">' + c + ' (' + ((c/x)*100).toFixed(2) +' %)</b>';
                            this.sd_q1_d = '<b style="color: #E39802">' + d + ' (' + ((d/x)*100).toFixed(2) +' %)</b>';
                        }
                        else{
                            this.sd_q1_a = '<b style="color: #E39802">' + a + '</b>';
                            this.sd_q1_b = '<b style="color: #E39802">' + b + '</b>';
                            this.sd_q1_c = '<b style="color: #E39802">' + c + '</b>';
                            this.sd_q1_d = '<b style="color: #E39802">' + d + '</b>';
                        }
                        if(y != 0)
                        {
                            this.agent_sd_q1_a = '<b style="color: #E39802">' + e + ' (' + ((e/y)*100).toFixed(2) +' %)</b>';
                            this.agent_sd_q1_b = '<b style="color: #E39802">' + f + ' (' + ((f/y)*100).toFixed(2) +' %)</b>';
                            this.agent_sd_q1_c = '<b style="color: #E39802">' + g + ' (' + ((g/y)*100).toFixed(2) +' %)</b>';
                            this.agent_sd_q1_d = '<b style="color: #E39802">' + h + ' (' + ((h/y)*100).toFixed(2) +' %)</b>';
                        }
                        else{
                            this.agent_sd_q1_a = '<b style="color: #E39802">' + e + '</b>';
                            this.agent_sd_q1_b = '<b style="color: #E39802">' + f + '</b>';
                            this.agent_sd_q1_c = '<b style="color: #E39802">' + g + '</b>';
                            this.agent_sd_q1_d = '<b style="color: #E39802">' + h + '</b>';
                        }
                        if(z != 0)
                        {
                            this.public_sd_q1_a = '<b style="color: #E39802">' + i + ' (' + ((i/z)*100).toFixed(2) +' %)</b>';
                            this.public_sd_q1_b = '<b style="color: #E39802">' + j + ' (' + ((j/z)*100).toFixed(2) +' %)</b>';
                            this.public_sd_q1_c = '<b style="color: #E39802">' + k + ' (' + ((k/z)*100).toFixed(2) +' %)</b>';
                            this.public_sd_q1_d = '<b style="color: #E39802">' + l + ' (' + ((l/z)*100).toFixed(2) +' %)</b>';
                        }
                        else{
                            this.public_sd_q1_a = '<b style="color: #E39802">' + i + '</b>';
                            this.public_sd_q1_b = '<b style="color: #E39802">' + j + '</b>';
                            this.public_sd_q1_c = '<b style="color: #E39802">' + k + '</b>';
                            this.public_sd_q1_d = '<b style="color: #E39802">' + l + '</b>';
                        }
                    })
                }
                catch(err){    
                        console.log("SDQ1: " + err);
                }

                //Start with Service Delivery Q2
                try{
                    axios.post("http://127.0.0.1:8000/api/service_delivery_Q2", postData) 
                    .then(response =>{
                        console.log(response);
                        var a = response.data["sd_q2_a"];
                        var b = response.data["sd_q2_b"];
                        var c = response.data["sd_q2_c"];
                        var d = response.data["sd_q2_d"];
                        var e = response.data["sd_q2_e"];
                        var x = response.data["sd_q2_total"]
                        var f = response.data["agent_sd_q2_a"];
                        var g = response.data["agent_sd_q2_b"];
                        var h = response.data["agent_sd_q2_c"];
                        var i = response.data["agent_sd_q2_d"];
                        var j = response.data["agent_sd_q2_e"];
                        var y = response.data["agent_sd_q2_total"]
                        var k = response.data["public_sd_q2_a"];
                        var l = response.data["public_sd_q2_b"];
                        var m = response.data["public_sd_q2_c"];
                        var n = response.data["public_sd_q2_d"];
                        var o = response.data["public_sd_q2_e"];
                        var z = response.data["public_sd_q2_total"]
                        this.sd_q2_total = '<b style="color: #4CBB17">' + x + "</b>";
                        this.agent_sd_q2_total = '<b style="color: #4CBB17">' + y + "</b>";
                        this.public_sd_q2_total = '<b style="color: #4CBB17">' + z + "</b>";
                        if(x != 0)
                        {
                            this.sd_q2_a = '<b style="color: #E39802">' + a + ' (' + ((a/x)*100).toFixed(2) +' %)</b>';
                            this.sd_q2_b = '<b style="color: #E39802">' + b + ' (' + ((b/x)*100).toFixed(2) +' %)</b>';
                            this.sd_q2_c = '<b style="color: #E39802">' + c + ' (' + ((c/x)*100).toFixed(2) +' %)</b>';
                            this.sd_q2_d = '<b style="color: #E39802">' + d + ' (' + ((d/x)*100).toFixed(2) +' %)</b>';
                            this.sd_q2_e = '<b style="color: #E39802">' + e + ' (' + ((e/x)*100).toFixed(2) +' %)</b>';
                        }
                        else{
                            this.sd_q2_a = '<b style="color: #E39802">' + a + '</b>';
                            this.sd_q2_b = '<b style="color: #E39802">' + b + '</b>';
                            this.sd_q2_c = '<b style="color: #E39802">' + c + '</b>';
                            this.sd_q2_d = '<b style="color: #E39802">' + d + '</b>';
                            this.sd_q2_e = '<b style="color: #E39802">' + e + '</b>';
                        }
                        if(y != 0)
                        {
                            this.agent_sd_q2_a = '<b style="color: #E39802">' + f + ' (' + ((f/y)*100).toFixed(2) +' %)</b>';
                            this.agent_sd_q2_b = '<b style="color: #E39802">' + g + ' (' + ((g/y)*100).toFixed(2) +' %)</b>';
                            this.agent_sd_q2_c = '<b style="color: #E39802">' + h + ' (' + ((h/y)*100).toFixed(2) +' %)</b>';
                            this.agent_sd_q2_d = '<b style="color: #E39802">' + i + ' (' + ((i/y)*100).toFixed(2) +' %)</b>';
                            this.agent_sd_q2_e = '<b style="color: #E39802">' + j + ' (' + ((j/y)*100).toFixed(2) +' %)</b>';
                        }
                        else{
                            this.agent_sd_q2_a = '<b style="color: #E39802">' + f + '</b>';
                            this.agent_sd_q2_b = '<b style="color: #E39802">' + g + '</b>';
                            this.agent_sd_q2_c = '<b style="color: #E39802">' + h + '</b>';
                            this.agent_sd_q2_d = '<b style="color: #E39802">' + i + '</b>';
                            this.agent_sd_q2_e = '<b style="color: #E39802">' + j + '</b>';
                        }
                        if(z != 0)
                        {
                            this.public_sd_q2_a = '<b style="color: #E39802">' + k + ' (' + ((k/z)*100).toFixed(2) +' %)</b>';
                            this.public_sd_q2_b = '<b style="color: #E39802">' + l + ' (' + ((l/z)*100).toFixed(2) +' %)</b>';
                            this.public_sd_q2_c = '<b style="color: #E39802">' + m + ' (' + ((m/z)*100).toFixed(2) +' %)</b>';
                            this.public_sd_q2_d = '<b style="color: #E39802">' + n + ' (' + ((n/z)*100).toFixed(2) +' %)</b>';
                            this.public_sd_q2_e = '<b style="color: #E39802">' + o + ' (' + ((o/z)*100).toFixed(2) +' %)</b>';
                        }
                        else{
                            this.public_sd_q2_a = '<b style="color: #E39802">' + k + '</b>';
                            this.public_sd_q2_b = '<b style="color: #E39802">' + l + '</b>';
                            this.public_sd_q2_c = '<b style="color: #E39802">' + m + '</b>';
                            this.public_sd_q2_d = '<b style="color: #E39802">' + n + '</b>';
                            this.public_sd_q2_e = '<b style="color: #E39802">' + o + '</b>';
                        }
                    })
                }
                catch(err){    
                        console.log("SDQ2: " + err);
                }
            }
            if(this.qualityBox)
            {
                this.qualitySelected = true;
                try{
                    axios.post("http://127.0.0.1:8000/api/qualityQ1", postData) 
                    .then(response =>{
                        console.log(response);
                        var a = response.data["q_a"];
                        var b = response.data["q_b"];
                        var c = response.data["q_c"];
                        var d = response.data["q_d"];
                        var x = response.data["q_total"]
                        var e = response.data["agent_q_a"];
                        var f = response.data["agent_q_b"];
                        var g = response.data["agent_q_c"];
                        var h = response.data["agent_q_d"];
                        var y = response.data["agent_q_total"]
                        var i = response.data["public_q_a"];
                        var j = response.data["public_q_b"];
                        var k = response.data["public_q_c"];
                        var l = response.data["public_q_d"];
                        var z = response.data["public_q_total"]
                        this.q_total = '<b style="color: #FF0000">' + x + "</b>";
                        this.agent_q_total = '<b style="color: #FF0000">' + y + "</b>";
                        this.public_q_total = '<b style="color: #FF0000">' + z + "</b>";
                        if(x != 0)
                        {
                            this.q_a = '<b style="color: #E39802">' + a + ' (' + ((a/x)*100).toFixed(2) +' %)</b>';
                            this.q_b = '<b style="color: #E39802">' + b + ' (' + ((b/x)*100).toFixed(2) +' %)</b>';
                            this.q_c = '<b style="color: #E39802">' + c + ' (' + ((c/x)*100).toFixed(2) +' %)</b>';
                            this.q_d = '<b style="color: #E39802">' + d + ' (' + ((d/x)*100).toFixed(2) +' %)</b>';
                        }
                        else{
                            this.q_a = '<b style="color: #E39802">' + a + '</b>';
                            this.q_b = '<b style="color: #E39802">' + b + '</b>';
                            this.q_c = '<b style="color: #E39802">' + c + '</b>';
                            this.q_d = '<b style="color: #E39802">' + d + '</b>';
                        }
                        if(y != 0)
                        {
                            this.agent_q_a = '<b style="color: #E39802">' + e + ' (' + ((e/y)*100).toFixed(2) +' %)</b>';
                            this.agent_q_b = '<b style="color: #E39802">' + f + ' (' + ((f/y)*100).toFixed(2) +' %)</b>';
                            this.agent_q_c = '<b style="color: #E39802">' + g + ' (' + ((g/y)*100).toFixed(2) +' %)</b>';
                            this.agent_q_d = '<b style="color: #E39802">' + h + ' (' + ((h/y)*100).toFixed(2) +' %)</b>';
                        }
                        else{
                            this.agent_q_a = '<b style="color: #E39802">' + e + '</b>';
                            this.agent_q_b = '<b style="color: #E39802">' + f + '</b>';
                            this.agent_q_c = '<b style="color: #E39802">' + g + '</b>';
                            this.agent_q_d = '<b style="color: #E39802">' + h + '</b>';
                        }
                        if(z != 0)
                        {
                            this.public_q_a = '<b style="color: #E39802">' + i + ' (' + ((i/z)*100).toFixed(2) +' %)</b>';
                            this.public_q_b = '<b style="color: #E39802">' + j + ' (' + ((j/z)*100).toFixed(2) +' %)</b>';
                            this.public_q_c = '<b style="color: #E39802">' + k + ' (' + ((k/z)*100).toFixed(2) +' %)</b>';
                            this.public_q_d = '<b style="color: #E39802">' + l + ' (' + ((l/z)*100).toFixed(2) +' %)</b>';
                        }
                        else{
                            this.public_sd_q1_a = '<b style="color: #E39802">' + i + '</b>';
                            this.public_sd_q1_b = '<b style="color: #E39802">' + j + '</b>';
                            this.public_sd_q1_c = '<b style="color: #E39802">' + k + '</b>';
                            this.public_sd_q1_d = '<b style="color: #E39802">' + l + '</b>';
                        }
                    })
                }
                catch(err){    
                        console.log("QQ1: " + err);
                }
            }
            if(this.timelinessBox)
            {
                this.timelinessSelected = true;
                //Start with Timeliness Q1
                try{
                    axios.post("http://127.0.0.1:8000/api/timeliness_Q1", postData) 
                    .then(response =>{
                        console.log(response);
                        var a = response.data["t_q1_a"];
                        var b = response.data["t_q1_b"];
                        var c = response.data["t_q1_c"];
                        var d = response.data["t_q1_d"];
                        var e = response.data["t_q1_e"];
                        var x = response.data["t_q1_total"]
                        var f = response.data["agent_t_q1_a"];
                        var g = response.data["agent_t_q1_b"];
                        var h = response.data["agent_t_q1_c"];
                        var i = response.data["agent_t_q1_d"];
                        var j = response.data["agent_t_q1_e"];
                        var y = response.data["agent_t_q1_total"]
                        var k = response.data["public_t_q1_a"];
                        var l = response.data["public_t_q1_b"];
                        var m = response.data["public_t_q1_c"];
                        var n = response.data["public_t_q1_d"];
                        var o = response.data["public_t_q1_e"];
                        var z = response.data["public_t_q1_total"]
                        this.t_q1_total = '<b style="color: #4CBB17">' + x + "</b>";
                        this.agent_t_q1_total = '<b style="color: #4CBB17">' + y + "</b>";
                        this.public_t_q1_total = '<b style="color: #4CBB17">' + z + "</b>";
                        if(x != 0)
                        {
                            this.t_q1_a = '<b style="color: #E39802">' + a + ' (' + ((a/x)*100).toFixed(2) +' %)</b>';
                            this.t_q1_b = '<b style="color: #E39802">' + b + ' (' + ((b/x)*100).toFixed(2) +' %)</b>';
                            this.t_q1_c = '<b style="color: #E39802">' + c + ' (' + ((c/x)*100).toFixed(2) +' %)</b>';
                            this.t_q1_d = '<b style="color: #E39802">' + d + ' (' + ((d/x)*100).toFixed(2) +' %)</b>';
                            this.t_q1_e = '<b style="color: #E39802">' + e + ' (' + ((e/x)*100).toFixed(2) +' %)</b>';
                        }
                        else{
                            this.t_q1_a = '<b style="color: #E39802">' + a + '</b>';
                            this.t_q1_b = '<b style="color: #E39802">' + b + '</b>';
                            this.t_q1_c = '<b style="color: #E39802">' + c + '</b>';
                            this.t_q1_d = '<b style="color: #E39802">' + d + '</b>';
                            this.t_q1_e = '<b style="color: #E39802">' + e + '</b>';
                        }
                        if(y != 0)
                        {
                            this.agent_t_q1_a = '<b style="color: #E39802">' + f + ' (' + ((f/y)*100).toFixed(2) +' %)</b>';
                            this.agent_t_q1_b = '<b style="color: #E39802">' + g + ' (' + ((g/y)*100).toFixed(2) +' %)</b>';
                            this.agent_t_q1_c = '<b style="color: #E39802">' + h + ' (' + ((h/y)*100).toFixed(2) +' %)</b>';
                            this.agent_t_q1_d = '<b style="color: #E39802">' + i + ' (' + ((i/y)*100).toFixed(2) +' %)</b>';
                            this.agent_t_q1_e = '<b style="color: #E39802">' + j + ' (' + ((j/y)*100).toFixed(2) +' %)</b>';
                        }
                        else{
                            this.agent_t_q1_a = '<b style="color: #E39802">' + f + '</b>';
                            this.agent_t_q1_b = '<b style="color: #E39802">' + g + '</b>';
                            this.agent_t_q1_c = '<b style="color: #E39802">' + h + '</b>';
                            this.agent_t_q1_d = '<b style="color: #E39802">' + i + '</b>';
                            this.agent_t_q1_e = '<b style="color: #E39802">' + j + '</b>';
                        }
                        if(z != 0)
                        {
                            this.public_t_q1_a = '<b style="color: #E39802">' + k + ' (' + ((k/z)*100).toFixed(2) +' %)</b>';
                            this.public_t_q1_b = '<b style="color: #E39802">' + l + ' (' + ((l/z)*100).toFixed(2) +' %)</b>';
                            this.public_t_q1_c = '<b style="color: #E39802">' + m + ' (' + ((m/z)*100).toFixed(2) +' %)</b>';
                            this.public_t_q1_d = '<b style="color: #E39802">' + n + ' (' + ((n/z)*100).toFixed(2) +' %)</b>';
                            this.public_t_q1_e = '<b style="color: #E39802">' + o + ' (' + ((o/z)*100).toFixed(2) +' %)</b>';
                        }
                        else{
                            this.public_t_q1_a = '<b style="color: #E39802">' + k + '</b>';
                            this.public_t_q1_b = '<b style="color: #E39802">' + l + '</b>';
                            this.public_t_q1_c = '<b style="color: #E39802">' + m + '</b>';
                            this.public_t_q1_d = '<b style="color: #E39802">' + n + '</b>';
                            this.public_t_q1_e = '<b style="color: #E39802">' + o + '</b>';
                        }
                    })
                }
                catch(err){    
                        console.log("SDQ2: " + err);
                }
            }
            if(this.onlineEnvBox)
            {
                this.onlineEnvironmentSelected = true;
            }
        }
    }
}
</script>
