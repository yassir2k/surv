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
                        <h2 style="margin: 5px 0 0; font-size: 30px"><b>Absolute Records</b></h2>
                    </div>
                </div>
            </div>
            <table class="table table-bordered table-striped table-condensed">
                <thead style="background-color: #AAB7B8; color: #F5F5F5; font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif">
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
                        <td><a :data-bs-target="Here" @click="ShowFeedback(user.id)" data-bs-toggle="tooltip" title="View"><i class="fas fa-eye text-secondary"></i></a></td>
                    </tr>
                </tbody>
                <tbody v-else>
                    <tr>
                        <td align="center" colspan="5">No record found.</td>
                    </tr>
                </tbody>
            </table>
            <pagination align="center" :data="users" @pagination-change-page="list"></pagination>
            <br />     
            <br />
            <span :v-model="Here" style="position: inherit"  v-html="LoadView"></span>
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
import NavBar from './FeedbackNav.vue';
export default {
    name:"app",
    data() {
        return {
                users:{
                    type:Object,
                    default: null,
                    LoadView: ''
                }
            }
    },
    props: {
        records: Number,
        perPage: Number
    },
    components:{
        NavBar, pagination
    },
    created(){
        this.list()
        this.$nextTick(function () {
            // Code that will run only after the
            $('[data-bs-toggle="tooltip"]').tooltip();
        })
    },
    methods:{
        list(page=1){
            http.get(`/absolute?page=${page}`).then(({data})=>{
                this.users = data
            }).catch(({ response })=>{
                console.error(response)
            })
        },
        ShowFeedback(ind){
            this.LoadView = '<center><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></center>';
            try{
                load.get('/load-feedback/'+ind).then(response =>{
                    this.LoadView = response.data
                })
            }
            catch(err){
                    console.log(err)
            }
        }
    },
    watch: {
      $route(to, from) {
        this.ShowFeedback();
      }
    }
}
</script>
<style scoped>
    .pagination{
        margin-bottom: 0;
    }
</style>