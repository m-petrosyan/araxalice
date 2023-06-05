import {deleteRequest, getRequest, postRequest, putRequest} from "@/store/api";

export default {
    state: {
        category: null,
        categoryError: null,
    },
    getters: {
        getCategory: state => state.category,
        getCategoryError: state => state.categoryError,
    },
    mutations: {
        setCategoryError(state, data) {
            state.categoryError = data
        },
        setCategory(state, data) {
            state.category = data
        },
        deleteCategory(state, id) {
            state.category = state.category.filter(item => item.id !== id)
        }
    },
    actions: {
        getCategory({commit}, data) {
            return getRequest('/portfolio_category', data)
                .then(response => commit("setCategory", response.data))
                .catch(error => Promise.reject(error));
        },
        createCategory({commit}, data) {
            return postRequest('/portfolio_category', data)
                .then(() => {
                    commit('setCategoryError', null)
                })
                .catch(error => {
                    commit('setCategoryError', error.message)
                    return Promise.reject(error)
                });
        },
        updateCategory({commit}, {id, data}) {
            return putRequest('/portfolio_category/' + id, data)
                .then(() => {
                    commit('setCategoryError', null)
                })
                .catch(error => {
                    commit('setCategoryError', error.message)
                    return Promise.reject(error)
                });
        },
        deleteCategory({commit}, id) {
            return deleteRequest('/portfolio_category/' + id, '')
                .then(() => commit("deleteCategory", id))
                .catch(error => {
                    commit('setCategoryError', error.message)
                    return Promise.reject(error)
                });
        },
    },
}