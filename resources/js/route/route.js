import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router);


const router = new Router({
    mode: "history",
    routes: [
        {
            path: "/register",
            name: "register",
            component: require("../components/templates/auth/RegisterComponent.vue").default,   // () => import('../components/ExampleComponent.vue'),
        },
        {
            path: "/login",
            name: "login",
            component: require("../components/templates/auth/LoginComponent.vue").default,   // () => import('../components/ExampleComponent.vue'),
        }
    ]
})

export default router;