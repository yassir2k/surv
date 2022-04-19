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
    <center>
        <div class="table-wrapper justify-content-center">
            <div style="padding-bottom: 15px; background: #717D7E; color: #f5f5f5; padding: 20px 30px; margin: -25px -5px 10px; border-radius: 4px 4px 0 0;">
                <div class="row" style="font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif">
                    <div class="col-xs-6">
                        <h2 style="margin: 5px 0 0; font-size: 30px"><b>Absolute Records (For a Given Date)</b></h2>
                    </div>
                </div>
                <br />
                    <div class="row">
                        <div class="col-3">
                        </div>
                        <div class="col-3">
                            <div class = "row">
                                <div class="col-12 align-right">
                                    <strong>&nbsp;</strong>
                                </div>
                            </div>
                            <div class = "row">
                                <div class="col-12 align-left">
                                    <div class="form-group">
                                        <div class="input-group date" data-provide="datepicker">
                                            <span class="input-group-text">
                                                <span class="fa fa-calendar" style="color: #8FBC8F"></span>
                                            </span>                    
                                            <input  ref="date_" type="date" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="row">
                                <div class="col-12">&nbsp;</div>
                            </div>
                            <div class="row">
                                  <div class="col-12 align-right">
                                    <div class="form-group">
                                        <div class="d-grid gap-2">
                                            <button  @click="list()" type="submit"  class="btn text-white shadow-sm rounded-2" style="background-color: #8FBC8F">
                                                Search
                                                <i class="fas fa-search" style="horizontal-align: right;"></i>
                                            </button> 
                                        </div>
                                    </div>
                                  </div>
                            </div>
                        </div>
                        <div class="col-3">
                        </div>
                    </div>
            </div>
            <table class="table table-bordered table-striped table-condensed" v-show="reveal">
                <thead style="background-color: #5F8575; color: #FFFFFF; font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; border: 2px solid #5F8575">
                    <tr>
                        <th>Name</th>
                        <th>Profession</th>
                        <th>Accreditation Number (if any)</th> 
                        <th>Feedback Date</th>
                        <th>Action</th>
                    </tr>  
                </thead> 
                <tbody v-if="(users) && (users.data.length > 0)">
                    <tr v-for="(user,index) in users.data" :key="index" style="font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; color: #34495E">
                        <td>{{ user.name_ }}</td>
                        <td>{{ user.profession_ }}</td>
                        <td>{{ user.accreditation_ }}</td>
                        <td>{{ user.date_ }}</td>
                        <td><a href="#" @click="getRecords(user.id)" data-bs-toggle="tooltip" title="View"><i class="fas fa-eye text-secondary"></i></a></td>
                    </tr>
                </tbody>
                <tbody v-else>
                    <td align="center" colspan="5"><div v-html="ShowHide"></div></td>
                </tbody>
            </table>
            <pagination align="center" :data="users" @pagination-change-page="list"></pagination>
            <br />     
            <br />
            <div id="ll" v-html="LoadView"></div>
        </div>
        <br />
    </center>
    <!-- End of Center -->

</div>
</template>

<script>
import http from "../http-common.js"; 
import load from "../feedback.js"; 
import pagination from 'laravel-vue-pagination'
import NavBar from './navigations/FeedbackNav.vue';
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';
export default {
    name:"app",
    data() {
        return {
                users:{
                    type: Object,
                    default: null,
                },
                LoadView: '',
                ShowHide: '',
                from_: null,
                to_: null,
                reveal: false,
                from: null,
                to: null,
                flag: 0
            }
    },
    props: {
        records: Number,
        perPage: Number,
        length: Number
    },
    components:{
        NavBar, pagination
    },
    created(){
        this.list()
    },
    methods:{
        list(page=0){
            this.LoadView = '';
            if(this.reveal == false && this.flag == 0){
                this.users = null;
            }
            else{
                this.ShowHide = '<i class="fas fa-sync fa-spin" style="color: AAB7B8"></i>';
                var postData = {
                    "date_": this.$refs.date_.value,
                }
                try{http.post(`/feedback-total-a-date?page=${page}`, postData)
                .then(({data})=>{
                    this.users = data
                    this.flag = 1;
                    if(this.users.data.length <= 0){
                        this.ShowHide = "No record(s) found for the selected date.";
                    }
                })
                }
                catch(err){
                    console.error(err)
                }
            }
        },
        getRecords(ind){
            this.LoadView = '<center><i class="fa fa-spinner fa-spin fa-5x fa-fw text-secondary"></i></center>';
            try{
                load.get('/load-feedback/'+ ind).then(response =>{
                    this.LoadView = response.data
                })
            }
            catch(err){
                    console.log(err)
            }
        }
    },
    mounted(){
        this.reveal = true;
    }
}
</script>
<style scoped>
    .pagination{
        margin-bottom: 0;
    }
    .pale-green{
        color: #8FBC8F;
    }
</style>