import cookie from '../../cookie';

export default {
    state() {
        return {
            loginLimit: cookie.getCookie('loginCount') || null,
            loginCount: 1,
            loginError: ''
        }
    },
    getters: {
        loginErrors(state) {
            return state.loginError;
        }
    },
    mutations: {
        loginTimes(state) {
            if (state.loginCount == 5) {
                // console.log("Set Cookie ", state.loginCount);
                state.loginCount = 1;
                cookie.setCookie('loginCount', 'Login Limited', 3 * 60 * 1000);
                state.loginLimit = cookie.getCookie('loginCount');
            }
        },
        loginError(state, res) {
            state.loginCount++;
            if (res) {
                state.loginError = 'Incorrect credentials.';
                res.password ? state.loginError = res.password[0] : '';
                res.email ? state.loginError = res.email[0] : '';
            } else state.loginError = '';
        },
        clearLoginError(state) {
            state.loginError = '';
        }
    },
    actions: {
        login({ state, commit, rootState }, forms) {

            if (state.loginCount < 5) {

                // if users is login too many,We will stop login temporary
                if (cookie.getCookie('loginCount')) {
                    state.loginError = 'Too many login.Try again later.';
                    return null;
                }

                return new Promise((resolve, reject) => {
                    fetch('api/user/login', {
                            method: 'post',
                            headers: {
                                "Accept": 'application/json',
                                "Content-Type": 'application/json',
                                "X-CSRF-Token": document.head.querySelector("[name~=csrf-token][content]").content
                            },
                            credentials: "same-origin",
                            body: JSON.stringify({
                                password: forms.password,
                                email: forms.email
                            })
                        })
                        .then(res => res.json())
                        .then(res => {
                            if (res.response == 'success') {
                                commit('updateAuthorize', res.token, { root: true })
                                resolve();
                            } else reject(commit('loginError', res.errors));
                        })
                        .catch(err => reject(commit('loginError', err.errors)))
                })

            } else {
                if (state.loginCount == 5) commit('loginTimes');
                state.loginCount++;
                state.loginError = 'Too many login.Try again later.';
            }

        }
    }

}