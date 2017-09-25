/* eslint-disable no-param-reassign */
import api from '@/store/api/collections';

const mutators = {
    LOAD_COLLECTIONS: 'LOAD_COLLECTIONS',
    LOAD_COLLECTION: 'LOAD_COLLECTION',
    COLLECTION_CREATED: 'COLLECTION_CREATED',
};

const getters = {
    collections: state => state.collections,
    collection: state => state.collection,
};

const mutations = {
    [mutators.LOAD_COLLECTIONS](state, collections) {
        state.collections = collections;
    },
};

const actions = {
    loadCollections({ commit }, website) {
        return api.getAllCollectionsByWebsite(website)
            .then(response => response.data)
            .then((response) => {
                commit(mutators.LOAD_COLLECTIONS, response.data);
            });
    },
};

export default {
    state: {
        collections: [],
        collection: {},
    },
    getters,
    mutations,
    actions,
};
