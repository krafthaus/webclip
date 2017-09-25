<script>
    import { mapGetters } from 'vuex';
    import Layout from '../../layouts/Main.vue';
    import Canvas from '../../lib/editor/Canvas';

    export default {
        components: { Layout },

        /**
         * The components data.
         */
        data() {
            return {
                canvas: null,
                loaded: false,
                sidebarLeftCollapsed: false,
                sidebarRightCollapsed: false,
                iframe: {
                    src: 'http://website-1.b4.dev',
                },
            };
        },

        /**
         * The components computed properties.
         */
        computed: {
            ...mapGetters([
                'elements',
                'page',
            ]),
        },

        /**
         * Prepare the component.
         */
        mounted() {
            document.title = 'Editor';

            this.canvas = new Canvas('iframe#editor-canvas');

            this.loadPage();
            this.loadElements();
        },

        methods: {
            /**
             * Load the current page.
             */
            loadPage() {
                this.loaded = false;

                this.$store.dispatch('initPage', {
                    website: this.$route.params.website,
                    page: this.$route.params.page,
                }).then(() => {
                    this.loaded = true;
                });
            },

            /**
             * Load all elements.
             */
            loadElements() {
                this.$store.dispatch('initElements');
            },
        },
    };
</script>

<template>
    <layout collapsed="true">

        <div :class="['sidebar__nav editor__sidebar-left', { 'sidebar__nav--collapsed': sidebarLeftCollapsed }]">
            <ul>
                <li v-for="subElements, element in elements">
                    {{ element }}

                    <ul>
                        <li v-for="subElement in subElements">
                            {{ subElement.title }}
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

        <div class="editor container__workspace container__workspace--editor">

            <iframe id="editor-canvas"
                    frameborder="0"
                    :class="{ 'is-loaded': iframe.loaded }"
                    :src="page.url"></iframe>

        </div>
    </layout>
</template>

