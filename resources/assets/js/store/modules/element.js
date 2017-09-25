/* eslint-disable no-shadow */
/* eslint-disable no-param-reassign */

import elements from '@/store/api/elements';

const mutators = {
    INIT_ELEMENTS: 'INIT_ELEMENTS',
};

const getters = {
    elements: state => state.all,
};

const mutations = {
    [mutators.INIT_ELEMENTS](state, { elements }) {
        state.all = elements;
    },
};

const actions = {
    initElements({ commit }) {
        return elements.getAllElements()
            .then(response => response.data)
            .then((response) => {
                commit(mutators.INIT_ELEMENTS, response);
            });
    },
};

export default {
    state: {
        all: [],
    },
    getters,
    mutations,
    actions,
};
