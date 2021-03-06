/*=========================================================================================
  File Name: moduleAuthActions.js
  Description: Auth Module Actions
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

import jwt from "../../http/requests/auth/jwt/index.js"
import airlock from "../../http/requests/auth/airlock/index.js"



import firebase from 'firebase/app'
import 'firebase/auth'
import router from '@/router'

export default {
    // loginAttempt({ dispatch }, payload) {

    //     // New payload for login action
    //     const newPayload = {
    //         userDetails: payload.userDetails,
    //         notify: payload.notify,
    //         closeAnimation: payload.closeAnimation
    //     }

    //     // If remember_me is enabled change firebase Persistence
    //     if (!payload.checkbox_remember_me) {
    //         // Change firebase Persistence
    //         firebase.auth().setPersistence(firebase.auth.Auth.Persistence.SESSION)

    //             // If success try to login
    //             .then(function() {
    //                 dispatch('login', newPayload)
    //             })

    //             // If error notify
    //             .catch(function(err) {

    //                 // Close animation if passed as payload
    //                 if(payload.closeAnimation) payload.closeAnimation()

    //                 payload.notify({
    //                     time: 2500,
    //                     title: 'Error',
    //                     text: err.message,
    //                     iconPack: 'feather',
    //                     icon: 'icon-alert-circle',
    //                     color: 'danger'
    //                 })
    //             })
    //     } else {
    //         // Try to login
    //         dispatch('login', newPayload)
    //     }
    // },
    login({ commit, state, dispatch }, payload) {

        // If user is already logged in notify and exit
        if (state.isUserLoggedIn()) {
            // Close animation if passed as payload
            if (payload.closeAnimation) payload.closeAnimation()

            payload.notify({
                title: 'Login Attempt',
                text: 'You are already logged in!',
                iconPack: 'feather',
                icon: 'icon-alert-circle',
                color: 'warning'
            })

            return false
        }

        // Try to sigin
        // firebase.auth().signInWithEmailAndPassword(payload.userDetails.email, payload.userDetails.password).then((result) => {

        //         // Set FLAG username update required for updating username
        //         let isUsernameUpdateRequired = false

        //         // if username is provided and updateUsername FLAG is true
        //             // set local username update FLAG to true
        //             // try to update username
        //         if(payload.updateUsername && payload.userDetails.displayName) {

        //             isUsernameUpdateRequired = true

        //             dispatch('updateUsername', {
        //                 user: result.user,
        //                 username: payload.userDetails.displayName,
        //                 notify: payload.notify,
        //                 isReloadRequired: true
        //             })
        //         }

        //         // Close animation if passed as payload
        //         if(payload.closeAnimation) payload.closeAnimation()

        //         // if username update is not required
        //           // just reload the page to get fresh data
        //           // set new user data in localstorage
        //         if(!isUsernameUpdateRequired) {
        //           router.push(router.currentRoute.query.to || '/')
        //           commit('UPDATE_USER_INFO', result.user.providerData[0], {root: true})
        //         }
        //     }, (err) => {

        //     // Close animation if passed as payload
        //     if(payload.closeAnimation) payload.closeAnimation()

        //     payload.notify({
        //         time: 2500,
        //         title: 'Error',
        //         text: err.message,
        //         iconPack: 'feather',
        //         icon: 'icon-alert-circle',
        //         color: 'danger'
        //     })
        // })
    },

    // Google Login
    // loginWithGoogle({commit, state}, payload) {
    //     if (state.isUserLoggedIn()) {
    //         payload.notify({
    //             title: 'Login Attempt',
    //             text: 'You are already logged in!',
    //             iconPack: 'feather',
    //             icon: 'icon-alert-circle',
    //             color: 'warning'
    //         })
    //         return false
    //     }
    //     const provider = new firebase.auth.GoogleAuthProvider()

    //     firebase.auth().signInWithPopup(provider)
    //       .then((result) => {
    //           router.push(router.currentRoute.query.to || '/')
    //           commit('UPDATE_USER_INFO', result.user.providerData[0], {root: true})
    //       }).catch((err) => {
    //           payload.notify({
    //               time: 2500,
    //               title: 'Error',
    //               text: err.message,
    //               iconPack: 'feather',
    //               icon: 'icon-alert-circle',
    //               color: 'danger'
    //           })
    //       })
    // },

    // Facebook Login
    // loginWithFacebook({commit, state}, payload) {
    //     if (state.isUserLoggedIn()) {
    //         payload.notify({
    //             title: 'Login Attempt',
    //             text: 'You are already logged in!',
    //             iconPack: 'feather',
    //             icon: 'icon-alert-circle',
    //             color: 'warning'
    //         })
    //         return false
    //     }
    //     const provider = new firebase.auth.FacebookAuthProvider()

    //     firebase.auth().signInWithPopup(provider)
    //         .then((result) => {
    //             router.push(router.currentRoute.query.to || '/')
    //             commit('UPDATE_USER_INFO', result.user.providerData[0], {root: true})
    //         }).catch((err) => {
    //             payload.notify({
    //                 time: 2500,
    //                 title: 'Error',
    //                 text: err.message,
    //                 iconPack: 'feather',
    //                 icon: 'icon-alert-circle',
    //                 color: 'danger'
    //             })
    //         })
    // },

    // Twitter Login
    // loginWithTwitter({commit, state}, payload) {
    //     if (state.isUserLoggedIn()) {
    //         payload.notify({
    //             title: 'Login Attempt',
    //             text: 'You are already logged in!',
    //             iconPack: 'feather',
    //             icon: 'icon-alert-circle',
    //             color: 'warning'
    //         })
    //         return false
    //     }
    //     const provider = new firebase.auth.TwitterAuthProvider()

    //     firebase.auth().signInWithPopup(provider)
    //         .then((result) => {
    //             router.push(router.currentRoute.query.to || '/')
    //             commit('UPDATE_USER_INFO', result.user.providerData[0], {root: true})
    //         }).catch((err) => {
    //             payload.notify({
    //                 time: 2500,
    //                 title: 'Error',
    //                 text: err.message,
    //                 iconPack: 'feather',
    //                 icon: 'icon-alert-circle',
    //                 color: 'danger'
    //             })
    //         })
    // },

    // Github Login
    // loginWithGithub({commit, state}, payload) {
    //     if (state.isUserLoggedIn()) {
    //         payload.notify({
    //             title: 'Login Attempt',
    //             text: 'You are already logged in!',
    //             iconPack: 'feather',
    //             icon: 'icon-alert-circle',
    //             color: 'warning'
    //         })
    //         return false
    //     }
    //     const provider = new firebase.auth.GithubAuthProvider()

    //     firebase.auth().signInWithPopup(provider)
    //         .then((result) => {
    //             router.push(router.currentRoute.query.to || '/')
    //             commit('UPDATE_USER_INFO', result.user.providerData[0], {root: true})
    //         }).catch((err) => {
    //             payload.notify({
    //                 time: 2500,
    //                 title: 'Error',
    //                 text: err.message,
    //                 iconPack: 'feather',
    //                 icon: 'icon-alert-circle',
    //                 color: 'danger'
    //             })
    //         })
    // },
    // registerUser({dispatch}, payload) {

    //     // create user using firebase
    //     firebase.auth().createUserWithEmailAndPassword(payload.userDetails.email, payload.userDetails.password)
    //         .then(() => {
    //             payload.notify({
    //                 title: 'Account Created',
    //                 text: 'You are successfully registered!',
    //                 iconPack: 'feather',
    //                 icon: 'icon-check',
    //                 color: 'success'
    //             })

    //             const newPayload = {
    //                 userDetails: payload.userDetails,
    //                 notify: payload.notify,
    //                 updateUsername: true
    //             }
    //             dispatch('login', newPayload)
    //         }, (error) => {
    //             payload.notify({
    //                 title: 'Error',
    //                 text: error.message,
    //                 iconPack: 'feather',
    //                 icon: 'icon-alert-circle',
    //                 color: 'danger'
    //             })
    //         })
    // },
    updateUsername({
        commit
    }, payload) {
        payload.user.updateProfile({
            displayName: payload.displayName
        }).then(() => {

            // If username update is success
            // update in localstorage
            let newUserData = Object.assign({}, payload.user.providerData[0])
            newUserData.displayName = payload.displayName
            commit('UPDATE_USER_INFO', newUserData, {
                root: true
            })

            // If reload is required to get fresh data after update
            // Reload current page
            if (payload.isReloadRequired) {
                router.push(router.currentRoute.query.to || '/')
            }
        }).catch((err) => {
            payload.notify({
                time: 8800,
                title: 'Error',
                text: err.message,
                iconPack: 'feather',
                icon: 'icon-alert-circle',
                color: 'danger'
            })
        })
    },


    // JWT
    // loginJWT({commit}, payload) {
    //     return new Promise((resolve, reject) => {
    //         jwt.login(payload.userDetails.email, payload.userDetails.password).then(response => {
    //             // If there's user data in response
    //             if (response.data.data.authData) {
    //                 console.log("Server Response: ", response.data, response.data.data.accessToken);
                    
    //                 // Navigate User to homepage
    //                 router.push(router.currentRoute.query.to || '/')

    //                 // Set accessToken
    //                 localStorage.setItem("accessToken", response.data.data.accessToken)

    //                 // Update user details
    //                 commit('UPDATE_USER_INFO', response.data.data.authData, {
    //                     root: true
    //                 })

    //                 // Set bearer token in axios
    //                 commit("SET_BEARER", response.data.data.accessToken)

    //                 resolve({
    //                     message: "Wrong Email or Password"
    //                 })
    //             } else {
    //                 reject({
    //                     message: "Wrong Email or Password"
    //                 })
    //             }
    //         })
    //         .catch(error => {
    //             reject(error)
    //         })
    //     })
    // },

    loginJWT({commit}, payload) {
        return jwt.login(payload.userDetails.email, payload.userDetails.password);
    },
    
    // Register
    // registerUserJWT({commit}, payload) {
    //     const { first_name, last_name, email, password, confirmPassword, country_id, gender } = payload.userDetails

    //     return new Promise((resolve, reject) => {

    //         // Check confirm password
    //         if (password !== confirmPassword) {
    //             reject({
    //                 message: "Password doesn't match. Please try again."
    //             })
    //         }

    //         jwt.registerUser(first_name, last_name, email, password, confirmPassword, country_id, gender).then(response => {
    //             // Redirect User
    //             router.push(router.currentRoute.query.to || '/')

    //             // Update data in localStorage
    //             localStorage.setItem("accessToken", response.data.accessToken)
    //             commit('UPDATE_USER_INFO', response.data.userData, { root: true })

    //             resolve(response)
    //         })
    //         .catch(error => {
    //             reject(error)
    //         })
    //     })
    // },

    registerUserJWT({commit}, payload) {
        const { first_name, last_name, email, password, confirmPassword, country_id, gender } = payload.userDetails

        return jwt.registerUser(first_name, last_name, email, password, confirmPassword, country_id, gender);   
            // .then(response => {
                // Redirect User
                // router.push(router.currentRoute.query.to || '/')

                // Update data in localStorage
                // localStorage.setItem("accessToken", response.data.accessToken)
                // commit('UPDATE_USER_INFO', response.data.userData, { root: true })
 
                // resolve(response)
            // })
            // .catch(error => {
                // reject(error)
            // })
    },

    // Password Reset
    // resetPasswordJWT({ commit }, payload) {
    //     return new Promise((resolve, reject) => {
    //         jwt.resetPassword(payload).then((response) => {
    //             window.console.log("Response: ", response.data);
    //             resolve("wdawdawd");
    //         }).catch((error) => {
    //             reject(error);
    //         })
    //     })
    // },

    resetPasswordJWT({ commit }, payload) {
        // return new Promise((resolve, reject) => {
            return jwt.resetPassword(payload);
            // .then((response) => {
            //     window.console.log("Response: ", response.data);
            //     resolve("wdawdawd");
            // }).catch((error) => {
            //     reject(error);
            // })
        // });
    },

    // Change Password
    changePasswordJWT({ commit }, payload) {
        return new Promise((resolve, reject) => {
            jwt.changePassword(payload.tkn, payload.email, payload.password, payload.password_confirmation).then((response) => {
                resolve(response.data.message);
            }).catch((error) => {
                console.log('eee', error)
                reject(response.data.errors);
            })
        })
    },

    // logout
    logoutJWT() {
        return jwt.logout();
    },

    // #region My Airlock Auth 

    /**
     * My Register
     * @param {*} param0 
     * @param {*} payload 
     */
    registerUserAirlock({ commit }, payload) {
        const { name, last_name, email, phone, password, password_confirmation, country_id, gender, fax } = payload.userDetails;

        return new Promise((resolve, reject) => {
            // Check confirm password
            if (password !== password_confirmation) {
                reject({
                    message: "Password doesn't match. Please try again."
                })
            }

            airlock.registerUser(name, last_name, email, phone, password, password_confirmation, country_id, gender, fax).then(response => {
                // Redirect User
                console.log("Response Register Airlock: ", response);
                router.push(router.currentRoute.query.to || "/admin");

                // Update data in localStorage
                localStorage.setItem("accessToken", response.data.accessToken)
                // commit('UPDATE_USER_INFO', response.data.userData, {root: true})

                // Set bearer token in axios
                commit("SET_BEARER", response.data.accessToken);
                resolve(response)

            }).catch(error => {
                reject(error)
            })
        });
    },

    // Login
    loginAirlock({ commit }, payload) {
        return new Promise((resolve, reject) => {
            airlock.login(payload.userDetails.email, payload.userDetails.password).then(response => {
                // If there's user data in response
                if (response.data.userData) {
                    // Navigate User to homepage
                    
                    // Set accessToken
                    localStorage.setItem("accessToken", response.data.accessToken);
                    
                    // Update user details
                    commit('UPDATE_USER_INFO', response.data.userData, {
                        root: true
                    });
                    
                    // Set bearer token in axios
                    commit("SET_BEARER", response.data.accessToken);
                    
                    resolve(response)

                    // router.push(router.currentRoute.query.to || '/admin');
                    router.push({ path: '/admin' });

                } else {
                    reject({
                        message: "Wrong Email or Password"
                    });
                }
            }).catch(error => {
                reject(error);
            })
        })
    },
    // Logout
    logoutAirlock({ commit }, payload) {
        // return new Promise((resolve, reject) => {
        //     airlock.logout().then((response) => {
        //         console.log('Success Logoued', response);
        //         if (response.data.message == "logouted") {
        //             // Set bearer token in axios
        //             commit("SET_BEARER", "");

        //             // this.emit(loginEvent, { loggedIn: false });

        //             // Update user details
        //             // commit('UPDATE_USER_INFO', null);

        //             // Remove AccessToken from LocaleStorage
        //             window.localStorage.removeItem('accessToken');

        //             // Remove UserInfo from LocaleStorage
        //             window.localStorage.removeItem('userInfo');

        //             // window.localStorage.clear();

        //             // setTimeout(() => {
        //                 // this.emit(loginEvent, { loggedIn: false });
        //             // }, 0);

        //             // resolve(response.message);
        //         } else {
        //         //     reject({
        //         //         data: response.data,
        //         //         message: "Error logouted"
        //         //     });
        //         }
        //     }).catch((error) => {
        //         reject(error);
        //     });
        // });
    },
    // Password Reset
    passwordResetAirlock({ commit }, payload) {
        return new Promise((resolve, reject) => {
            airlock.passwordReset(payload).then((response) => {
                window.console.log("Response: ", response);
                window.alert(response.data.message.original.message);
                resolve(response.data.message.original.message);
            }).catch((error) => {
                window.console.log("Error: ", error);
                window.alert("Error!");
                reject(error);
            })
        })
    },
    resetAirlock({ commit }, payload) {
        return new Promise((resolve, reject) => {
            airlock.reset(payload.email, payload.password, payload.password_confirmation).then((response) => {
                window.console.log("Response: ", response);
                window.alert(response.data.message.original.message);
                resolve(response.data.message.original.message);
            }).catch((error) => {
                window.console.log("Error: ", error);
                window.alert("Error!");
                reject(error);
            })
        })
    },

    // logOut() {
    //     localStorage.removeItem(localStorageKey);
    //     localStorage.removeItem(tokenExpiryKey);
    //     localStorage.removeItem('userInfo');

    //     idToken = null;
    //     tokenExpiry = null;
    //     profile = null;

    //     webAuth.logout({
    //         returnTo: window.location.origin + process.env.BASE_URL
    //     });

    //     this.emit(loginEvent, { loggedIn: false });
    // }
    // #endregion

    fetchAccessToken() {
        return new Promise((resolve) => {
            jwt.refreshToken().then(response => {
                resolve(response)
            })
        })
    }
}
