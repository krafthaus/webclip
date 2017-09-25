import { http } from '@/services';

export default {
    /**
     * Execute a get request to return all elements.
     *
     * @returns {Promise<AxiosPromise>}
     */
    async getAllElements() {
        return http.get('/elements');
    },
};
