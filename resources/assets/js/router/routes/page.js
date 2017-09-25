/* eslint-disable global-require */

export default [
    {
        name: 'pages.index',
        path: '/:website/pages',
        meta: { requiresAuth: true },
        component: require('../../pages/pages/Overview.vue'),
    },
    {
        name: 'pages.create',
        path: '/:website/pages/new',
        meta: { requiresAuth: true },
        component: require('../../pages/pages/Create.vue'),
    },
    {
        name: 'pages.editor',
        path: '/:website/pages/:page',
        canReuse: false,
        meta: { requiresAuth: true },
        component: require('../../pages/pages/Editor.vue'),
    },
];
