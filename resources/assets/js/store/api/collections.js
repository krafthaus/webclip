import { http } from '@/services';

export default {
    getAllCollectionsByWebsite(website) {
        return http.get(`/${website}/collections`);
    },
};
