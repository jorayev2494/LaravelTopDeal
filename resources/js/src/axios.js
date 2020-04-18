// axios
import axios from 'axios'

const baseURL = "http://127.0.0.1:8080"

// Header Configs
var headerConfigs = {};
headerConfigs["Accept"] = 'application/json';

if (window.localStorage.getItem('accessToken')) 
    headerConfigs["Authorization"] = 'Bearer ' + window.localStorage.getItem('accessToken');

export default axios.create({
    baseURL,
    headers: headerConfigs,
    // headers: { 
        // 'Accept'        : 'application/json',
        // 'Authorization' : window.localStorage.getItem('accessToken')
    // },
    // axios.defaults.headers.common['Authorization'] = 'Bearer ' + accessToken
    // You can add your headers here
    // axios.defaults.headers.common['Authorization'] = 'Bearer ' + accessToken
}); // .defaults.headers.
