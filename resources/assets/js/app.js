import Vue from 'vue';
import $ from 'jquery';
import store from './store';
import router from './router';
import { event } from './utils';
import { http } from './services';
import App from './components/App.vue';

window.axios = require('axios');

window.$ = $;

require('./bindings/dropdown');

/* eslint-disable no-new */
new Vue({
    el: '#app',
    router,
    store,
    data: {},
    created() {
        event.init();
        http.init();
    },
    render: h => h(App),
});
