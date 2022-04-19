import Vue from 'vue';
import VueRouter from 'vue-router';
import App from './components/App.vue';
import routes from './router';
import VueSession from 'vue-session';
Vue.use(VueSession);

Vue.use(VueRouter);

 const app = new Vue({
    router: routes,
    render: h => h(App),
    el: '#app'
  });

