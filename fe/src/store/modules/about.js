import {getRequest, putRequest} from "@/store/api";

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
            return putRequest(`/about`, data, commit)
                .catch(error => Promise.reject(error));
        },
    },
}