import Vue from 'vue';
import VueRouter from 'vue-router';
import Dashboard from "../components/Dashboard.vue";
import Login from "../components/Login.vue";
import Absolute from "../components/Absoluterecords.vue";
import Trwdr from "../components/Trwdr.vue";
Vue.use(VueRouter);
    const routes = [
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
        },
        {
          path: "/admin/",
          name: "absolute-records",
          component: Absolute,
        },
    ];
    
    export default new VueRouter({
      routes,
      mode: 'history'
  })
  