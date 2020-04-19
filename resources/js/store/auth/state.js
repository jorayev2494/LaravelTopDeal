function check() {
    return (Boolean)(window.localStorage.getItem('accessToken') && window.localStorage.getItem('userInfo'));
}

export default {
    auth: {
        check   : check(),
        user    : window.localStorage.getItem('userInfo'),
    }
}

