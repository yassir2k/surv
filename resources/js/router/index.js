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
import TotalRecordsWithDate from "../components/Trwd.vue";
import AccreditedUsersRecordsWithDate from "../components/Acrurwd.vue";
import PublicUsersRecordsWithDate from "../components/Purwd.vue";
import TotalRecordsWithDateRange from "../components/Trwdr.vue";
import AccreditedUsersRecordsWithDateRange from "../components/Aurwdr.vue";
import PublicUsersRecordsWithDateRange from "../components/Purwdr.vue";
import ChangeUserPassword from "../components/ChangeUserPassword.vue";


    const routes = [
        {
          path: '*',
          component: NotFound,
        },
        {
          path: "/admin/change-password",
          name: "ChangeUserPassword",
          component: ChangeUserPassword,
        },
        {
          path: "/admin/public-users-records-with-date-range",
          name: "PublicUsersRecordsWithDateRange",
          component: PublicUsersRecordsWithDateRange,
        },
        {
          path: "/admin/accredited-users-records-with-date-range",
          name: "AccreditedUsersRecordsWithDateRange",
          component: AccreditedUsersRecordsWithDateRange,
        },
        {
          path: "/admin/total-records-with-date-range",
          name: "TotalRecordsWithDateRange",
          component: TotalRecordsWithDateRange,
        },
        {
          path: "/admin/public-users-records-with-date",
          name: "PublicUsersRecordsWithDate",
          component: PublicUsersRecordsWithDate,
        },
        {
          path: "/admin/accredited-users-records-with-date",
          name: "AccreditedUsersRecordsWithDate",
          component: AccreditedUsersRecordsWithDate,
        },
        {
          path: "/admin/total-records-with-date",
          name: "TotalRecordsWithDate",
          component: TotalRecordsWithDate,
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
  