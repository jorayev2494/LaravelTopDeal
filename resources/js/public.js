require("./bootstrap.js");

import Vue from 'vue';
import store from './store/store.js'
import router from './router/router.js';
// window.Vue = require("vue");


// #region Includes
Vue.component('header-component', require('./components/includes/partials/HeaderComponent.vue').default);
Vue.component('footer-component', require('./components/includes/partials/FooterComponent.vue').default);
// #endregion



const app = new Vue({
    el: '#application',
    store,
    router,
    // store,
    methods: {
        authCheckComp() {
            return this.$store.getters['auth/GET_AUTH_CHECK'];
        }
    },
    mounted() {
        console.log('Success Started Public Vue');
    },
});     // .$mount('#application');
