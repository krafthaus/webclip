<template>
    <router-view></router-view>
</template>

<script>
    import { event, auth } from '../utils';

    export default {
        name: 'App',

        created() {
            event.on({

                /**
                 * Bind the logout event to the app.
                 *
                 * @returns {void}
                 */
                logout() {
                    auth.destroyToken();

                    window.location.href = '/login';
                },
            });
        },
    };
</script>
