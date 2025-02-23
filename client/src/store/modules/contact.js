import {postRequest} from "@/store/api";

export default {
    state: {
        contactError: null,
    },
    getters: {
        getContactError: state => state.contactError,
    },
    mutations: {
        setContactError(state, data) {
            state.contactError = data
        },
    },
    actions: {
        createContact({commit}, data) {
            return postRequest(`/contact`, data, commit)
                .then(() => commit('setContactError', null))
                .catch(error => {
                    commit('setContactError', error.message)
                    return Promise.reject(error)
                });
        },
    },
}