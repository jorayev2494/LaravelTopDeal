import axios from '../../http/http.js'

export async function ACTION_CHANGE_PASSWORD({commit, dispatch, state }, payload) {
    window.console.log('PAYLOAD', payload);
    await axios.put('/api/cabinet/password_change', { ...payload }).then((response) => {
        // window.console.log("Result psw Change: ", response);

        // Notification
        window.app.$notify({
            group:  'cabinet',
            type:   'success',
            title:  'Cabinet',
            text:   response.data.message,
        });
    }).catch((error) => { 
        // window.console.log('Error', error.response)

        // Notification Error
        window.app.$notify({
            group:  'cabinet',
            type:   'error',
            title:  'Cabinet',
            text:   error.response.data.message,
        });
    });
}