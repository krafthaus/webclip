<template>
    <div class="sidebar sidebar--left">
        <div class="sidebar__nav">
            <ul class="list">
                <li>
                    <router-link :to="{ name: 'settings.profile' }" title="Settings">
                        <i class="fa fa-user"></i>
                        Profile
                    </router-link>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-money"></i>
                        Plans
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-shield"></i>
                        Security
                    </a>
                </li>
            </ul>
        </div>
    </div>
</template>
