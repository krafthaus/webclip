/* eslint-disable global-require */

export default [
    {
        name: 'logout',
        path: '/logout',
        meta: { requiresAuth: true },
        component: require('../../pages/auth/Logout.vue'),
    },
    { name: 'login', path: '/login', component: require('../../pages/auth/Login.vue') },
    { path: '*', component: require('../../pages/auth/Login.vue') },
];
