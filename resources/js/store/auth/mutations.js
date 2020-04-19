import axios from '../../src/axios.js'

/**
 * Set User Info
 * @param {*} state 
 * @param {*} data 
 */
export function SET_USER_INFO(state, data) {
    window.localStorage.setItem("userInfo", JSON.stringify(data.authData));
}

/**
 * Remove User Info
 * @param {*} state 
 * @param {*} data 
 */
export function SET_REMOVE_USER_INFO(state, data) {
    window.localStorage.removeItem('userInfo');
}

/**
 * Set Bearer Token
 * @param {*} state 
 * @param {*} data 
 */
export function SET_BEARER(state, data) {
    axios.defaults.headers.common['Authorization'] = 'Bearer ' + data.data.accessToken;
    window.localStorage.setItem('accessToken', data.data.accessToken);
    SET_USER_INFO(state, data.data);
    SET_AUTH_CHECK(state, true);
}

/**
 * Remove Bearer Token
 * @param {*} state 
 * @param {*} data 
 */
export function SET_REMOVE_BEARER(state, data) {
    axios.defaults.headers.common['Authorization'] = 'Bearer ' + null;
    window.localStorage.removeItem('accessToken');
    SET_REMOVE_USER_INFO(state, null);
    SET_AUTH_CHECK(state, false);
}

export function SET_AUTH(state, payload) {
    return state.auth = payload;
}

export function SET_AUTH_CHECK(state, payload) {
    return state.auth.check = payload;
}