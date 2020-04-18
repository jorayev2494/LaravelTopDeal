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
    init() {
        axios.interceptors.response.use(function (response) {
            return response
        }, function (error) {
            // const { config, response: { status } } = error
            const {
                config,
                response
            } = error
            const originalRequest = config

            // if (status === 401) {
            if (response && response.status === 401) {
                if (!isAlreadyFetchingAccessToken) {
                    isAlreadyFetchingAccessToken = true
                    store.dispatch("auth/fetchAccessToken")
                        .then((access_token) => {
                            isAlreadyFetchingAccessToken = false
                            onAccessTokenFetched(access_token)
                        })
                }

                const retryOriginalRequest = new Promise((resolve) => {
                    addSubscriber(access_token => {
                        originalRequest.headers.Authorization = 'Bearer ' + access_token
                        resolve(axios(originalRequest))
                    })
                })
                return retryOriginalRequest
            }
            return Promise.reject(error)
        })
    },
    // Login
    login(email, pwd) {
        return axios.post("/api/admin/auth/login", { email: email, password: pwd });
    },
    // Register
    registerUser(first_name, last_name, email, pwd, conPwd, country_id, gender) {
        console.log("Before register datas:", {first_name, last_name, email, pwd, conPwd, country_id, gender});
        
        return axios.post("/api/admin/auth/register", {
            first_name              : first_name,
            last_name               : last_name,
            email                   : email,
            password                : pwd,
            password_confirmation   : conPwd,
            country_id              : country_id,
            gender                  : gender
        })
    },
    // Refresh Token
    refreshToken() {
        return axios.post("/api/auth/refresh-token", {
            accessToken: localStorage.getItem("accessToKen")
        })
    },
    // Reset Password GetResetLink
    resetPassword(email) {
        return axios.post("/api/admin/auth/reset_password", { email })
    },
    // ChangePassword
    changePassword(tkn, email, pwd, conf_pwd) {
        return axios.put("/api/admin/auth/change_password", { 
            tkn                     : tkn,
            email                   : email, 
            password                : pwd, 
            password_confirmation   : conf_pwd,
        })
    },
    // Logout
    logout() {
        return axios.post("/api/admin/auth/logout");
    }
}
