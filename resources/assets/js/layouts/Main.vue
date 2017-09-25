<script>
    import Sidebar from '../components/Sidebar.vue';

    export default {
        components: { Sidebar },

        /**
         * The components properties.
         */
        props: {
            collapsed: String,
        },
    };
</script>

<template>
    <div id="app">

        <sidebar :collapsed="this.collapsed"></sidebar>

        <div class="container">
            <slot/>
        </div>

    </div>
</template>
