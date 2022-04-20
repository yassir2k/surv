<template>
      <nav class="navbar  bg-success sizer justify-content-center">

  	<div class="btn-group ">
    	<button type="button" class="btn btn-sm btn-success btn-block active"><i class="fa fa-home"></i>
            <router-link class="lo text-white" to="dashboard">Dashboard</router-link>
		</button>
    </div>

    <span class="v-divider"></span>
	
	<div class="btn-group d-flex">
    	<button type="button" class="btn btn-sm btn-success btn-block dropdown-toggle" data-bs-toggle="dropdown">
		<!-- <i class="fas fa-file-signature"></i> --> <i class="fas fa-comments"></i>	Feedbacks</button>
    <div class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu" style="font-size:14px">
        <div class="dropdown-submenu">
      	    <a class="dropdown-item text-success" href=""><i class="fas fa-calendar-day "></i>	Today</a>
            <!-- Submenu For Dropdown-->
                <div class="dropdown-menu" style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:14px">
                    <router-link class="dropdown-item green" :to="{ name: 'TodaysRecords'}"><i class="fas fa-clipboard-list"></i> Total Feedback</router-link>
					<div class="dropdown-divider"></div>
                    <router-link class="dropdown-item green" :to="{ name: 'TodaysRecordsAccreditedUsers'}"><i class="fas fa-user-tag"></i> From Accredited Users</router-link>
					<div class="dropdown-divider"></div>
                    <router-link class="dropdown-item green" :to="{ name: 'TodaysRecordsPublicUsers'}"><i class="fas fa-users"></i> From Public Users</router-link>
                  </div>
            <!-- End of Submeny For Dropdown-->
        </div>
		<div class="dropdown-divider"></div>

        <div class="dropdown-submenu">
            <a class="dropdown-item text-success" href="#"><i class="fas fa-calendar-alt "></i>	Select a Date</a>
            <!-- Submenu For Dropdown-->
                <div class="dropdown-menu" style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:14px">
                    <router-link class="dropdown-item green" :to="{ name: 'TotalRecordsWithDate'}"><i class="fas fa-clipboard-list"></i> For Total Feedback</router-link>
                    <div class="dropdown-divider"></div>
                    <router-link class="dropdown-item green" :to="{ name: 'AccreditedUsersRecordsWithDate'}"><i class="fas fa-user-tag"></i> For Feedbacks From Accredited Users</router-link>
                    <div class="dropdown-divider"></div>
                    <router-link class="dropdown-item green" :to="{ name: 'TotalRecordsWithDate'}"><i class="fas fa-users"></i> For Total Feedback</router-link>
                </div>
            <!-- End of Submeny For Dropdown-->
        </div>
        <div class="dropdown-divider"></div>

        <div class="dropdown-submenu">
            <a class="dropdown-item text-success" href="#"><i class="fas fa-calendar-week "></i>	Select a Date Range</a>
            <!-- Submenu For Dropdown-->
                <div class="dropdown-menu" style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:14px">
                    <router-link class="dropdown-item green" :to="{ name: 'TotalRecordsWithDateRange'}"><i class="fas fa-clipboard-list"></i> For Total Feedback</router-link>
                    <div class="dropdown-divider"></div>
                    <router-link class="dropdown-item green" :to="{ name: 'AccreditedUsersRecordsWithDateRange'}"><i class="fas fa-user-tag"></i> For Feedbacks From Accredited Users</router-link>
                    <div class="dropdown-divider"></div>
                    <router-link class="dropdown-item green" :to="{ name: 'PublicUsersRecordsWithDateRange'}"><i class="fas fa-users"></i> For Feedbacks From Public Users</router-link>
                </div>
            <!-- End of Submeny For Dropdown-->
        </div>
        <div class="dropdown-divider"></div>
            <div class="dropdown-submenu">
                <a class="dropdown-item text-success" href="#"><i class="fas fa-history "></i>	From Beginning (Absolute)</a>
                <!-- Submenu For Dropdown-->
                <div class="dropdown-menu" style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:14px">
                    <router-link class="dropdown-item green" :to="{ name: 'AbsoluteRecords'}"><i class="fas fa-clipboard-list"></i> For Total Feedback</router-link>
                    <div class="dropdown-divider"></div>
                    <router-link class="dropdown-item green" :to="{ name: 'AbsoluteRecordsAccreditedUsers'}"><i class="fas fa-user-tag"></i> For Feedbacks From Accredited Users</router-link>
                    <div class="dropdown-divider"></div>
                    <router-link class="dropdown-item green" :to="{ name: 'AbsoluteRecordsPublicUsers'}"><i class="fas fa-clipboard-list"></i> For Feedbacks From Public Users</router-link>
                </div>
            <!-- End of Submeny For Dropdown-->
            </div>
      </div>
    </div>
	<div class="v-divider"></div>
	
    <div class="btn-group">
        <button type="button" class="btn btn-sm btn-success btn-block"><i class="fas fa-chart-bar"></i>
            <router-link class="lo text-white" :to="{ name: 'Statistics'}">Business Intelligence Report</router-link>
		</button>
    </div>

	<div class="v-divider"></div>
	
	<div class="btn-group d-flex">
    	<button type="button" class="btn btn-sm btn-success btn-block dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-user-cog"></i>	
            User Settings
        </button>
        <div class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" style="font-size:14px">
            <router-link class="dropdown-item lo text-success" :to="{ name: 'ChangeUserPassword'}"><i class="fas fa-unlock-alt "></i> Change User Password</router-link>
        </div>
    </div>
	
    <div class="v-divider"></div>

    <form class="form-inline my-2 my-lg-0 ">
           <div class="input-group">                    
                    <input type="text" class="form-control" placeholder="Search" required>
                    <div class="input-group-append">
                        <button type="button" class="btn btn-outline-light btn-block"><i class="fa fa-search"></i></button>
                    </div>
           </div>
    </form>
    <div class="v-divider"></div>
    <div class="btn-group d-flex">
    	<button type="button" class="btn btn-success btn-sm btn-block" v-on:click="Logout"><i class="fas fa-sign-out-alt"></i>
			Logout
		</button>
    </div>

   </nav>
</template>
<script>
export default {
    methods:{
        Logout(){
            this.$session.destroy();
            this.$router.push('/admin');
        }
    }
}
</script>
<style>
.sizer{
    font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; 
    font-size:10px;
}
.green{
    color: #8FBC8F
}
.green2{
    color: #28B463
}
</style>
