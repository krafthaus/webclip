<script>
    import { mapGetters } from 'vuex';
    import { project } from '../../utils';
    import Layout from '../../layouts/Main.vue';
    import PageHeader from '../../components/PageHeader.vue';
    import CollectionList from '../../components/collection/List.vue';
    import CollectionCreate from '../../components/collection/Create.vue';

    export default {
        components: { Layout, PageHeader, CollectionList, CollectionCreate },

        data() {
            return {
                searchQuery: '',
                showCreateCollection: false,
            };
        },

        computed: {
            ...mapGetters([
                'website',
            ]),
        },

        mounted() {
            document.title = 'Collections';

            this.rememberWebsite();
            this.loadWebsite();
        },

        methods: {
            /**
             * Remember the current website for the next visit.
             */
            rememberWebsite() {
                project.remember(this.$route.params.website);
            },

            /**
             * Load the current website.
             */
            loadWebsite() {
                this.$store.dispatch('loadWebsite', this.$route.params.website);
            },
        }
    };
</script>

<template>
    <layout>
        <div class="container__workspace">

            <page-header title="Collections">
                <span slot="actions">
                    <input type="search" v-model="searchQuery" class="form-control" placeholder="Search..." autofocus>
                    <a @click="showCreateCollection = true" class="button button--primary">
                        New collection
                    </a>
                </span>
            </page-header>

            <collection-list :filter-key="searchQuery"></collection-list>

        </div>

        <collection-create :open="showCreateCollection" @close="showCreateCollection = false"></collection-create>

    </layout>
</template>
