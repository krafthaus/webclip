/* eslint-disable no-param-reassign */
import api from '@/store/api/pages';

const mutators = {
    LOAD_PAGES: 'LOAD_PAGES',
    LOAD_PAGE: 'LOAD_PAGE',
    PAGE_CREATED: 'PAGE_CREATED',
};

const getters = {
    pages: state => state.pages,
    page: state => state.page,
};

const mutations = {
    [mutators.LOAD_PAGES](state, pages) {
        state.pages = pages;
    },

    [mutators.LOAD_PAGE](state, page) {
        state.page = page;
    },

    [mutators.PAGE_CREATED](state, page) {
        state.pages = state.pages.concat(page);
    },
};

const actions = {
    loadPages({ commit }, website) {
        return api.getAllPagesByWebsite(website)
            .then(response => response.data)
            .then((response) => {
                commit(mutators.LOAD_PAGES, response.data);
            })
            .catch(() => {
                commit(mutators.ERROR_PAGES);
            });
    },

    initPage({ commit }, payload) {
        return api.getPage(payload.website, payload.page)
            .then(response => response.data)
            .then((response) => {
                commit(mutators.LOAD_PAGE, response.data);
            });
    },

    createPage({ commit }, payload) {
        return api.createPage(payload.website, payload.page)
            .then(response => response.data)
            .then((response) => {
                commit(mutators.PAGE_CREATED, response.data);
            });
    },
};

export default {
    state: {
        pages: [],
        page: {},
    },
    getters,
    mutations,
    actions,
};
