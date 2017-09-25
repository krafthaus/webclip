<script>
    export default {

        /**
         * The components properties.
         */
        props: {
            collapsed: String,
        },
    };
</script>

<template>

    <div class="sidebar sidebar--left">

        <div :class="['sidebar__nav', { 'sidebar__nav--collapsed': collapsed }]">
            <ul class="list">
                <li class="list-item list-item--highlighted">
                    <router-link :to="{ name: 'dashboard' }">
                        <i class="fa fa-mail-reply"></i>
                        <span>Back to Dashboard</span>
                    </router-link>
                </li>
                <li class="sidebar__separator"></li>
                <li>
                    <router-link :to="{ name: 'pages.index', params: { website: $route.params.website }}" title="Pages">
                        <i class="fa fa-files-o"></i>
                        <span>Pages</span>
                    </router-link>
                </li>
                <li>
                    <router-link :to="{ name: 'collections.index', params: { website: $route.params.website }}" title="Collections">
                        <i class="fa fa-database"></i>
                        <span>Collections</span>
                    </router-link>
                </li>
                <li class="sidebar__separator"></li>
                <li>
                    <router-link :to="{ name: 'contacts.index', params: { website: $route.params.website }}" title="Contacts">
                        <i class="fa fa-user-o"></i>
                        <span>Contacts</span>
                    </router-link>
                </li>
                <li>
                    <router-link :to="{ name: 'automation.index', params: { website: $route.params.website }}" title="Automation">
                        <i class="fa fa-calendar-o"></i>
                        <span>Automation</span>
                    </router-link>
                </li>
            </ul>
        </div>
    </div>

</template>
