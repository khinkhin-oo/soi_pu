import { createRouter, createWebHistory } from "vue-router";
import store from "./store";

const routes = [{
        path: "/",
        name: "Home",
        component: require('./views/Home.vue').default
    },
    {
        path: "/login",
        name: "Login",
        component: require('./auth/Login.vue').default
    },
    {
        path: "/register",
        name: "Register",
        component: require('./auth/Register.vue').default
    },
    {
        path: "/:pathMatch(.*)*",
        name: "PageNotFound",
        component: require('./views/PageNotFound.vue').default
    }
]

const router = createRouter({
    history: createWebHistory(process.env.BASH_URL),
    routes,
    linkActiveClass: "active",
    linkExactActiveClass: "exact-active"
});

router.beforeEach((to, from, next) => {
    const auth = store.state.auth;
    if ((to.name == 'Login' || to.name == 'Register') && auth) next({ path: '/' })
    else if (to.meta.protect && !auth) next({ path: '/login' })
    else next()
})

export default router;
