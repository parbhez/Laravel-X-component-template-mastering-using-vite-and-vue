import { createRouter, createWebHistory } from 'vue-router'

const routes = [{
        path: '/',
        name: 'home',
        component: () =>
            import ('./components/pages/Home.vue')
    },

]

const allRouterPath = createRouter({
    history: createWebHistory(),
    routes,
})