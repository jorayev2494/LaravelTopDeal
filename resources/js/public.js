import router from './route/route.js';
import Vue from 'vue';
// window.Vue = require("vue");

require("./bootstrap.js");

// #region Includes
Vue.component('header-component', require('./components/includes/partials/HeaderComponent.vue').default);
Vue.component('footer-component', require('./components/includes/partials/FooterComponent.vue').default);
// #endregion


const app = new Vue({
    el: '#application',
    router,
    // store,
    mounted() {
        console.log('Success Started Public Vue')
    },
});     // .$mount('#application');
