import axios from "../../../axios/index.js"
import store from "../../../../store/store.js"

// Token Refresh
let isAlreadyFetchingAccessToken = false
let subscribers = []

function onAccessTokenFetched(access_token) {
    subscribers = subscribers.filter(callback => callback(access_token))
}

function addSubscriber(callback) {
    subscribers.push(callback)
}

export default {
    // init() {
    //     axios.interceptors.response.use(function (response) {
    //         return response
    //     }, function (error) {
    //         // const { config, response: { status } } = error
    //         const {
    //             config,
    //             response
    //         } = error
    //         const originalRequest = config

    //         // if (status === 401) {
    //         if (response && response.status === 401) {
    //             if (!isAlreadyFetchingAccessToken) {
    //                 isAlreadyFetchingAccessToken = true
    //                 store.dispatch("auth/fetchAccessToken")
    //                     .then((access_token) => {
    //                         isAlreadyFetchingAccessToken = false
    //                         onAccessTokenFetched(access_token)
    //                     })
    //             }

    //             const retryOriginalRequest = new Promise((resolve) => {
    //                 addSubscriber(access_token => {
    //                     originalRequest.headers.Authorization = 'Bearer ' + access_token
    //                     resolve(axios(originalRequest))
    //                 })
    //             })
    //             return retryOriginalRequest
    //         }
    //         return Promise.reject(error)
    //     })
    // },
    login(email, pwd) {
        return axios.post("/api/login", {
            email: email,
            password: pwd
        })
    },
    registerUser(name, last_name, email, phone, password, password_confirmation, country_id, gender, fax) {
        return axios.post("/api/register", {
            name, 
            last_name, 
            email,
            phone,
            password, 
            password_confirmation, 
            country_id,
            gender,
            fax
        });
    },
    refreshToken() {
        return axios.post("/api/auth/refresh-token", {
            accessToken: localStorage.getItem("accessToKen")
        })
    },
    logout() {
        return axios.post("/api/logout")
    },
    passwordReset(email) {
        return axios.post("/api/password/email", { email })
    },
    reset(email, pwd, conf_pwd) {
        window.console.log("Reset: ", email, pwd, conf_pwd);
        return axios.post("/api/password/reset", { 
            email, 
            password                : pwd, 
            password_confirmation   : conf_pwd,
            // token:                  "awdawdawdawdawda"
        })
    }
}
