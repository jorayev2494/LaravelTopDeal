/*=========================================================================================
  File Name: moduleCalendarActions.js
  Description: Calendar Module Actions
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

import axios from "@/axios.js"

export default {
    // addItem({ commit }, item) {
    //   return new Promise((resolve, reject) => {
    //     axios.post("/api/data-list/products/", {item: item})
    //       .then((response) => {
    //         commit('ADD_ITEM', Object.assign(item, {id: response.data.id}))
    //         resolve(response)
    //       })
    //       .catch((error) => { reject(error) })
    //   })
    // },

    fetchUsers({commit}) {
        // return new Promise((resolve, reject) => {
        //     axios.get(`/api/user-management/users`).then((response) => {
        //         resolve(response)
        //     })
        //     .catch((error) => {
        //         reject(error)
        //     })
        // })

        return new Promise((resolve, reject) => {
            axios.get("/api/admin/users").then((response) => {
                console.log('Success', response);
                commit('SET_USERS', response.data);
                resolve(response)
            })
            .catch((error) => {
                reject(error)
                console.error('Server Error: ', error);
            });
        })
    },

    fetchUser({}, userId) {
        // axios.get(`/api/admin/users/${userId}`).then((response) => {
        // }).catch((err) => {
        // });

        return new Promise((resolve, reject) => {
            axios.get(`/api/admin/users/${userId}`).then((response) => {
                resolve(response)
            })
            .catch((error) => {
                reject(error)
            })
        });

        // return new Promise((resolve, reject) => {
        //     axios.get(`/api/users/${userId}`).then((response) => {
        //         resolve(response)
        //     })
        //     .catch((error) => {
        //         reject(error)
        //     })
        // })
    },

    /**
     * Update User Account
     * @param {*} param0 
     * @param {*} user 
     */
    accountUpdate({commit}, user) {
        user.update = "account";
        delete user.avatar;
        axios.post(`/api/admin/users/${user.id}`, user).then((response) => {
            console.log("Server Response: ", response);
        }).catch((err) => { });
    },

    /**
     * 
     * @param {Upload User Account with Avatar} param0 
     * @param {*} data 
     */
    accountUpdateFormData({commit}, data) {
        // user.update = "account";
        data.formData.set("update", "account");
        // Config Header ContentType
        var headers = {'Content-Type': 'multipart/form-data' };
        //  Send in Server: FormData
        axios.post(`/api/admin/users/${data.user.id}`, data.formData, headers).then((response) => {
            console.log("Server Response from Form Data: ", response);
        }).catch((err) => { });
    },

    /**
     * Update User Information
     * @param {*} param0 
     * @param {*} user 
     */
    informationUpdate({commit}, user) {
        user.update = "information";
        
        axios.put(`/api/admin/users/${user.id}`, user).then((response) => {
            console.log("User Information Updates: ", response.data);
        }).catch((err) => { });
    },

    /**
     * Update User Social
     * @param {*} param0 
     * @param {*} user 
     */
    socialUpdate({commit}, user) {
        user.update = "social";
        
        axios.put(`/api/admin/users/${user.id}`, user).then((response) => {
            console.log("User Information Social: ", response.data);
        }).catch((err) => { });
    },

    removeRecord({commit}, userId) {
        // return new Promise((resolve, reject) => {
        //     axios.delete(`/api/user-management/users/${userId}`).then((response) => {
        //         commit('REMOVE_RECORD', userId)
        //         resolve(response)
        //     })
        //     .catch((error) => {
        //         reject(error)
        //     })
        // })

        // return new Promise((resolve, reject) => {
            axios.delete(`/api/admin/users/${userId}`).then((response) => {
                commit('REMOVE_RECORD', userId)
            }).catch((error) => { })
        // })
    }
}
