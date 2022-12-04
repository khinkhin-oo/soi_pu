export default {
    state() {
        return {
            registerError: ''
        }
    },
    getters: {
        registerErrors(state) {
            return state.registerError;
        }
    },
    mutations: {
        registerError(state, res) {
            if (res) {
                res.password ? state.registerError = res.password[0] : '';
                res.email ? state.registerError = res.email[0] : '';
                res.username ? state.registerError = res.username[0] : '';
                res.phone ? state.registerError = res.phone[0] : '';
            } else state.registerError = '';
        },
        clearRegisterError(state) {
            state.registerError = '';
        }
    },
    actions: {
        register({ commit, state, Rootstate }, payload) {
            // axios.get('/sanctum/csrf-cookie');
            return new Promise((resolve, reject) => {
                fetch('/api/user/register', {
                        method: 'post',
                        headers: {
                            "Accept": 'application/json',
                            "Content-Type": 'application/json',
                            "X-CSRF-Token": this.CSRFTOKEN
                        },
                        credentials: "same-origin",
                        body: JSON.stringify(payload)
                    })
                    .then(res => res.json())
                    .then(res => {
                        if (res.response == 'success') resolve(commit('globalMessage', 'Your registration is complete.\nTry to log in here.', { root: true }));
                        else reject(commit('registerError', res.errors))
                    })
                    .catch(err => reject(commit('registerError', err.errors)))
            })
        }
    }
}
