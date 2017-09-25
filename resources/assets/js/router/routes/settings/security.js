/* eslint-disable global-require */

export default [
    {
        name: 'settings.security',
        path: '/settings/security',
        meta: { requiresAuth: true },
        component: require('../../../pages/settings/Security.vue'),
    },
];
