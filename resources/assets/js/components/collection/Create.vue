<script>
    import PageHeader from '../../components/PageHeader.vue';

    export default {
        components: { PageHeader },

        props: ['open'],

        data() {
            return {
                name: '',
                slug: '',
            };
        },

        methods: {
            createPage() {

            },
        },
    };
</script>

<template>
    <div class="container__workspace" v-if="open">

        <page-header title="New collection">
            <span slot="actions">
                <a @click="$emit('close')" class="button button--link">
                    Cancel
                </a>
            </span>
        </page-header>
    </div>
</template>
