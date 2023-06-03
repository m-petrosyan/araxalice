import {getRequest, postRequest, putRequest} from "@/store/api";

export default {
    state: {
        auth: null,
        authError: null,
    },
    getters: {
        getAuth: state => state.auth,
        getAuthError: state => state.authError,
    },
    mutations: {
        setToken(state, data) {
            sessionStorage.setItem('token', data)
        },
        setAuthError(state, data) {
            state.authError = data
        },
        setAuth(state, data) {
            state.auth = data
        },
    },
    actions: {
        signIn({commit}, data) {
            return postRequest('/oauth/token', {
                username: data.username,
                password: data.password,
                grant_type: 'password',
                client_id: import.meta.env.VITE_APP_CLIENT_ID,
                client_secret: import.meta.env.VITE_APP_CLIENT_SECRET
            })
                .then(response => commit("setToken", response.access_token))
                .catch(error => {
                    commit('setAuthError', error.message)
                    return Promise.reject(error)
                });
        },
        auth({commit}) {
            return getRequest('/user', '')
                .then(response => commit("setAuth", response.data))
                .catch(error => {
                    sessionStorage.removeItem('token')
                    return Promise.reject(error)
                })
        },
        updateAuth({commit}, data) {
            return putRequest(`/user`, data, commit)
                .catch(error => {
                    commit('setAuthError', error.message)
                    return Promise.reject(error)
                });
        },
    },
}