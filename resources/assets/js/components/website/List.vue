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
                loading: false,
                sortKey: '',
                sortOrders,
            };
        },

        /**
         * The components computed data.
         */
        computed: {
            websites() {
                const filterKey = this.filterKey && this.filterKey.toLowerCase();
                const sortKey = this.sortKey;
                const order = this.sortOrders[sortKey] || 1;
                let websites = this.$store.getters.websites;

                websites = websites.filter(website => website.name.toLowerCase().indexOf(filterKey) > -1);

                if (sortKey) {
                    websites = websites.slice().sort((a, b) => {
                        a = a[sortKey];
                        b = b[sortKey];

                        return (a === b ? 0 : a > b ? 1 : -1) * order;
                    });
                }

                return websites;
            },
        },

        /**
         * Prepare the component.
         */
        mounted() {
            document.title = 'Dashboard';

            this.loadWebsites();
        },

        /**
         * Watch for specific variable changes.
         */
        watch: {
            $route: 'loadWebsites',
        },

        methods: {
            /**
             * Load all websites.
             */
            loadWebsites() {
                this.loading = true;

                this.$store.dispatch('loadWebsites')
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

        <ul class="block-grid" v-if="!loading">
            <li v-for="website in websites">
                <div class="panel">
                    <router-link :to="{ name: 'pages.index', params: { website: website.uuid }}">
                        <h3>{{ website.name }}</h3>
                    </router-link>
                    {{ website.domain }}
                </div>
            </li>
        </ul>

        <div v-if="websites.length == 0 && filterKey" class="alert">
            No search results for <strong>{{ filterKey }}</strong>.
        </div>
    </div>
</template>
