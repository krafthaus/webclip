<script>
    /* eslint-disable no-param-reassign */
    /* eslint-disable no-nested-ternary */

    export default {
        props: {
            filterKey: String,
        },

        /**
         * The components data.
         */
        data() {
            const sortOrders = {
                name: -1,
                created_at: 1,
            };

            return {
                sortOrders,
                loading: false,
                sortKey: '',
            };
        },

        /**
         * The components computed data.
         */
        computed: {
            pages() {
                const filterKey = this.filterKey && this.filterKey.toLowerCase();
                const sortKey = this.sortKey;
                const order = this.sortOrders[sortKey] || 1;
                let pages = this.$store.getters.pages;

                pages = pages.filter(page => page.name.toLowerCase().indexOf(filterKey) > -1);

                if (sortKey) {
                    pages = pages.slice().sort((a, b) => {
                        a = a[sortKey];
                        b = b[sortKey];

                        return (a === b ? 0 : a > b ? 1 : -1) * order;
                    });
                }

                return pages;
            },
        },

        /**
         * Prepare the component.
         */
        mounted() {
            this.loadPages();
        },

        /**
         * Watch for specific variable changes.
         */
        watch: {
            $route: 'loadPages',
        },

        methods: {
            /**
             * Load all websites.
             *
             * @returns {void}
             */
            loadPages() {
                this.loading = true;

                this.$store.dispatch('loadPages', this.$route.params.website)
                    .then(() => {
                        this.loading = false;
                    });
            },

            /**
             * Sort the list by the given key.
             *
             * @param   {String} key
             * @returns {void}
             */
            sortBy(key) {
                this.sortKey = key;
                this.sortOrders[key] = this.sortOrders[key] * -1;
            },

            /**
             * "Hacky" way to for reload the editor page by not using
             * the vue-router link but the native anchor instead.
             *
             * @param   {Object} params
             * @returns {String}
             */
            url(params) {
                return `/${params.website}/pages/${params.page}`;
            },
        },
    };
</script>

<template>
    <div>
        <div v-if="loading">
            <h1>Loading</h1>
        </div>

        <table class="table" v-if="!loading">
            <thead>
                <tr>
                    <th class="sortable-header" colspan="2" v-on:click="sortBy('name')">
                        Page
                        <i v-bind:class="sortOrders['name'] > 0 ? 'fa fa-angle-down' : 'fa fa-angle-up'"></i>
                    </th>
                    <th class="sortable-header" width="20" v-on:click="sortBy('created_at')">
                        Last updated
                        <i v-bind:class="sortOrders['created_at'] > 0 ? 'fa fa-angle-down' : 'fa fa-angle-up'"></i>
                    </th>
                    <th width="20"></th>
                </tr>
            </thead>
            <tbody>

                <tr v-for="page in pages">
                    <td>
                        <div v-if="page.depth" class="table__column-spacer" :style="{ width: (25 * page.depth) + 'px' }"></div>

                        <a :href="url({ website: $route.params.website, page: page.uuid })">
                            {{ page.name }}
                        </a>

                    </td>
                    <td>{{ page.url }}</td>
                    <td>{{ page.updated_at }}</td>
                    <td>
                        <div class="dropdown">
                            <a href="#" class="dropdown__toggle">edit</a>
                            <div class="dropdown__menu">
                                <a href="#" class="dropdown__item">Edit Properties</a>
                            </div>
                        </div>
                    </td>
                </tr>

            </tbody>
        </table>

        <div v-if="pages.length == 0 && filterKey" class="alert">
            No search results for <strong>{{ filterKey }}</strong>.
        </div>
    </div>
</template>
