import axios from '../../src/axios.js'
// import axios from 'axios'

export async function ACTION_LOAD_CATEGORIES({ commit }, payload) {
    await axios.get('/api/categories').then((response) => {
        console.log("Categories Load: ", response.data.data.categories);
    }).catch(err => {
        
    });
}