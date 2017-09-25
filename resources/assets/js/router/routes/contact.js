/* eslint-disable global-require */

export default [
    {
        name: 'contacts.index',
        path: '/:website/contacts',
        meta: { requiresAuth: true },
        component: require('../../pages/pages/Editor.vue'),
    },
];
