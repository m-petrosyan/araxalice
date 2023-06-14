import {postRequest} from "@/store/api";

export default {
    state: {
        contactError: null,
    },
    getters: {
        getContactError: state => state.aboutError,
    },
    mutations: {
        setContactError(state, data) {
            state.aboutError = data
        },
    },
    actions: {
        createContact({commit}, data) {
            return postRequest(`/contact`, data, commit)
                .then(() => commit('setAboutError', null))
                .catch(error => {
                    commit('setCategoryError', error.message)
                    return Promise.reject(error)
                });
        },
    },
}