<script>
    import { project } from '../../utils';

    export default {
        data() {
            return {
                email: '',
                password: '',
            };
        },

        methods: {
            login() {
                const data = {
                    email: this.email,
                    password: this.password,
                };

                this.$store.dispatch('login', data)
                    .then(() => {
                        const currentWebsite = project.getCurrent();

                        if (currentWebsite) {
                            this.$router.replace({
                                name: 'pages.index',
                                params: { website: currentWebsite },
                            });
                        } else {
                            this.$router.replace(this.$route.query.redirect || '/');
                        }
                    }).catch(error => console.error(error));
            },
        },
    };
</script>

<template>
    <div class="row">

        <form @submit.prevent="login({ email, password })">
            <div class="form-group">
                <input type="email" placeholder="Email address" v-model="email" class="form-control">
            </div>

            <div class="form-group">
                <input type="password" placeholder="Password" v-model="password" class="form-control">
            </div>

            <button type="submit" class="button button--primary">
                <i class="fa fa-lock"></i>
                Login
            </button>

            <a class="button button--link" href="#">Forgot your password?</a>
        </form>

    </div>
</template>

<style scoped="test" lang="scss">
    .row {
        margin: auto;
    }
</style>
