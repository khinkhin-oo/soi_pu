export default {
    state() {
        return {
            count: 0
        }
    },
    getters: {
        count(state) {
            return state.count;
        }
    },
    mutations: {
        increment(state) {
            state.count++;
        },
        decrement(state) {
            if (state.count == 0) return null;
            state.count--;
        }
    }
}
