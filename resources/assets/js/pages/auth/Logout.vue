<script>

    import { auth } from '../../utils';

    export default {
        created() {
            auth.destroyToken();

            this.$router.replace({ name: 'login' });
        },
    };

</script>

<template></template>
