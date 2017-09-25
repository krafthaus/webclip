import { http } from '@/services';

export default {
    /**
     * Execute a get request to return all websites.
     *
     * @returns {Promise.<void>}
     */
    async getAllWebsites() {
        return http.get('/websites');
    },

    /**
     * Execute a get request to return a specific website.
     *
     * @param   {String}  uuid
     * @returns {Promise.<void>}
     */
    async getWebsite(uuid) {
        return http.get(`/websites/${uuid}`);
    },
};
