<script>
    import { mapGetters } from 'vuex';
    import Layout from '../../layouts/Main.vue';
    import PageHeader from '../../components/PageHeader.vue';

    export default {
        components: { Layout, PageHeader },

        computed: {
            ...mapGetters([
                'website',
            ]),
        },

        mounted() {
            document.title = 'Pages';

            this.loadWebsite();
        },

        methods: {
            loadWebsite() {
                this.$store.dispatch('loadWebsite', this.$route.params.website);
            },
        },
    };
</script>

<template>
    <layout>
        <div class="container__workspace">

            <page-header title="New page">
                <span slot="breadcrumbs">
                    <li>
                        <router-link :to="{ name: 'dashboard' }">
                            {{ website.name }}
                        </router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: 'pages.index', params: { website: $route.params.website }}">
                            Pages
                        </router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: 'pages.index', params: { website: $route.params.website }}">
                            New page
                        </router-link>
                    </li>
                </span>
                <span slot="actions">

                </span>
            </page-header>

        </div>
    </layout>
</template>
