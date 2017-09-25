/* eslint-disable no-param-reassign */
/* eslint-disable import/prefer-default-export */

import axios from 'axios';
import { event, auth } from '@/utils';

export const http = {
    request(method, url, data, success = null, error = null) {
        return axios.request({
            url,
            data,
            method: method.toLowerCase(),
        }).then(success).catch(error);
    },

    get(url, success = null, error = null) {
        return this.request('get', url, {}, success, error);
    },

    post(url, data, success = null, error = null) {
        return this.request('post', url, data, success, error);
    },

    put(url, data, success = null, error = null) {
        return this.request('put', url, data, success, error);
    },

    delete(url, data = {}, success = null, error = null) {
        return this.request('delete', url, data, success, error);
    },

    init() {
        axios.defaults.baseURL = '/api';

        // Intercept the request to make sure the token is injected into the header.
        axios.interceptors.request.use((config) => {
            config.headers.Authorization = `Bearer ${auth.getToken()}`;

            return config;
        });

        // Intercept the response and…
        axios.interceptors.response.use((response) => {
            // …get the token from the header or response data if exists, and save it.
            const token = response.headers.Authorization || response.data.access_token;

            if (token) {
                auth.setToken(
                    response.data.access_token,
                    response.data.expires_in + Date.now(),
                );
            }

            return response;
        }, (error) => {
            // Also, if we receive a Bad Request / Unauthorized error
            if (error.response.status === 400 || error.response.status === 401) {
                // the token must have expired. Log out.
                event.emit('logout');
            }

            return Promise.reject(error);
        });
    },
};
