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
            collections() {
                const filterKey = this.filterKey && this.filterKey.toLowerCase();
                const sortKey = this.sortKey;
                const order = this.sortOrders[sortKey] || 1;
                let collections = this.$store.getters.collections;

                collections = collections.filter(collection => collection.name.toLowerCase().indexOf(filterKey) > -1);

                if (sortKey) {
                    collections = collections.slice().sort((a, b) => {
                        a = a[sortKey];
                        b = b[sortKey];

                        return (a === b ? 0 : a > b ? 1 : -1) * order;
                    });
                }

                return collections;
            },
        },

        mounted() {
            this.loadCollections();
        },

        watch: {
            $route: 'loadCollections',
        },

        methods: {
            loadCollections() {
                this.loading = true;

                this.$store.dispatch('loadCollections', this.$route.params.website)
                    .then(() => {
                        this.loading = false;
                    });
            },

            sortBy(key) {
                this.sortKey = key;
                this.sortOrders[key] = this.sortOrders[key] * -1;
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
                    <th class="sortable-header" v-on:click="sortBy('name')">
                        Page
                        <i v-bind:class="sortOrders['name'] > 0 ? 'fa fa-angle-down' : 'fa fa-angle-up'"></i>
                    </th>
                    <th class="sortable-header" width="20" v-on:click="sortBy('created_at')">
                        Last updated
                        <i v-bind:class="sortOrders['created_at'] > 0 ? 'fa fa-angle-down' : 'fa fa-angle-up'"></i>
                    </th>
                </tr>
            </thead>
            <tbody>

                <tr v-for="collection in collections">
                    <td>
                        <router-link :to="{ name: 'pages.editor', params: { website: $route.params.website, page: collection.uuid }}">
                            {{ collection.name }}
                        </router-link>
                    </td>
                    <td>{{ collection.updated_at }}</td>
                </tr>

            </tbody>
        </table>

        <div v-if="collections.length == 0 && filterKey" class="alert">
            No search results for <strong>{{ filterKey }}</strong>.
        </div>
    </div>
</template>
