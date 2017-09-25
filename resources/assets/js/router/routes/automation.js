/* eslint-disable global-require */

export default [
    {
        name: 'automation.index',
        meta: { requiresAuth: true },
        path: '/:website/automation',
        component: require('../../pages/pages/Editor.vue'),
    },
];
