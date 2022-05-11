import Router   from 'vue-router';
import Vue      from 'vue';
import Public   from './views/Public';
import Contacts from './views/Contacts';
import Messages from "./views/Messages";
import CreateFeedback from "./views/CreateFeedback";
import Page404 from "./views/Page404";

Vue.use(Router);

const routes = [
    {
        path: "/",
        component: CreateFeedback
    },
    {
        path: "/Public",
        component: CreateFeedback
    },
    {
        path: "/Messages",
        component: Messages
    },
    {
        path: "/Contacts",
        component: Contacts
    },
    {
        path: "*",
        component: Page404
    }
];

export default new Router({
    mode: "history",
    routes: routes
});
