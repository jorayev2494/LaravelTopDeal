import axios from 'axios'

export default {
    /**
     * Load Countries from Server
     * @param {*} param0 
     * @param {*} payload 
     */
    async fetchCountries({ commit }, payload) {
        await axios.get("/api/countries").then((response) => {
            commit("SET_COUNTRIES", response.data);
        }).catch((err) => { });
    }

}