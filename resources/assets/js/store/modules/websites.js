/* eslint-disable no-param-reassign */

import api from '@/store/api/websites';

const mutators = {
    LOAD_WEBSITES: 'LOAD_WEBSITES',
    LOAD_WEBSITE: 'LOAD_WEBSITE',
};

const getters = {
    websites: state => state.websites,
    website: state => state.website,
};

const mutations = {
    [mutators.LOAD_WEBSITES](state, websites) {
        state.websites = websites;
    },

    [mutators.LOAD_WEBSITE](state, website) {
        state.website = website;
    },
};

const actions = {
    loadWebsites({ commit }) {
        return api.getAllWebsites()
            .then(response => response.data)
            .then((response) => {
                commit(mutators.LOAD_WEBSITES, response.data);
            })
            .catch(() => {
                commit(mutators.ERROR_WEBSITES);
            });
    },

    loadWebsite({ commit }, uuid) {
        return api.getWebsite(uuid)
            .then(response => response.data)
            .then((response) => {
                commit(mutators.LOAD_WEBSITE, response);
            })
            .catch(() => {
                commit(mutators.ERROR_WEBSITES);
            });
    },
};

export default {
    state: {
        websites: [],
        website: {},
    },
    getters,
    mutations,
    actions,
};
