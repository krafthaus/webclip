<script>
    import DashboardLayout from '../layouts/Dashboard.vue';
    import PageHeader from '../components/PageHeader.vue';
    import WebsiteList from '../components/website/List.vue';

    export default {
        components: { DashboardLayout, PageHeader, WebsiteList },

        data() {
            return {
                search_query: '',
            };
        },
    };
</script>

<template>
    <dashboard-layout>
        <div class="container__workspace">

            <page-header title="Projects">
                <span slot="actions">
                    <input type="search" v-model="search_query" class="form-control" placeholder="Search..." autofocus>
                    <a href="#" class="button button--primary">
                        New Project
                    </a>
                </span>
            </page-header>

            <website-list :filter-key="search_query"></website-list>

        </div>
    </dashboard-layout>
</template>
