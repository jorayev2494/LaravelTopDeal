window.Vue = require("vue");

require("./bootstrap.js");


// Vue.component('example-component', require('./components/ExampleComponent.vue').default);


const app = new Vue({
    el: '#application',
    // store,
    mounted() {
        console.log('Success Started Public Vue')
    },
});

alert("Uraaa!");