import Vue from 'vue';
import Router from 'vue-router';
// import { auth } from '../utils';

import DashboardRoutes from './routes/dashboard';
import PageRoutes from './routes/page';
import CollectionRoutes from './routes/collection';
import ContactsRoutes from './routes/contact';
import AutomationRoutes from './routes/automation';
import TeamRoutes from './routes/team';
import SettingsProfileRoutes from './routes/settings/profile';
import SettingsPlansRoutes from './routes/settings/plan';
import SettingsSecurityRoutes from './routes/settings/security';
import AuthRoutes from './routes/auth';

Vue.use(Router);

/* eslint-disable global-require */
const router = new Router({
    mode: 'history',
    routes: [
        ...DashboardRoutes,
        ...PageRoutes,
        ...CollectionRoutes,
        ...ContactsRoutes,
        ...AutomationRoutes,
        ...TeamRoutes,
        ...SettingsProfileRoutes,
        ...SettingsPlansRoutes,
        ...SettingsSecurityRoutes,
        ...AuthRoutes,
    ],
});

export default router;
