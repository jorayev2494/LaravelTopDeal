import axios from '../../src/axios.js'
import router from '../../router/router.js'

/**
 * User Register
 * @param {*} param0 
 * @param {*} payload 
 */
export async function USER_REGISTER({ commit }, payload) {
    await axios.post('/api/auth/register', { ...payload }).then((response) => {
        if (response.data.message == 'user_successful_registered') {
            router.push({ name: 'login' });
            // Notification
            window.app.$notify({
                group: 'auth',
                type: 'success',
                title: 'Auth',
                text: response.data.message,
            });
        } else {
            window.alert(response.data.message);
            // Notification
            window.app.$notify({
                group: 'auth',
                type: 'success',
                title: 'Auth',
                text: response.data.message,
            });
        }
    }).catch((err) => {});
}

/**
 * User Login
 * @param {*} param0 
 * @param {*} payload 
 */
export async function USER_LOGIN({ commit }, payload) {
    console.log('Payload', payload, { ...payload });
    await axios.post('/api/auth/login', { ...payload }).then((response) => {
        if (response.data.status == 200) {
            commit('SET_BEARER', response.data);
            router.push({ name: 'cabinet' });

            // Notification
            window.app.$notify({
                group: 'auth',
                type: 'success',
                title: 'Auth',
                text: 'Success full logined!',
            });
        } else {
            // Notification
            window.app.$notify({
                group: 'auth',
                type: 'success',
                title: 'Auth',
                text: 'Success full logined!',
            });
        }
    }).catch((err) => {

        // Notification
        window.app.$notify({
            group: 'auth',
            type: 'error',
            title: 'Error',
            text: 'Incorrect Email or Password!',
        });

    });
}

/**
 * User Logout
 * @param {*} param0 
 * @param {*} payload 
 */
export async function USER_LOGOUT({ commit }, payload) {
    await axios.post('/api/auth/logout').then((response) => {
        if (response.data.status == 200) {
            commit('SET_REMOVE_BEARER', null);
            router.push({ name: 'login' });

            // Notification
            window.app.$notify({
                group: 'auth',
                type: 'success',
                title: 'Auth',
                text: response.data.message,
            });
        } else {
            // Notification
            window.app.$notify({
                group: 'auth',
                type: 'success',
                title: 'Auth',
                text: response.data.message,
            });
        }
    }).catch((err) => {});
}

/**
 * User Send Reset Link Email
 * @param {*} param0 
 * @param {*} payload 
 */
export async function USER_RESET_LINK({ commit, dispatch }, payload) {
    await axios.post('/api/auth/reset_password', { ...payload }).then((response) => {
        if (response.data.status == 200) {
            commit('SET_REMOVE_BEARER', null);
            router.push({ name: 'login' });
            // Notification
            window.app.$notify({
                group: 'auth',
                type: 'success',
                title: 'Auth',
                text: response.data.message,
            });
        } else {
            window.alert(response.data.message);
            // Notification
            window.app.$notify({
                group: 'auth',
                type: 'success',
                title: 'Auth',
                text: response.data.message,
            });
        }
    }).catch(() => {});
}

/**
 * User Change Password
 * @param {*} param0 
 * @param {*} payload 
 */
export async function USER_CHANGE_PASSWORD({ commit, dispatch }, payload) {
    await axios.put('/api/auth/change_password', { ...payload }).then((response) => {
        if (response.data.message == 'password_changed') {
            commit('SET_REMOVE_BEARER', null);
            router.push({ name: 'login' });
            // Notification
            window.app.$notify({
                group: 'auth',
                type: 'success',
                title: 'Auth',
                text: response.data.message,
            });
        } else {
            window.alert(response.data.message);
            // Notification
            window.app.$notify({
                group: 'auth',
                type: 'success',
                title: 'Auth',
                text: response.data.message,
            });
        }
    }).catch(() => {});
}