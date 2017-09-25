/* eslint-disable global-require */

export default [
    {
        name: 'settings.plans',
        path: '/settings/plans',
        meta: { requiresAuth: true },
        component: require('../../../pages/settings/Plans.vue'),
    },
];
