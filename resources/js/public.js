require("./bootstrap.js");

import Vue from 'vue';
import store from './store/store.js'
import router from './router/router.js';
import Notifications from 'vue-notification'

Vue.use(Notifications);
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

window.app = app;

window.app.$notify({
    group: 'start-notification',
    type: 'success',
    title: 'Start title!',
    text: 'This is start text text text!',
});
