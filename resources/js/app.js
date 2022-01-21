/*import { createApp } from 'vue'

import Survey from './components/Survey.vue';
createApp(Survey).mount("#SurveyForm");
import Login from './components/Login.vue';
createApp(Login).mount("#LoginForm");
import Dashboard from './components/Dashboard.vue';
createApp(Dashboard).mount("#Dashboard");
import TotalToday from './components/Totaltoday.vue';
createApp(TotalToday).mount("#TotalToday");
import Absolutetotal from './components/Absolutetotal.vue';
createApp(Absolutetotal).mount("#AbsoluteTotal");*/


import Vue from 'vue';
import VueRouter from 'vue-router'
import router from './router';

Vue.use(VueRouter);

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default)
Vue.component('Survey', require('./components/Survey.vue').default);
Vue.component('Login', require('./components/Login.vue').default);
Vue.component('Dashboard', require('./components/Dashboard.vue').default);
Vue.component('Absolutetotal', require('./components/Absolutetotal.vue').default);


const app = new Vue({
    el: '#app',
    router: router,
});
