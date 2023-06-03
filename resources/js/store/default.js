import Vue from 'vue'
import Vuex from 'vuex'
import createPersistedState from "vuex-persistedstate"

Vue.use(Vuex);

export const store = new Vuex.Store({
    state () {
        return {
            count: 0,
            lang: 'ru',
        }
    },
    mutations: {
        increment (state) {
            state.count++
        },
        switchLang (state) {
            state.lang = state.lang === 'ru' ? 'cn' : 'ru';
        }
    },
    plugins: [createPersistedState()],
})
