import {getRequest} from "@/store/api";

export default {
    state: {
        portfolio: null,
        portfolioError: null,
    },
    getters: {
        getPortfolio: state => state.portfolio,
        getPortfolioError: state => state.portfolioError,
    },
    mutations: {
        setPortfolioError(state, data) {
            state.portfolioError = data
        },
        setPortfolio(state, data) {
            state.portfolio = data
        },
    },
    actions: {
        getPortfolio({commit}, data) {
            return getRequest('/portfolio', data)
                .then(response => commit("setPortfolio", response.data))
                .catch(error => Promise.reject(error));
        },
        // updatePortfolio({commit}, data) {
        //     return postRequest(`/portfolio`, data, commit)
        //         .then(() => commit('setPortfolioError', null))
        //         .catch(error => {
        //             commit('setPortfolioError', error.message)
        //             return Promise.reject(error)
        //         });
        // },
    },
}