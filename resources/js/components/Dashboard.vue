<template>
<div>
    <div class="row">
        <div class="col-sm-12">
            <NavBar /> 
        </div>
    </div>
    <br />
    <div class="row">
        <div class="col-sm-1">
        </div>
        <div class="col-sm-8"> 
            <div class="row">
                <div class="d-grid gap-2 col-12 mx-auto">
                    <hr class="separator"><h6 class="text-success " align="center"><b>Today's Feedback Statistics</b></h6><hr class="separator">
                </div>
            </div>

            <div class="row"><!--Beginning of today's data -->
                <div class="col-sm-4" align="center">
                    <a href="/admin/total-today" style="text-decoration: none; color:inherit">
                        <div class="card bg-white mb-4 shadow-sm" style="width: 14rem; border-radius: 0.5em; border-bottom: 4px solid #50C878">
                            <div class="card-body">
                                <h1 class="card-title"><span v-html="total_today"></span></h1>
                                <hr class="separator">
                                <p class="card-text"><b class="font-pref14">TOTAL FEEDBACK RECEIVED</b></p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-4" align="center">
                    <div class="card bg-white mb-4 shadow-sm" style="width: 14rem; border-radius: 0.5em; border-bottom: 4px solid #AFE1AF">
						<div class="card-body">
							<h1 class="card-title"><span v-html="total_today_accredited"></span></h1>
							<hr class="separator">
							<p class="card-text"><b class="font-pref14">FROM ACCREDITED USERS</b></p>
						</div>
					</div>
                </div>
                <div class="col-sm-4" align="center">
                    <div class="card bg-white mb-4 shadow-sm" style="width: 14rem; border-radius: 0.5em; border-bottom: 4px solid #00A36C">
						<div class="card-body">
							<h1 class="card-title"><span v-html="total_today_public"></span></h1>
							<hr class="separator">
							<p class="card-text"><b class="font-pref14">FROM PUBLIC USERS</b></p>
						</div>
					</div>
                </div>
        	</div><!--End of today's data-->
            <br />
            <br />
            <div class="row">
                <div class="d-grid gap-2 col-12 mx-auto">
                    <hr class="separator"><h6 class="text-success " align="center"><b>Absolute Feedback Statistics</b></h6><hr class="separator">
                </div>
            </div>

            <div class="row"><!--Beginning of absolute data -->
                <div class="col-sm-4" align="center">
                    <a href="/admin/absolute-records" style="text-decoration: none; color:inherit">
                        <div class="card bg-white mb-4 shadow-sm" style="width: 14rem; border-radius: 0.5em; border-bottom: 4px solid #93C572">
                            <div class="card-body">
                                <h1 class="card-title"><span v-html="total_absolute"></span></h1>
                                <hr class="separator">
                                <p class="card-text"><b class="font-pref14">TOTAL FEEDBACK RECEIVED</b></p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-4" align="center">
                    <div class="card bg-white mb-4 shadow-sm" style="width: 14rem; border-radius: 0.5em; border-bottom: 4px solid #E39802">
						<div class="card-body">
							<h1 class="card-title"><span v-html="total_absolute_accredited"></span></h1>
							<hr class="separator">
							<p class="card-text"><b class="font-pref14">FROM ACCREDITED USERS</b></p>
						</div>
					</div>
                </div>
                <div class="col-sm-4" align="center">
                    <div class="card bg-white mb-4 shadow-sm" style="width: 14rem; border-radius: 0.5em; border-bottom: 4px solid #B60A1C">
						<div class="card-body">
							<h1 class="card-title"><span v-html="total_absolute_public"></span></h1>
							<hr class="separator">
							<p class="card-text"><b class="font-pref14">FROM PUBLIC USERS</b></p>
						</div>
					</div>
                </div>
        	</div><!--End of today's data-->

        </div>
        <div class="col-sm-3">
        </div>
    </div>
</div>
</template>
<script>
import http from "./../http-common.js";
import NavBar from './DashboardNav.vue';
export default {
    name: 'app',
    data() {
        return{
            total_today: '<i class="fa fa-spinner fa-spin fa-1x fa-fw text-secondary"></i>',
            total_today_accredited: '<i class="fa fa-spinner fa-spin fa-1x fa-fw text-secondary"></i>',
            total_today_public: '<i class="fa fa-spinner fa-spin fa-1x fa-fw text-secondary"></i>',
            total_absolute: '<i class="fa fa-spinner fa-spin fa-1x fa-fw text-secondary"></i>',
            total_absolute_accredited: '<i class="fa fa-spinner fa-spin fa-1x fa-fw text-secondary"></i>',
            total_absolute_public: '<i class="fa fa-spinner fa-spin fa-1x fa-fw text-secondary"></i>' 
        }
    },
    components:{
        NavBar
    },
    created(){
        //Beginning of today's total
        http.get("/total-today")
        .then(response =>{
            this.total_today = '<b style="color: #50c878">'+ response.data +'</b>';
        })
        .catch();

        http.get("/total-accredited-today")
        .then(response =>{
            this.total_today_accredited = '<b style="color: #AFE1AF">'+ response.data +'</b>';
        })
        .catch();

        http.get("/total-public-today")
        .then(response =>{
            this.total_today_public = '<b style="color: #00A36C">'+ response.data +'</b>';
        })
        .catch();

        //Begining of absolute total
        http.get("/total")
        .then(response =>{
            this.total_absolute = '<b style="color: #93C572">'+ response.data +'</b>';
        })
        .catch();

        http.get("/total-accredited")
        .then(response =>{
            this.total_absolute_accredited = '<b style="color: #E39802">'+ response.data +'</b>';
        })
        .catch();

        http.get("/total-public")
        .then(response =>{
            this.total_absolute_public = '<b style="color: #B60A1C">'+ response.data +'</b>';
        })
        .catch();

        http.get("/today")
        .then(response =>{
            console.log(response);
        })
        .catch();
    },
    watch: {
      getFromDB(){
          http.get("/total-today")
            .then(response =>{
                this.total_today = '<b style="color: #50c878">'+ response.data +'</b>';
            })
            .catch();
      }
    }
}
</script>
<style>
</style>