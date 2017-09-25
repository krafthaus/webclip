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
                const data = {
                    website: this.$route.params.website,
                    page: {
                        name: this.name,
                        slug: this.slug,
                    },
                };

                this.$store.dispatch('createPage', data)
                    .then(() => {
                        this.$emit('close');
                    })
                    .catch((error) => {
                        alert(error);
                    });
            },
        },
    };
</script>

<template>
    <div class="container__workspace" v-if="open">

        <page-header title="New page">
            <span slot="actions">
                <a @click="$emit('close')" class="button button--link">
                    Cancel
                </a>
            </span>
        </page-header>

        <form @submit.prevent="createPage">

            <div class="form-group">
                <label for="f-name">Page name</label>
                <input type="text" id="f-name" v-model.trim="name" required>
            </div>

            <div class="form-group">
                <label for="f-slug">Slug</label>

                <div class="input-group">
                    <span class="input-group__addon">http://website-1.b4.dev</span>
                    <input type="text" class="input-group__item" id="f-slug" v-model="slug" required>
                </div>
            </div>

            <button class="button button--success">Create page</button>

        </form>

    </div>
</template>
