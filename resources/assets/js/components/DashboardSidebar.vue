<script>
    export default {

        /**
         * The components properties.
         */
        props: {
            collapsed: Boolean,
        },
    };
</script>

<template>

    <div class="sidebar sidebar--left">
        <div :class="['sidebar__nav', { 'sidebar__nav--collapsed': collapsed }]">
            <ul class="list">
                <li>
                    <router-link :to="{ name: 'dashboard' }">
                        <i class="fa fa-bandcamp"></i>
                        <span>Projects</span>
                    </router-link>
                </li>
                <li class="sidebar__separator"></li>
                <li>
                    <router-link :to="{ name: 'teams.index' }" title="Teams">
                        <i class="fa fa-users"></i>
                        <span>Teams</span>
                    </router-link>
                </li>
                <li>
                    <router-link :to="{ name: 'settings.profile' }" title="Settings">
                        <i class="fa fa-cog"></i>
                        <span>Settings</span>
                    </router-link>
                </li>
                <li>
                    <router-link :to="{ name: 'logout' }" title="Announcements">
                        <i class="fa fa-bullhorn"></i>
                        <span>Announcements</span>
                    </router-link>
                </li>
                <li class="sidebar__separator"></li>
                <li>
                    <router-link :to="{ name: 'logout' }" title="Sign-out">
                        <i class="fa fa-sign-out"></i>
                        <span>Sign-out</span>
                    </router-link>
                </li>
            </ul>
        </div>
    </div>

</template>
