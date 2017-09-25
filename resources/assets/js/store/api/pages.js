import { http } from '@/services';

export default {
    /**
     * Execute a get request to return all pages by the given website.
     *
     * @param   {Number}  website
     * @returns {Promise<AxiosPromise>}
     */
    async getAllPagesByWebsite(website) {
        return http.get(`/${website}/pages`);
    },

    /**
     * Execute a get request to return one website.
     *
     * @param   {String} uuid
     * @param   {String} page
     * @returns {Promise<AxiosPromise>}
     */
    async getPage(uuid, page) {
        return http.get(`/${uuid}/pages/${page}`);
    },

    /**
     * Execute the page create request.
     *
     * @param   {string} uuid
     * @param   {Object} payload
     * @returns {Promise.<*>}
     */
    async createPage(uuid, payload) {
        return http.post(`/${uuid}/pages`, payload);
    },
};
