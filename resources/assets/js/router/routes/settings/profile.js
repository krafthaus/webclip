/* eslint-disable global-require */

export default [
    {
        name: 'settings.profile',
        path: '/settings/profile',
        meta: { requiresAuth: true },
        component: require('../../../pages/settings/Profile.vue'),
    },
];
