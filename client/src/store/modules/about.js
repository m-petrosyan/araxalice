import {getRequest, postRequest} from "@/store/api";

export default {
    state: {
        about: null,
        aboutError: null,
    },
    getters: {
        getAbout: state => state.about,
        getAboutError: state => state.aboutError,
    },
    mutations: {
        setAboutError(state, data) {
            state.aboutError = data
        },
        setAbout(state, data) {
            state.about = data
        },
    },
    actions: {
        getAbout({commit}) {
            return getRequest('/about', '')
                .then(response => commit("setAbout", response.data))
                .catch(error => Promise.reject(error));
        },
        updateAbout({commit}, data) {
            return postRequest(`/about`, data, commit)
                .then(() => commit('setAboutError', null))
                .catch(error => {
                    commit('setAboutError', error.message)
                    return Promise.reject(error)
                });
        },
    },
}