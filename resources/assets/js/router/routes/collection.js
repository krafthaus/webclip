/* eslint-disable global-require */

export default [
    {
        name: 'collections.index',
        path: '/:website/collections',
        meta: { requiresAuth: true },
        component: require('../../pages/collections/Overview.vue'),
    },
];
