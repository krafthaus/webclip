<script>
    export default {

        /**
         * The components properties.
         */
        props: {
            title: String,
        },
    };
</script>

<template>

    <div class="page-header">
        <div class="page-header__wrapper">
            <h1 class="page-header__heading">{{ title }}</h1>
            <div class="page-header__actions">
                <slot name="actions"></slot>
            </div>
        </div>
    </div>

</template>
