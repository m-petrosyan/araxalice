import {createStore} from 'vuex'
import user from "@/store/modules/user"
import about from "@/store/modules/about";
import portfolio from "@/store/modules/portfolio";

export default createStore({
    state: {
        task: [1, 2],
    },
    getters: {
        getTask: (state) => state.task
    },
    mutations: {},
    actions: {},
    modules: {
        user,
        about,
        portfolio
    }
})
