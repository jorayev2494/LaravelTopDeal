import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router);

import dd from '../components/templates/cabinet/IndexComponent.vue'


const router = new Router({
    mode: "history",
    routes: [
        {
            path: '/',
            name: 'index',
            component: require("../components/templates/IndexComponent.vue").default,
        },
        {
            path: '/',
            name: 'cabinet',
            redirect: { name: 'cabinet-index' },
            component: require("../components/templates/cabinet/IndexComponent.vue").default,
            children: [
                {
                    path: '/cabinet',
                    name: 'cabinet-index',
                    component: require("../components/templates/cabinet/CabinetComponent.vue").default,
                    // component: require('../components/templates/cabinet/IndexComponent.vue').default,
                    meta: {
                        requireAuth: true,
                    }
                }
            ],
            meta: {
                requireAuth: true,
            }
        },
        {
            path: "/register",
            name: "register",
            component: require("../components/templates/auth/RegisterComponent.vue").default,
            meta: {
                requireGuest: true,
            }
        },
        {
            path: "/login",
            name: "login",
            component: require("../components/templates/auth/LoginComponent.vue").default,
            meta: {
                requireGuest: true,
            }
        },
        {
            path: "/forgot-password",
            name: "forgot-password",
            component: require("../components/templates/auth/ForgotPasswodComponent.vue").default,
            meta: {
                requireGuest: true,
            }
        },
        {
            path: "/password_recovery",
            name: "password-recovery",
            component: require("../components/templates/auth/PasswodRecoveryComponent.vue").default,
            meta: {
                requireGuest: true,
            }
        },
    ]
});

import store from '../store/store.js'

router.beforeEach((to, from, next) => {

    // #region  Authenticated User
    if (store.getters['auth/GET_AUTH_CHECK']) {
        // window.alert(store.getters['auth/GET_AUTH_CHECK']);
        if ( to.name == 'login' ||  to.name == 'register' ||  to.name == 'forgot-password'
            // ||  to.name == "reset-password"
            // ||  to.name == "not-authorized"
        ) {
            return next({ name: 'cabinet' });
        }        
    }
    // #endregion

    // #region Middleware - Auth Required
    if(to.meta.requireAuth) {
        if (!store.getters['auth/GET_AUTH_CHECK']) {
            router.push({ name: 'login' });
        }
    }
    // #endregion

    // #region Middleware - Guest Required
    if(to.meta.requireGuest) {
        if (!store.getters['auth/GET_AUTH_CHECK']) {
            return next();
        }
    }
    // #endregion

    return next();
})

export default router;