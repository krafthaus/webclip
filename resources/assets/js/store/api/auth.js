import { http } from '@/services';

export default {
    getMe() {
        return http.get('/auth/me');
    },

    updateMe(payload) {
        return http.put('/auth/me', payload);
    },
};
