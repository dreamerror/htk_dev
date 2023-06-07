import Vue from 'vue'
import Vuex from 'vuex'

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
})
