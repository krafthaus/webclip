import Vue from 'vue';
import Vuex from 'vuex';
import auth from '@/store/modules/auth';
import pages from '@/store/modules/pages';
import element from '@/store/modules/element';
import website from '@/store/modules/websites';
import collections from '@/store/modules/collections';

Vue.use(Vuex);

export default new Vuex.Store({
    strict: true,
    modules: {
        auth,
        pages,
        website,
        element,
        collections,
    },
});
