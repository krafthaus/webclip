<script>
    import DashboardSidebar from '../components/DashboardSidebar.vue';

    export default {
        /**
         * The child components.
         */
        components: { DashboardSidebar },

        /**
         * The components properties.
         */
        props: {
            collapsed: Boolean,
        },
    };
</script>

<template>
    <div id="app">

        <dashboard-sidebar :collapsed="this.collapsed"></dashboard-sidebar>

        <div class="container">
            <slot/>
        </div>

    </div>
</template>
