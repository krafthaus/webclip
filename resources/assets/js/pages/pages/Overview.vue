<script>
    import { mapGetters } from 'vuex';
    import { project } from '../../utils';
    import Layout from '../../layouts/Main.vue';
    import PageList from '../../components/page/List.vue';
    import PageHeader from '../../components/PageHeader.vue';
    import PageCreate from '../../components/page/Create.vue';

    export default {
        components: { Layout, PageList, PageHeader, PageCreate },

        data() {
            return {
                search_query: '',
                showCreatePage: false,
            };
        },

        computed: {
            ...mapGetters([
                'website',
            ]),
        },

        mounted() {
            document.title = 'Pages';

            this.rememberWebsite();
            this.loadWebsite();
        },

        methods: {
            rememberWebsite() {
                project.remember(this.$route.params.website);
            },

            loadWebsite() {
                this.$store.dispatch('loadWebsite', this.$route.params.website);
            },
        },
    };
</script>

<template>
    <layout>
        <div class="container__workspace">

            <page-header title="Pages">
                <span slot="actions">
                    <input type="search" v-model="search_query" class="form-control" placeholder="Search..." autofocus>
                    <a @click="showCreatePage = true" class="button button--primary">
                        New page
                    </a>
                </span>
            </page-header>

            <page-list :filter-key="search_query"></page-list>

        </div>

        <page-create :open="showCreatePage" @close="showCreatePage = false"></page-create>

    </layout>
</template>
