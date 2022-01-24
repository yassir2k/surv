import Vue from 'vue';
import VueRouter from 'vue-router';
import Dashboard from "../components/Dashboard.vue";
import Login from "../components/Login.vue";
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
        }
    ];
    
    export default new VueRouter({
      routes,
      mode: 'history'
  })
  