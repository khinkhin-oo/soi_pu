import authorize from '../../authorize';
export default {
    actions: {
        gettingAuthUser({ commit, state, rootState }) {
            // console.log("Checking User");
            if (!rootState.auth) return;

            return new Promise((resolve, reject) => {
                authorize('api/user')
                    .then(res => resolve(res.data ? rootState.authUser = res.data : rootState.authUser = null))
                    .catch(err => reject(rootState.authUser = null))
            })
        }
    }
}