import VueRouter from 'vue-router';
import Dashboard from "../components/Dashboard.vue";
import Login from "../components/Login.vue";
import Trwdr from "../components/Trwdr.vue";
import Survey from "../components/Survey.vue";
import NotFound from "../components/NotFound.vue";
import TodaysRecords from "../components/Todaysrecords.vue";
import TodaysRecordsAccreditedUsers from "../components/Trac.vue";
import TodaysRecordsPublicUsers from "../components/Trpu.vue";
import AbsoluteRecords from "../components/Absoluterecords.vue";
import AbsoluteRecordsAccreditedUsers from "../components/Arau.vue";
import AbsoluteRecordsPublicUsers from "../components/Arpu.vue";


    const routes = [
        {
          path: '*',
          component: NotFound,
        },
        {
          path: "/admin/todays-records",
          name: "TodaysRecords",
          component: TodaysRecords,
        },
        {
          path: "/admin/todays-records-accredited-users",
          name: "TodaysRecordsAccreditedUsers",
          component: TodaysRecordsAccreditedUsers,
        },
        {
          path: "/admin/todays-records-public-users",
          name: "TodaysRecordsPublicUsers",
          component: TodaysRecordsPublicUsers,
        },
        {
          path: "/admin/absolute-records",
          name: "AbsoluteRecords",
          component: AbsoluteRecords,
        },
        {
          path: "/admin/absolute-records-accredited-users",
          name: "AbsoluteRecordsAccreditedUsers",
          component: AbsoluteRecordsAccreditedUsers,
        },
        {
          path: "/admin/absolute-records-public-users",
          name: "AbsoluteRecordsPublicUsers",
          component: AbsoluteRecordsPublicUsers,
        },
        {
          path: "/",
          name: "Survey",
          component: Survey,
        },
        {
          path: "/admin/dashboard",
          name: "Dashboard",
          component: Dashboard,
        },
        {
          path: "/admin/",
          name: "Login",
          component: Login,
        },
        {
          path: "/admin/",
          name: "total-records-with-date-range",
          component: Trwdr,
        }
    ];
    
    export default new VueRouter({
      routes,
      mode: 'history'
  })
  