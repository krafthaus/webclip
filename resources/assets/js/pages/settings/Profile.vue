<script>
    import { mapGetters } from 'vuex';
    import PageHeader from '../../components/PageHeader.vue';
    import DashboardLayout from '../../layouts/Dashboard.vue';
    import ProfileSidebar from '../../components/ProfileSidebar.vue';

    export default {
        components: { PageHeader, DashboardLayout, ProfileSidebar },

        data() {
            return {
                user: {},
            };
        },

        computed: {
            ...mapGetters([
                'me',
            ]),
        },

        /**
         * Prepare the component.
         */
        mounted() {
            this.loadMe();
        },

        /**
         * Watch for specific variable changes.
         */
        watch: {
            $route: 'loadMe',
        },

        methods: {
            loadMe() {
                this.loading = true;

                this.$store.dispatch('loadMe')
                    .then(() => {
                        this.loading = false;
                    });
            },

            updateProfile() {
                this.$store.dispatch('updateMe');
            },

            updateField(e) {
                this.$store.commit('updateMe', {
                    name: e.target.name,
                    value: e.target.value,
                });
            },
        },
    };
</script>

<template>
    <dashboard-layout>

        <profile-sidebar></profile-sidebar>

        <div class="container__workspace">
            <page-header title="Profile"></page-header>

            <form @submit.prevent="updateProfile">
                <div class="form-group">
                    <label for="f-name">Full name</label>
                    <input type="text" name="name" id="f-name" :value="me.name" @input="updateField" required>
                </div>

                <div class="form-group">
                    <label for="f-email">Email address</label>
                    <input type="email" name="email" id="f-email" :value="me.email" @input="updateField" required>
                </div>

                <button class="button button--success">Update profile</button>
            </form>
        </div>

    </dashboard-layout>
</template>
