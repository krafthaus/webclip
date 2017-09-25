/* eslint-disable global-require */

export default [
    {
        name: 'teams.index',
        path: '/teams',
        meta: { requiresAuth: true },
        component: require('../../pages/Dashboard.vue'),
    },
];
