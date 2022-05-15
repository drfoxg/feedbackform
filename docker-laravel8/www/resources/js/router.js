import Router   from 'vue-router';
import Vue      from 'vue';
import Public   from './views/Public';
import Contacts from './views/Contacts';
import Messages from "./views/Messages";
import FeedbackForm from "./views/FeedbackForm";
import Page404 from "./views/Page404";

Vue.use(Router);

const routes = [
    {
        path: "/",
        component: FeedbackForm
    },
    {
        path: "/Public",
        component: FeedbackForm
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
