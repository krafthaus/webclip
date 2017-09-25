/* eslint-disable import/prefer-default-export */

export const auth = {
    requireAuth(to, from, next) {
        if (!auth.isAuthenticated()) {
            next({
                path: '/login',
                query: { redirect: to.fullPath },
            });
        } else {
            next();
        }
    },

    setToken(token, expiration) {
        localStorage.setItem('token', token);
        localStorage.setItem('expiration', expiration);
    },

    getToken() {
        const token = localStorage.getItem('token');
        const expiration = localStorage.getItem('expiration');

        if (!token || !expiration) {
            return null;
        }

        if (Date.now() > parseInt(expiration)) {
            this.destroyToken();
            return null;
        }

        return token;
    },

    destroyToken() {
        localStorage.removeItem('token');
        localStorage.removeItem('expiration');
    },

    isAuthenticated() {
        if (auth.getToken()) {
            return true;
        }

        return false;
    },
};
