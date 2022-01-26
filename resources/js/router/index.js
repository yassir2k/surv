import Vue from 'vue';
import VueRouter from 'vue-router';
import Dashboard from "../components/Dashboard.vue";
import Login from "../components/Login.vue";
import Absolute from "../components/Absolutetotal.vue";
import Today from "../components/Totaltoday.vue";
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
          name: "total-today",
          component: Today,
        },
        {
          path: "/admin/",
          name: "absolute-total",
          component: Absolute,
        },
    ];
    
    export default new VueRouter({
      routes,
      mode: 'history'
  })
  