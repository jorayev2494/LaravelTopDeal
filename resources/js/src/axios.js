// axios
import axios from 'axios'

const domain = "http://127.0.0.1:8080"

export default axios.create({
    domain,
    headers: { 'Accept': 'application/json' },
    // You can add your headers here
    // axios.defaults.headers.common['Authorization'] = 'Bearer ' + accessToken
}); // .defaults.headers.
