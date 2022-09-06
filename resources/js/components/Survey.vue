
<template><div>
<NavBar />
  <form @submit.prevent="SaveFeedback">
  <input type="hidden" name="_token" :value="csrf"> 
    <div class="row">
        <div class="col-sm-1">
        </div>
        <div class="col-sm-10">
            <br />
            <h2 style="border-bottom: 1px solid #DDDDDD">{{header}}</h2>
            <br />
            <div class="row"> <!-- Main Row -->
                <!-- Info -->
                <div class="col-sm-12">
                    <div class="alert alert-warning">
                        <strong>Thank you for visitng this page!</strong><i> We are interested in your opinion on the services we offer. Your responses 
                        and comments will be used to improve our services to you. Please let us have your thoughts on the following 
                        questions. All replies will be treated confidentially.</i>
                    </div>
                </div>
            </div>

            <!-- First Row -->
            <div class="row">
                <div class="col-sm-4">
                    <div class="row">
                        <div class="col-sm-12 align-middle">
                            <strong  class="form-label">Your accreditation type with the CAC:</strong><b class="text-danger">*</b>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12"> 
                            <div class="form-group">
                                <div class="input-group">
                                        <div class="input-group-text">
                                            <i class="fas fa-user" style="color: #8FBC8F"></i>
                                        </div>                    
                                    <select v-model="accredited" placeholder="Are you a CAC registered agent?" data-show-content="true" class="form-control border" required>
                                        <option value="">Please select what applies to you...</option>  
                                        <option value="Accredited User">Accredited User</option>
                                        <option value="Public User">Public User</option>      
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="row">
                        <div class="col-sm-12 align-middle">
                            <strong>Gender:</strong><b class="text-danger">*</b>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-text"> 
                                        <i class="fas fa-venus-mars" style="color: #8FBC8F"></i>
                                    </div>    
                                    <select v-model="gender" placeholder="Gender" data-show-content="true" class="form-control border" required>
                                        <option value="">Choose your gender...</option>  
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>      
                                    </select>        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Phone Number -->
                <div class="col-sm-4">
                    <div class="row">
                        <div class="col-sm-12 align-middle">
                            <strong  class="form-label">Profession:</strong><b class="text-danger">*</b>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12"> 
                            <div class="form-group">
                                <div class="input-group">
                                        <div class="input-group-text">
                                            <i class="fas fa-chalkboard-teacher" style="color: #8FBC8F"></i>
                                        </div>                    
                                    <input v-model="profession" type="text" class="form-control" placeholder="Your Profession" required >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Phone Number -->

            </div>

            <br />
            <h4 style="border-bottom: 1px solid #DDDDDD">Service Delivery</h4>
            <br />

            <!-- Service Delivery Row -->
            <div class="row">
                <dl class="row">
                    <dt class="col-sm-1">1.</dt>
                    <dd class="col-sm-11">Are you satisfied with your Name Reservation experience?
                        <div class="form-group">
                            <br />
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" id="sd1_1" name="sd1" type="radio" v-model="sd1" value="Very Satisfied" required>
                                <label class="form-check-label" for="sd1_1">Very Satisfied</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" id="sd1_2" name="sd1" type="radio" v-model="sd1" value="Satisfied" required>
                                <label class="form-check-label" for="sd1_2">Satisfied</label>
                            </div>
                                
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" id="sd1_3" type="radio" name="sd1" v-model="sd1" value="Dissatisfied" required>
                                <label class="form-check-label" for="sd1_3">Dissatisfied</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" id="sd1_4" type="radio" name="sd1" v-model="sd1" value="Very Dissatisfied" required>
                                <label class="form-check-label" for="sd1_4">Very Dissatisfied</label>
                            </div>
                                    
                        </div>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="col-sm-1">2.</dt>
                    <dd class="col-sm-11">Which registration service have you recently done online?
                        <div class="form-group">
                            <br />
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" id="sd2_1" type="radio" name="sd2" v-model="sd2" value="Company (LLC)" required>
                                <label class="form-check-label" for="sd2_1">Company (LLC)</label>
                            </div>
                            
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" id="sd2_2" type="radio" name="sd2" v-model="sd2" value="Business Names" required>
                                <label class="form-check-label" for="sd2_2">Business Names</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" id="sd2_3" type="radio" name="sd2" v-model="sd2" value="Incorporated Trustees" required>
                                <label class="form-check-label" for="sd2_3">Incorporated Trustees</label>
                            </div>
                                
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" id="sd2_4" type="radio" name="sd2" v-model="sd2" value="Limited Liability Partnership (LLP)" required>
                                <label class="form-check-label" for="sd2_4">Limited Liability Partnership (LLP)</label>
                            </div>
                            
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" id="sd2_5" type="radio" name="sd2" v-model="sd2" value="Limited Partnership (LP)" required>
                                <label class="form-check-label" for="sd2_5">Limited Partnership (LP)</label>
                            </div>
                        </div>
                    </dd>
                </dl>
            </div>

            <br />
            <h4 style="border-bottom: 1px solid #DDDDDD">Quality</h4>
            <br />
            
            <!-- Quality Row -->
            <div class="row">
                <dl class="row">
                    <dt class="col-sm-1">3.</dt>
                    <dd class="col-sm-11">How satisfied are you with the services we provide?
                        <div class="form-group">
                            <br />
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" id="q1" name="q" type="radio" required v-model="q" value="Very Satisfied">
                                <label class="form-check-label" for="q1">Very Satisfied</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" id="q2" name="q" type="radio" required v-model="q" value="Satisfied">
                                <label class="form-check-label" for="q2">Satisfied</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" id="q3" name="q" type="radio" required v-model="q" value="Dissatisfied">
                                <label class="form-check-label" for="q3">Dissatisfied</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" id="q4" name="q" type="radio" required v-model="q" value="Very Dissatisfied">
                                <label class="form-check-label" for="q4">Very Dissatisfied</label>
                            </div>
                        </div>        
                    </dd>
                </dl>
            </div>

            <br />
            <h4 style="border-bottom: 1px solid #DDDDDD">Timelines</h4>
            <br />
            
            <!-- Timeless Row -->
            <div class="row">
                <dl class="row">
                    <dt class="col-sm-1">4.</dt>
                    <dd class="col-sm-11">How fast did we deliver the services you asked for?
                    <div class="form-group">
                        <br />
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" id="t1_0" type="radio" required name="t1" v-model="t1" value="Less than 24 Hrs">
                            <label class="form-check-label" for="t1_0">Less than 24 Hrs</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" id="t1_1" name="t1" type="radio" required v-model="t1" value="24 Hrs">
                            <label class="form-check-label" for="t1_1">24 Hrs</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" id="t1_2" name="t1" type="radio" required v-model="t1" value="48 Hrs">
                            <label class="form-check-label" for="t1_2">48 Hrs</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" id="t1_3" name="t1" type="radio" required v-model="t1" value="3 Days">
                            <label class="form-check-label" for="t1_3">3 Days</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" id="t1_4" name="t1" type="radio" required v-model="t1" value="Over 3 Days">
                            <label class="form-check-label" for="t1_4">Over 3 Days</label>
                        </div>
                    </div>

                    </dd>
                </dl>
                <dl class="row">
                    <dt class="col-sm-1">5.</dt>
                    <dd class="col-sm-11">Which was your preferred channel of communication?
                        <div class="form-group">
                        <br />
                            <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="t2" @change="toggleOff"  id="t2_1" type="radio" required v-model="t2" value="Email">
                                    <label class="form-check-label" for="t2_1">Email</label>
                            </div>
                            <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="t2" @change="toggleOff"  id="t2_2" type="radio" required v-model="t2" value="Telephone">
                                    <label class="form-check-label" for="t2_2">Telephone</label>
                            </div>
                            <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="t2" @change="toggleOff"  id="t2_3" type="radio" required v-model="t2" value="Face to Face">
                                    <label class="form-check-label" for="t2_3">Face to Face</label>
                            </div>
                            <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="t2" @change="toggleOff"  id="t2_4" type="radio" required v-model="t2" value="Online Support Ticket System">
                                    <label class="form-check-label" for="t2_4">Online Support Ticket System</label>
                            </div>
                            <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="t2" @change="toggleOn" id="t2_5" type="radio" required v-model="t2" value="Others">
                                    <label class="form-check-label" for="t2_5">Others (Please specify)</label>
                            </div>
                            <div class="form-check form-check-inline">
                                    <div class="input-group">
                                        <input v-show="showOthers" type="text" class="form-control" placeholder="Others here..."  v-model="others" required :disabled="!(showOthers)">
                                </div>
                            </div>
                        </div>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="col-sm-1">6.</dt>
                    <dd class="col-sm-11">How satisfied are you with our complaint management?
                        <div class="form-group">
                        <br />
                            <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="t3" id="t3_1" type="radio" required v-model="t3" value="Very Satisfied">
                                    <label class="form-check-label" for="t3_1">Very Satisfied</label>
                            </div>
                            <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="t3" id="t3_2" type="radio" required v-model="t3" value="Satisfied">
                                    <label class="form-check-label" for="t3_2">Satisfied</label>
                            </div>
                            <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="t3" id="t3_3" type="radio" required v-model="t3" value="Dissatisfied">
                                    <label class="form-check-label" for="t3_3">Dissatisfied</label>
                            </div>
                            <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="t3" id="t3_4" type="radio" required v-model="t3" value="Very Dissatisfied">
                                    <label class="form-check-label" for="t3_4">Very Dissatisfied</label>
                            </div>
                        </div>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="col-sm-1">7.</dt>
                    <dd class="col-sm-11">How helpful did you find our Staff?
                        <div class="form-group">
                        <br />
                            <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="t4" id="t4_1" type="radio" required v-model="t4" value="Excellent">
                                    <label class="form-check-label" for="t4_1">Excellent</label>
                            </div>
                            <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="t4" id="t4_2" type="radio" required v-model="t4" value="Very Good">
                                    <label class="form-check-label" for="t4_2">Very Good</label>
                            </div>
                            <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="t4" id="t4_3" type="radio" required v-model="t4" value="Good">
                                    <label class="form-check-label" for="t4_3">Good</label>
                            </div>
                            <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="t4" id="t4_4" type="radio" required v-model="t4" value="Fair">
                                    <label class="form-check-label" for="t4_4">Fair</label>
                            </div>
                            <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="t4" id="t4_5" type="radio" required v-model="t4" value="Poor">
                                    <label class="form-check-label" for="t4_5">Poor</label>
                            </div>
                        </div>
                    </dd>
                </dl>
            </div>

            <br />
            <h4 style="border-bottom: 1px solid #DDDDDD">Online Environment</h4>
            <br />
            
            <!-- Online Environment Row -->
            <div class="row">
                <dl class="row">
                    <dt class="col-sm-1">8.</dt>
                    <dd class="col-sm-11">How user-friendly did you find the online registration system?
                        <div class="form-group">
                        <br />
                            <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="oe1" id="oe1_1" type="radio" required v-model="oe1" value="Excellent">
                                    <label class="form-check-label" for="oe1_1">Excellent</label>
                            </div>
                            <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="oe1" id="oe1_2" type="radio" required v-model="oe1" value="Very Good">
                                    <label class="form-check-label" for="oe1_2">Very Good</label>
                            </div>
                            <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="oe1" id="oe1_3" type="radio" required v-model="oe1" value="Good">
                                    <label class="form-check-label" for="oe1_3">Good</label>
                            </div>
                            <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="oe1" id="oe1_4" type="radio" required v-model="oe1" value="Fair">
                                    <label class="form-check-label" for="oe1_4">Fair</label>
                            </div>
                            <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="oe1" id="oe1_5" type="radio" required v-model="oe1" value="Poor">
                                    <label class="form-check-label" for="oe1_5">Poor</label>
                            </div>
                        </div>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="col-sm-1">9.</dt>
                    <dd class="col-sm-11">How would you rate the e-stamping interface on the CRP?
                        <div class="form-group">
                        <br />
                            <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="oe2" id="oe2_1" type="radio" required v-model="oe2" value="Excellent">
                                    <label class="form-check-label" for="oe2_1">Excellent</label>
                            </div>
                            <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="oe2" id="oe2_2" type="radio" required v-model="oe2" value="Very Good">
                                    <label class="form-check-label" for="oe2_2">Very Good</label>
                            </div>
                            <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="oe2" id="oe2_3" type="radio" required v-model="oe2" value="Good">
                                    <label class="form-check-label" for="oe2_3">Good</label>
                            </div>
                            <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="oe2" id="oe2_4" type="radio" required v-model="oe2" value="Fair">
                                    <label class="form-check-label" for="oe2_4">Fair</label>  
                            </div>
                            <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="oe2" id="oe2_5" type="radio" required v-model="oe2" value="Poor">
                                    <label class="form-check-label" for="oe2_5">Poor</label>
                            </div>
                            <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="oe2" id="oe2_6" type="radio" required v-model="oe2" value="Not Applicable">
                                    <label class="form-check-label" for="oe2_6">Not Applicable</label>
                            </div>
                        </div>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="col-sm-1">10.</dt>
                    <dd class="col-sm-11">How satisfied are you with the Remita payment platform on the CRP?
                        <div class="form-group">
                        <br />
                            <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="oe3" id="oe3_1" type="radio" required v-model="oe3" value="Very Satisfied">
                                    <label class="form-check-label" for="oe3_1">Very Satisfied</label>
                            </div>
                            <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="oe3" id="oe3_2" type="radio" required v-model="oe3" value="Satisfied">
                                    <label class="form-check-label" for="oe3_2">Satisfied</label>
                            </div>
                            <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="oe3" id="oe3_3" type="radio" required v-model="oe3" value="Dissatisfied">
                                    <label class="form-check-label" for="oe3_3">Dissatisfied</label>
                            </div>
                            <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="oe3" id="oe3_4" type="radio" required v-model="oe3" value="Very Dissatisfied">
                                    <label class="form-check-label" for="oe3_4">Very Dissatisfied</label>
                            </div>
                        </div>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="col-sm-1">11.</dt>
                    <dd class="col-sm-11">What are the most common challenges you usually encounter (Select at least, one option)?
                        <div class="form-group">
                        <br />
                            <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="c"  type="checkbox" v-model="c1" value="Document Editing">
                                    <label class="form-check-label" >Document Editing</label>
                            </div>
                            <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="c" type="checkbox" v-model="c2" value="Password/Username Reset">
                                    <label class="form-check-label" >Password/Username Reset</label>
                            </div>
                            <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="c" type="checkbox" v-model="c3" value="Incomplete Report">
                                    <label class="form-check-label" >Incomplete Report</label>
                            </div>
                            <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="c" type="checkbox" v-model="c4" value="Entity Status Update">
                                    <label class="form-check-label" >Entity Status Update</label>
                            </div>
                            <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="c" type="checkbox" v-model="c5" value="Stamp Duty Deleted">
                                    <label class="form-check-label" >Stamp Duty Deleted</label>
                            </div>
                            <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="c" @change="toggleOn1()" type="checkbox" v-model="c6" value="Others">
                                    <label class="form-check-label" >Others (Please specify)</label>
                            </div>
                            <div class="form-check form-check-inline">
                                    <div class="input-group">
                                        <input v-show="showOthers_" type="text" class="form-control" placeholder="Others here..."  v-model="others_" required :disabled="!(showOthers_)">
                                </div>
                            </div>
                        </div>
                    </dd>
                </dl>
            </div>


            <br />
            <h4 style="border-bottom: 1px solid #DDDDDD">Consent to be Contacted</h4>
            <br />

            <!-- Permission for Details Collection Row -->
            <div class="row">
                <dl class="row">
                    <dt class="col-sm-1">12.</dt>
                    <dd class="col-sm-11">Would you be happy to grant consent to the CAC to contact you regarding your feedback, or to take part in future research on other CAC services?
                        <div class="form-group">
                            <br />
                            <div class="switch">
                                <label>
                                    <label :style="ConsentLabelStyleRed">No</label><input type="checkbox" :value="consent" :checked="consent" @click="OnToggle()"><span class="lever"></span>
                                    <label :style="ConsentLabelStyleGreen">Yes</label>
                                </label>
                            </div>
                            <br />
                            <div class="row" v-show="consent">
                                <!-- Name -->
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-12 align-middle">
                                            <strong  class="form-label">Name:</strong><b class="text-danger">*</b>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12"> 
                                            <div class="form-group">
                                                <div class="input-group">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-user" style="color: #8FBC8F"></i>
                                                        </div>                    
                                                    <input v-model="name" type="text" class="form-control"  required :disabled="DisableConsentForm">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Name -->
                                <!-- Company Name -->
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-12 align-middle">
                                            <strong  class="form-label">Company Name:</strong><b class="text-danger">*</b>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12"> 
                                            <div class="form-group">
                                                <div class="input-group">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-building" style="color: #8FBC8F"></i>
                                                        </div>                    
                                                    <input v-model="company" type="text" class="form-control"  required :disabled="DisableConsentForm">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Company Name -->
                            </div>
                            <br />
                            <div class="row" v-show="consent">
                                <!-- Email -->
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-12 align-middle">
                                            <strong  class="form-label">Email Address:</strong><b class="text-danger">*</b>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12"> 
                                            <div class="form-group">
                                                <div class="input-group">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-envelope-open-text" style="color: #8FBC8F"></i>
                                                        </div>                    
                                                    <input v-model="email" type="text" class="form-control"  required :disabled="DisableConsentForm">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Email -->
                                <!-- Phone Number -->
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-12 align-middle">
                                            <strong  class="form-label">Phone Number:</strong><b class="text-danger">*</b>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12"> 
                                            <div class="form-group">
                                                <div class="input-group">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-phone-square-alt" style="color: #8FBC8F"></i>
                                                        </div>                    
                                                    <input v-model="phone" type="text" class="form-control"  required :disabled="DisableConsentForm">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Phone Number -->
                            </div>
                        </div>        
                    </dd>
                </dl>
            </div>

            <div class="row">
                <div class="col-4">
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <div class="d-grid gap-2">
                            <button type="submit"  class="btn shadow-sm btn-success rounded-0" id="btn_submit">
                                Submit Feedback 
                                <i class="fas fa-angle-double-right" style="horizontal-align: right;"></i>
                            </button> 
                        </div>
                    </div>
                </div>
                <div class="col-4">
                </div>
            </div>
            <!-- Loading Modal -->
            <div id="LoadingModal" ref="Modal" class="modal" style="font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif"> 
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">						
                            <h4 class="modal-title">Submitting Feedback</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body"> 		
                            <span v-html="loader">
                            </span>
                        </div>
                        <div class="modal-footer">
                            <span text-align="right" v-html="counter">
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <br /><br /><br /><br /><br /><br />
        </div>
        <div class="col-sm-1">
        </div>
    </div>
  </form>
</div>
</template>

<script>
import axios from 'axios';
import NavBar from './navigations/NavBar.vue';
export default {
    name: 'app',
    data() {
        return{
            header: "CUSTOMER SATISFACTION SURVEY FORM",
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            accredited: "",
            profession: "",
            gender: "",
            others: "",
            others_: "",
            sd1: null,
            sd2: null,
            q: null,
            t1: null,
            t2: null,
            t3: null,
            t4: null,
            oe1: null,
            oe2: null,
            oe3: null,
            c1: null,
            c2: null,
            c3: null,
            c4: null,
            c5: null,
            c6: null,
            loader: null,
            counter: null,
            showOthers: false,
            showOthers_: false,
            challenges:[],
            consent: false,
            ConsentLabelStyleRed: "color: red",
            ConsentLabelStyleGreen: "",
            DisableConsentForm: true,
            name: null,
            company: null,
            email: null,
            phone: null,
            postData: {}
        }
    },
    components:{
        NavBar
    },
    methods:{
        OnModalHide(){
            location.reload();
        },
        OnToggle(){
            this.consent = !this.consent;
            this.DisableConsentForm = !this.DisableConsentForm
            if(this.ConsentLabelStyleRed == "color: red" && this.consent == true)
            {
                this.ConsentLabelStyleGreen = "color: #009900";
                this.ConsentLabelStyleRed = "";
            }
            if(this.ConsentLabelStyleGreen == "color: #009900" && this.consent == false)
            {
                this.ConsentLabelStyleGreen = "";
                this.ConsentLabelStyleRed = "color: red";
                this.name = this.company = this.email = this.phone = null;
            }
        },
        fortmatResponse(res) {
            return JSON.stringify(res, null, 2);
        },
        SaveFeedback(){
            //Here, preparing for data to be posted via Axios Post
            this.loader = '<center><img src="images/cac_spinner.gif" width="100" height="100"/></center>';
            const self = this;
            if ($('input[type=checkbox]:checked').length <= 0)
            {
                alert("Please, select at least one option for challenges");
                return false;
            }
            else
            {
                $("input:checkbox[name=c]:checked").each(function(){
                    //if( ($(this).val()) != "Others_"){
                        self.challenges.push($(this).val());
                    //}
                });
            }
            this.counter = null;
            let element = this.$refs.Modal;
            $(element).modal('show');
            var challenges_tmp = this.challenges.toString();
            if(this.consent)
            {
                this.postData = {
                "accreditation": this.accredited,
                "profession": this.profession,
                "gender": this.gender,
                "service_delivery1": this.sd1,
                "service_delivery2": this.sd2,
                "quality": this.q,
                "timelines1": this.t1,
                "timelines2": this.t2,
                "others": this.others,
                "timelines3": this.t3,
                "timelines4": this.t4,
                "online_environment1": this.oe1,
                "online_environment2": this.oe2,
                "online_environment3": this.oe3,
                "challenges": challenges_tmp.replaceAll( ",",", "),
                "others_": this.others_,
                "consent": this.consent,
                "name": this.name,
                "company": this.company,
                "email": this.email,
                "phone": this.phone
            };
            }
            else
            {
                this.postData = {
                "accreditation": this.accredited,
                "profession": this.profession,
                "gender": this.gender,
                "service_delivery1": this.sd1,
                "service_delivery2": this.sd2,
                "quality": this.q,
                "timelines1": this.t1,
                "timelines2": this.t2,
                "others": this.others,
                "timelines3": this.t3,
                "timelines4": this.t4,
                "online_environment1": this.oe1,
                "online_environment2": this.oe2,
                "online_environment3": this.oe3,
                "challenges": challenges_tmp.replaceAll( ",",", "),
                "others_": this.others_,
                "consent": this.consent
            };
            }
            //setTimeout(() => { 
                try{
                    axios({
                        method: 'post',
                        url: 'http://127.0.0.1:8000/api/savefeedback',
                        data: this.postData,
                        headers: { 
                            'Content-type': 'application/json; charset=utf-8', 
                            'Authorization': 'remitaConsumerKey=232323,remitaConsumerToken=121212'
                        },
                        responseType: 'json'
                        })
                    .then(response =>{
                        if(response.data[1] == "Successful"){
                            if(this.consent)
                            {
                                this.loader='<div class="alert alert-success" align="justify"> '+ '<b> Dear ' + this.name + ',</b> <br />' +
                                '<i> Thank you for completing and submitting this form.' + 
                                ' Please take note that your feedback is of utmost importance to the CAC in making decision with' + 
                                ' respect to improving service delivery to our Clients.</i></div>';
                                this.counter='<label align="left" class="text-secondary">Your feedback index is <b class="text-warning">' +response.data[0]+ '</b></label>';
                            }
                            else
                            {
                                this.loader='<div class="alert alert-success" align="justify"> '+ 
                                '<i> Thank you for completing and submitting this form.' + 
                                ' Please take note that your feedback is of utmost importance to the CAC in making decision with' + 
                                ' respect to improving service delivery to our Clients.</i></div>';
                                this.counter='<label align="left" class="text-secondary">Your feedback index is <b class="text-warning">' +response.data[0]+ '</b></label>';
                            }
                        }
                        else{
                            this.loader='<div class="alert alert-danger" align="justify">' +
                            '</strong><i> We seem to be experiencing some snag, ' + 
                            ' as your feeback has not been captured on our Database due to server or network issue.' + 
                            ' Please bear with us and try again. Many thanks.</i></div>';
                        }
                    })
                }catch(err){    
                    console.log(err)
                } 
            //}, 3000);
        },
        toggleOn(){
            this.showOthers = true;
        },
        toggleOff(){
            this.showOthers = false;
        },
        toggleOn1(){
            this.showOthers_ = !this.showOthers_;
        }
    },
    mounted(){
        $(this.$refs.Modal).on("hidden.bs.modal", this.OnModalHide)
    }
}
</script> 