import Vue from 'vue';
import VueRouter from 'vue-router';
import App from './components/App.vue';
import routes from './router';
import VueSession from 'vue-session';
Vue.use(VueSession);

Vue.use(VueRouter);



Vue.component('App', require('./components/App.vue').default);


 const app = new Vue({
    el: '#app',
    router: routes,
    render: h => h(App)
  })

