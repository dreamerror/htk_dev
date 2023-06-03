import Vue from 'vue'
import Vuex from 'vuex'
import createPersistedState from "vuex-persistedstate"

Vue.use(Vuex);

export const store = new Vuex.Store({
    state () {
        return {
            count: 0,
            lang: () => {
                let val = document.cookie
                    .split('; ')
                    .find((row) => row.startsWith('lang='))
                if (val) {
                    console.log(val.split('=')[1])
                    return val.split('=')[1]
                } else {
                    document.cookie = 'lang=ru'
                    console.log('ru')
                    return 'ru';
                }
            }
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
