import axios from '../../src/axios.js'

export async function ACTION_LOAD_COUNTRIES({ commit }, payload) {
    return await axios.get('/api/countries').then((response) => {
        commit('SET_COUNTRIES', response.data.data);
        // return response.data.data;
    }).catch(() => { });
}