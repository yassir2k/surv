import VueRouter from 'vue-router';
import Dashboard from "../components/Dashboard.vue";
    const routes = [
        {
          path: "/admin/dashboard",
          name: "Dashboard",
          component: Dashboard,
        }
    ];
    
    export default new VueRouter({
      routes,
      mode: 'history'
  })
  