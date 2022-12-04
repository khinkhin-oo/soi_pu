import authorize from '../../authorize';

export default {
    actions: {
        logout({ commit, state, rootState }) {
            return new Promise((resolve, reject) => {
                authorize('api/user/logout').then(res => {
                    if (res.data.response == 'logout') {
                        commit('removeAuthorize', '', { root: true })
                        commit('globalMessage', 'Good Bye', { root: true })
                        resolve();
                    } else reject('Unauthorize');
                })
            })
        }
    }
}