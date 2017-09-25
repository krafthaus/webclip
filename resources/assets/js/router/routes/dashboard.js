/* eslint-disable global-require */
import { auth } from '../../utils';

export default [
    {
        path: '/',
        redirect: '/dashboard',
    },
    {
        name: 'dashboard',
        path: '/dashboard',
        component: require('../../pages/Dashboard.vue'),
        beforeEnter: auth.requireAuth,
    },
];
