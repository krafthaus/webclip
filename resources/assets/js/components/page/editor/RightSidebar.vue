<script>
    import { mapGetters } from 'vuex';

    export default {
        data() {
            return {
                loading: false,
            };
        },

        /**
         * The components computed properties.
         */
        computed: {
            ...mapGetters([
                'elements',
            ]),
        },

        /**
         * Watch for specific variable changes.
         */
        watch: {
            $route: 'loadElements',
        },

        mounted() {
            this.loadElements();
        },

        methods: {
            loadElements() {
                this.loading = true;

                this.$store.dispatch('initElements')
                    .then(() => {
                        this.loading = false;
                    });
            },
        },
    };
</script>

<template>
    <div>
        <div v-if="loading">
            <h1>Loading</h1>
        </div>

        <div class="sidebar sidebar--right" v-if="!loading">
            <div v-for="element, key in elements">
                {{ key }}

                <ul>
                    <li v-for="e in element">
                        <a href="#">
                            {{ e.title }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>
