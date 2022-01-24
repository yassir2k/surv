
<template><div>
<NavBar />
  <form action="/submit-feedback" method="post">
  <input type="hidden" name="_token" :value="csrf"> 
    <div class="row">
        <div class="col-1">
            
        </div>
        <div class="col-9">
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

                <!-- First Row -->
                <div class="row">
                    <div class="col-sm-4">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-12 align-middle">
                                    <strong>Name of Respondent:</strong><b class="text-danger">*</b>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12"> 
                                <div class="form-group">
                                    <div class="input-group">
                                            <div class="input-group-text">
                                                <i class="fas fa-user-edit" style="color: #8FBC8F"></i>
                                            </div>                    
                                        <input type="text" class="form-control" placeholder="Your full name..." ref="respondent" name="respondent" required >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="row">
                            <div class="col-sm-12 align-middle">
                                <strong>Profession:</strong><b class="text-danger">*</b>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fas fa-user-tie" style="color: #8FBC8F"></i>
                                            </span>                    
                                        <input type="text" class="form-control" placeholder="What do you do for a living?" ref="profession" name="profession" required >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="col-sm-12 align-middle">
                                    <strong>Accreditation Number (Where applicable):</strong>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="input-group">
                                            <div class="input-group-text"> 
                                                <i class="fas fa-user-edit" style="color: #8FBC8F"></i>
                                            </div>                    
                                        <input type="text" class="form-control" placeholder="Accreditation Number e.g. NBA/IND/1234" ref="accreditation"  name="accreditation" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <br />

            </div><!-- End of Main Row -->

            <br />
            <h4 style="border-bottom: 1px solid #DDDDDD">Service Delivery</h4>
            <br />
            
            <!-- Service Delivery Row -->
            <div class="row">
                <dl class="row">
                    <dt class="col-sm-1">1.</dt>
                    <dd class="col-sm-11">Are you satisfied with the conduct of the Name Availability for your registration?
                        <ul class="list-unstyled">
                            <li class="list-inline-item">
                                <div class="chiller_cb form-check-inline align-items-center"><br />
                                    <input id="sd1_1" type="radio" v-model="sd1" value="Very Satisfied">
                                    <label for="sd1_1">Very Satisfied</label>
                                    <span></span>
                                </div>
                            </li>
                            <li class="list-inline-item">
                                <div class="chiller_cb form-check-inline align-items-center"><br />
                                    <input id="sd1_2" type="radio" v-model="sd1" value="Satisfied">
                                    <label for="sd1_2">Satisfied</label>
                                    <span></span>
                                </div>
                            </li>
                            <li class="list-inline-item">
                                <div class="chiller_cb form-check-inline align-items-center"><br />
                                    <input id="sd1_3" type="radio" v-model="sd1" value="Dissatisfied">
                                    <label for="sd1_3">Dissatisfied</label>
                                    <span></span>
                                </div>
                            </li>
                            <li class="list-inline-item">
                                <div class="chiller_cb form-check-inline align-items-center"><br />
                                    <input id="sd1_4" type="radio" v-model="sd1" value="Very Dissatisfied">
                                    <label for="sd1_4">Very Dissatisfied</label>
                                    <span></span>
                                </div>
                            </li>
                        </ul>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="col-sm-1">2.</dt>
                    <dd class="col-sm-11">Which Registration service have you done online?
                        <ul class="list-unstyled">
                            <li class="list-inline-item">
                                <div class="chiller_cb form-check-inline align-items-center"><br />
                                    <input id="sd2_1" type="radio" v-model="sd2" value="Company (LLC)">
                                    <label for="sd2_1">Company (LLC)</label>
                                    <span></span>
                                </div>
                            </li>
                            <li class="list-inline-item">
                                <div class="chiller_cb form-check-inline align-items-center"><br />
                                    <input id="sd2_2" type="radio" v-model="sd2" value="Business Names">
                                    <label for="sd2_2">Business Names</label>
                                    <span></span>
                                </div>
                            </li>
                            <li class="list-inline-item">
                                <div class="chiller_cb form-check-inline align-items-center"><br />
                                    <input id="sd2_3" type="radio" v-model="sd2" value="Incorporated Trustees">
                                    <label for="sd2_3">Incorporated Trustees</label>
                                    <span></span>
                                </div>
                            </li>
                            <li class="list-inline-item">
                                <div class="chiller_cb form-check-inline align-items-center"><br />
                                    <input id="sd2_4" type="radio" v-model="sd2" value="Limited Liability Partnership (LLP)">
                                    <label for="sd2_4">Limited Liability Partnership (LLP)</label>
                                    <span></span>
                                </div>
                            </li>
                            <li class="list-inline-item">
                                <div class="chiller_cb form-check-inline align-items-center"><br />
                                    <input id="sd2_5" type="radio" v-model="sd2" value="Limited Partnership (LP)">
                                    <label for="sd2_5">Limited Partnership (LP)</label>
                                    <span></span>
                                </div>
                            </li>
                        </ul>
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
                        <ul class="list-unstyled">
                            <li class="list-inline-item">
                                <div class="chiller_cb form-check-inline align-items-center"><br />
                                    <input id="q1" type="radio" v-model="q" name="q" value="Very Satisfied">
                                    <label for="q1">Very Satisfied</label>
                                    <span></span>
                                </div>
                            </li>
                            <li class="list-inline-item">
                                <div class="chiller_cb form-check-inline align-items-center"><br />
                                    <input id="q2" type="radio" v-model="q" value="Satisfied">
                                    <label for="q2">Satisfied</label>
                                    <span></span>
                                </div>
                            </li>
                            <li class="list-inline-item">
                                <div class="chiller_cb form-check-inline align-items-center"><br />
                                    <input id="q3" type="radio" v-model="q" value="Dissatisfied">
                                    <label for="q3">Dissatisfied</label>
                                    <span></span>
                                </div>
                            </li>
                            <li class="list-inline-item">
                                <div class="chiller_cb form-check-inline align-items-center"><br />
                                    <input id="q4" type="radio" v-model="q" value="Very Dissatisfied">
                                    <label for="q4">Very Dissatisfied</label>
                                    <span></span>
                                </div>
                            </li>
                        </ul>
                    </dd>
                </dl>
            </div>


            <br />
            <h4 style="border-bottom: 1px solid #DDDDDD">Timeliness</h4>
            <br />
            
            <!-- Timeless Row -->
            <div class="row">
                <dl class="row">
                    <dt class="col-sm-1">4.</dt>
                    <dd class="col-sm-11">How fast did we deliver the services you asked for?
                        <ul class="list-unstyled">
                            <li class="list-inline-item">
                                <div class="chiller_cb form-check-inline align-items-center"><br />
                                    <input id="t1_1" type="radio" v-model="t1" value="24 Hrs">
                                    <label for="t1_1">24 Hrs</label>
                                    <span></span>
                                </div>
                            </li>
                            <li class="list-inline-item">
                                <div class="chiller_cb form-check-inline align-items-center"><br />
                                    <input id="t1_2" type="radio" v-model="t1" value="48 Hrs">
                                    <label for="t1_2">48 Hrs</label>
                                    <span></span>
                                </div>
                            </li>
                            <li class="list-inline-item">
                                <div class="chiller_cb form-check-inline align-items-center"><br />
                                    <input id="t1_3" type="radio" v-model="t1" value="3 Days">
                                    <label for="t1_3">3 Days</label>
                                    <span></span>
                                </div>
                            </li>
                            <li class="list-inline-item">
                                <div class="chiller_cb form-check-inline align-items-center"><br />
                                    <input id="t1_4" type="radio" v-model="t1" value="Over 3 Days">
                                    <label for="t1_4">Over 3 Days</label>
                                    <span></span>
                                </div>
                            </li>
                        </ul>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="col-sm-1">5.</dt>
                    <dd class="col-sm-11">Did you have cause to complain on anything? Which was your preferred channel of communicating the complaints?
                        <ul class="list-unstyled">
                            <li class="list-inline-item">
                                <div class="chiller_cb form-check-inline align-items-center"><br />
                                    <input id="t2_1" type="radio" v-model="t2" value="Email">
                                    <label for="t2_1">Email</label>
                                    <span></span>
                                </div>
                            </li>
                            <li class="list-inline-item">
                                <div class="chiller_cb form-check-inline align-items-center"><br />
                                    <input id="t2_2" type="radio" v-model="t2" value="Telephone">
                                    <label for="t2_2">Telephone</label>
                                    <span></span>
                                </div>
                            </li>
                            <li class="list-inline-item">
                                <div class="chiller_cb form-check-inline align-items-center"><br />
                                    <input id="t2_3" type="radio" v-model="t2" value="Face to Face">
                                    <label for="t2_3">Face to Face</label>
                                    <span></span>
                                </div>
                            </li>
                        </ul>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="col-sm-1">6.</dt>
                    <dd class="col-sm-11">Were you satisfied with the way the complaint was handled?
                        <ul class="list-unstyled">
                            <li class="list-inline-item">
                                <div class="chiller_cb form-check-inline align-items-center"><br />
                                    <input id="t3_1" type="radio" v-model="t3" value="Very Satisfied">
                                    <label for="t3_1">Very Satisfied</label>
                                    <span></span>
                                </div>
                            </li>
                            <li class="list-inline-item">
                                <div class="chiller_cb form-check-inline align-items-center"><br />
                                    <input id="t3_2" type="radio" v-model="t3" value="Satisfied">
                                    <label for="t3_2">Satisfied</label>
                                    <span></span>
                                </div>
                            </li>
                            <li class="list-inline-item">
                                <div class="chiller_cb form-check-inline align-items-center"><br />
                                    <input id="t3_3" type="radio" v-model="t3" value="Dissatisfied">
                                    <label for="t3_3">Dissatisfied</label>
                                    <span></span>
                                </div>
                            </li>
                            <li class="list-inline-item">
                                <div class="chiller_cb form-check-inline align-items-center"><br />
                                    <input id="t3_4" type="radio" v-model="t3" value="Very Dissatisfied">
                                    <label for="t3_4">Very Dissatisfied</label>
                                    <span></span>
                                </div>
                            </li>
                        </ul>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="col-sm-1">7.</dt>
                    <dd class="col-sm-11">How helpful did you find our Staff?
                        <ul class="list-unstyled">
                            <li class="list-inline-item">
                                <div class="chiller_cb form-check-inline align-items-center"><br />
                                    <input id="t4_1" type="radio" v-model="t4" value="Excellent">
                                    <label for="t4_1">Excellent</label>
                                    <span></span>
                                </div>
                            </li>
                            <li class="list-inline-item">
                                <div class="chiller_cb form-check-inline align-items-center"><br />
                                    <input id="t4_2" type="radio" v-model="t4" value="Very Good">
                                    <label for="t4_2">Very Good</label>
                                    <span></span>
                                </div>
                            </li>
                            <li class="list-inline-item">
                                <div class="chiller_cb form-check-inline align-items-center"><br />
                                    <input id="t4_3" type="radio" v-model="t4" value="Good">
                                    <label for="t4_3">Good</label>
                                    <span></span>
                                </div>
                            </li>
                            <li class="list-inline-item">
                                <div class="chiller_cb form-check-inline align-items-center"><br />
                                    <input id="t4_4" type="radio" v-model="t4" value="Fair">
                                    <label for="t4_4">Fair</label>
                                    <span></span>
                                </div>
                            </li>
                            <li class="list-inline-item">
                                <div class="chiller_cb form-check-inline align-items-center"><br />
                                    <input id="t4_5" type="radio" v-model="t4" value="Bad">
                                    <label for="t4_5">Bad</label>
                                    <span></span>
                                </div>
                            </li>
                        </ul>
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
                    <dd class="col-sm-11">How satisfied are you with the effectiveness of the process flow of the online registration system?
                        <ul class="list-unstyled">
                            <li class="list-inline-item">
                                <div class="chiller_cb form-check-inline align-items-center"><br />
                                    <input id="oe1_1" type="radio" v-model="oe1" value="Excellent">
                                    <label for="oe1_1">Excellent</label>
                                    <span></span>
                                </div>
                            </li>
                            <li class="list-inline-item">
                                <div class="chiller_cb form-check-inline align-items-center"><br />
                                    <input id="oe1_2" type="radio" v-model="oe1" value="Very Good">
                                    <label for="oe1_2">Very Good</label>
                                    <span></span>
                                </div>
                            </li>
                            <li class="list-inline-item">
                                <div class="chiller_cb form-check-inline align-items-center"><br />
                                    <input id="oe1_3" type="radio" v-model="oe1" value="Good">
                                    <label for="oe1_3">Good</label>
                                    <span></span>
                                </div>
                            </li>
                            <li class="list-inline-item">
                                <div class="chiller_cb form-check-inline align-items-center"><br />
                                    <input id="oe1_4" type="radio" v-model="oe1" value="Fair">
                                    <label for="oe1_4">Fair</label>
                                    <span></span>
                                </div>
                            </li>
                            <li class="list-inline-item">
                                <div class="chiller_cb form-check-inline align-items-center"><br />
                                    <input id="oe1_5" type="radio" v-model="oe1" value="Bad">
                                    <label for="oe1_5">Bad</label>
                                    <span></span>
                                </div>
                            </li>
                        </ul>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="col-sm-1">9.</dt>
                    <dd class="col-sm-11">How would you rate the e-stamping interface on the CRP?
                        <ul class="list-unstyled">
                            <li class="list-inline-item">
                                <div class="chiller_cb form-check-inline align-items-center"><br />
                                    <input id="oe2_1" type="radio" v-model="oe2" value="Excellent">
                                    <label for="oe2_1">Excellent</label>
                                    <span></span>
                                </div>
                            </li>
                            <li class="list-inline-item">
                                <div class="chiller_cb form-check-inline align-items-center"><br />
                                    <input id="oe2_2" type="radio" v-model="oe2" value="Very Good">
                                    <label for="oe2_2">Very Good</label>
                                    <span></span>
                                </div>
                            </li>
                            <li class="list-inline-item">
                                <div class="chiller_cb form-check-inline align-items-center"><br />
                                    <input id="oe2_3" type="radio" v-model="oe2" value="Good">
                                    <label for="oe2_3">Good</label>
                                    <span></span>
                                </div>
                            </li>
                            <li class="list-inline-item">
                                <div class="chiller_cb form-check-inline align-items-center"><br />
                                    <input id="oe2_4" type="radio" v-model="oe2" value="Fair">
                                    <label for="oe2_4">Fair</label>
                                    <span></span>
                                </div>
                            </li>
                            <li class="list-inline-item">
                                <div class="chiller_cb form-check-inline align-items-center"><br />
                                    <input id="oe2_5" type="radio" v-model="oe2" value="Bad">
                                    <label for="oe2_5">Bad</label>
                                    <span></span>
                                </div>
                            </li>
                        </ul>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="col-sm-1">10.</dt>
                    <dd class="col-sm-11">How satisfied are you with the Remita payment platform on the CRP?
                        <ul class="list-unstyled">
                            <li class="list-inline-item">
                                <div class="chiller_cb form-check-inline align-items-center"><br />
                                    <input id="oe3_1" type="radio" v-model="oe3" value="Very Satisfied">
                                    <label for="oe3_1">Very Satisfied</label>
                                    <span></span>
                                </div>
                            </li>
                            <li class="list-inline-item">
                                <div class="chiller_cb form-check-inline align-items-center"><br />
                                    <input id="oe3_2" type="radio" v-model="oe3" value="Satisfied">
                                    <label for="oe3_2">Satisfied</label>
                                    <span></span>
                                </div>
                            </li>
                            <li class="list-inline-item">
                                <div class="chiller_cb form-check-inline align-items-center"><br />
                                    <input id="oe3_3" type="radio" v-model="oe3" value="Dissatisfied">
                                    <label for="oe3_3">Dissatisfied</label>
                                    <span></span>
                                </div>
                            </li>
                            <li class="list-inline-item">
                                <div class="chiller_cb form-check-inline align-items-center"><br />
                                    <input id="oe3_4" type="radio" v-model="oe3" value="Very Dissatisfied">
                                    <label for="oe3_4">Very Dissatisfied</label>
                                    <span></span>
                                </div>
                            </li>
                        </ul>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="col-sm-1">11.</dt>
                    <dd class="col-sm-11">What are the most common challenges you usually encounter?
                        <ul class="list-unstyled">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <textarea class="form-control _textarea" ref="challenges"  name="challenges" 
                                                maxlength="1000" placeholder="Please comment here..." rows="5" required></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </ul>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="col-sm-1">12.</dt>
                    <dd class="col-sm-11">What changes would you like us to make in our services to you?
                        <ul class="list-unstyled">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <textarea class="form-control _textarea" ref="changes"  name="changes" 
                                                maxlength="1000" placeholder='Please comment here...' rows="5" required></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </ul>
                    </dd>
                </dl>
            </div>
        </div>
        
        <div class="col-2">
            
        </div>
    </div>
    
    <div class="row">
        <div class="col-4">
        </div>
        <div class="col-4">
            <div class="form-group">
                <div class="d-grid gap-2">
                    <button type="button" v-on:click="SaveFeedback" class="btn shadow-sm btn-success rounded-0" id="btn_submit">
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
  </form>
          </div>
</template>

<script>
import http from "./../http-common.js";
import NavBar from './NavBar.vue';

export default {
    name: 'app',
    data() {
        return{
            header: "CUSTOMER SATISFACTION SURVEY FORM",
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
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
            loader: null,
            counter: null
        }
    },
    components:{
        NavBar
    },
    created(){
        http.get("/total-today")
        .then(response =>{
            console.log(response)
        })
        .catch()
    },
    methods:{
        OnModalHide(){
            location.reload();
        },
        fortmatResponse(res) {
            return JSON.stringify(res, null, 2);
        },
        SaveFeedback(){
            //Here, preparing for data to be posted via Axios Post
            this.loader = '<center><img src="images/cac_spinner.gif" width="100" height="100"/></center>';
            this.counter = null;
            let element = this.$refs.Modal;
            $(element).modal('show');
            let res = null;
            var postData = {
                "respondent": this.$refs.respondent.value,
                "profession": this.$refs.profession.value,
                "accreditation": this.$refs.accreditation.value,
                "service_delivery1": this.sd1,
                "service_delivery2": this.sd2,
                "quality": this.q,
                "timeliness1": this.t1,
                "timeliness2": this.t2,
                "timeliness3": this.t3,
                "timeliness4": this.t4,
                "online_environment1": this.oe1,
                "online_environment2": this.oe2,
                "online_environment3": this.oe3,
                "challenges": this.$refs.challenges.value,
                "changes": this.$refs.changes.value,
            };
            setTimeout(() => { 
                try{
                    res = http.post("/savefeedback", postData)
                    .then(response =>{
                        if(response.data[1] == "Successful"){
                            this.loader='<div class="alert alert-success text-justify">	<strong>Dear ' + 
                            this.$refs.respondent.value + ', </strong><i> Thank you for completing and submitting this form.' + 
                            ' Please take note that your feedback is of utmost importance to the CAC in making decision with' + 
                            ' respect to improving service delivery to our Clients.</i></div>';
                            this.counter='<label align="left" class="text-secondary">Your feedback index is <b class="text-warning">' +response.data[0]+ '</b></label>';
                        }
                        else{
                            this.loader='<div class="alert alert-danger text-justify">	<strong>Dear ' + 
                            this.$refs.respondent.value + ', </strong><i> We seem to be experiencing some snag, ' + 
                            ' as your feeback has not been captured on our Database due to server or network issue.' + 
                            ' Please bear with us and try again. Many thanks.</i></div>';
                        }
                    })
                }catch(err){    
                    console.log(err)
                } 
            }, 3000);
        }
    },
    mounted(){
        $(this.$refs.Modal).on("hidden.bs.modal", this.OnModalHide)
    }
}
</script> 