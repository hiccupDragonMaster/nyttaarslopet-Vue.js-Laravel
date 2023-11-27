import { createWebHistory, createRouter } from "vue-router"

import IndexPage from './pages/index.vue'
import RegisterPage from './pages/register.vue'
import ThankYouPage from './pages/thank-you.vue'
import TcPage from './pages/tc.vue'

const routes = [

    { path: '/', component: IndexPage},
    { path: '/registrer-deg', component: RegisterPage},
    { path: '/takk', component: ThankYouPage},
    { path: '/vilkaar', component: TcPage},

];

const router = createRouter({
    // 4. Provide the history implementation to use. We are using the hash history for simplicity here.
    history: createWebHistory(),
    routes, // short for `routes: routes`
})


export default router;
