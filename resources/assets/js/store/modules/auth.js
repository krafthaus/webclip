/* eslint-disable no-param-reassign */

import api from '@/store/api/auth';
import { auth } from '@/utils';

const mutators = {
    LOGIN_SUCCESS: 'LOGIN_SUCCESS',
    LOAD_ME: 'LOAD_ME',
    ME_UPDATED: 'ME_UPDATED',
};

const getters = {
    token: () => auth.getToken(),
    me: state => state.me,
};

const mutations = {
    [mutators.LOGIN_SUCCESS](state, response) {
        auth.setToken(response.access_token, response.expires_in + Date.now());
    },

    [mutators.LOAD_ME](state, me) {
        state.me = me;
    },

    [mutators.ME_UPDATED](state, me) {
        state.me = me;
    },

    updateMe(state, payload) {
        state.me[payload.name] = payload.value;
    },
};

const actions = {
    loadMe({ commit }) {
        return api.getMe()
            .then(response => response.data)
            .then((response) => {
                commit(mutators.LOAD_ME, response);
            });
    },

    updateMe({ commit, state }) {
        return api.updateMe(state.me)
            .then(response => response.data)
            .then((response) => {
                commit(mutators.ME_UPDATED, response);
            });
    },

    login({ commit }, credentials) {
        const data = {
            email: credentials.email,
            password: credentials.password,
        };

        return axios.post('/auth/login', data)
            .then(response => response.data)
            .then((response) => {
                commit(mutators.LOGIN_SUCCESS, response);
            });
    },
};

export default {
    state: {
        me: {},
    },
    getters,
    mutations,
    actions,
};
