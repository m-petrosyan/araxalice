import {getRequest, postRequest} from "@/store/api";

export default {
    state: {
        portfolio: null,
        randomPortfolio: null,
        portfolioError: null,
    },
    getters: {
        getPortfolio: state => state.portfolio,
        getrandomPortfolio: state => state.randomPortfolio,
        getPortfolioError: state => state.portfolioError,
    },
    mutations: {
        setPortfolioError(state, data) {
            state.portfolioError = data
        },
        setPortfolio(state, data) {
            state.portfolio = data
        },
        setRandomPortfolio(state, data) {
            state.randomPortfolio = data
        },
    },
    actions: {
        getPortfolio({commit}, data) {
            return getRequest('/portfolio', data)
                .then(response => commit("setPortfolio", response.data))
                .catch(error => Promise.reject(error));
        },
        getRandomPortfolio({commit}, data) {
            return getRequest('/portfolio/random', data)
                .then(response => commit("setRandomPortfolio", response.data))
                .catch(error => Promise.reject(error));
        },
        createPortfolio({commit}, {id, data}) {
            return postRequest('/portfolio/' + id, data)
                .then(() => commit("setPortfolioError", null))
                .catch(error => Promise.reject(error));
        },
    },
}