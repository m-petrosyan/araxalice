import {createMemoryHistory, createRouter, createWebHistory} from 'vue-router'
import HomeView from '@/views/HomeView.vue'
import AboutView from "@/views/AboutView.vue";
import NotFound from "@/views/NotFound.vue";
import ContactView from "@/views/ContactView.vue";
import PortfolioView from "@/views/PortfolioView.vue";

const baseUrl = import.meta.env.BASE_URL
const history = import.meta.env.SSR ? createMemoryHistory(baseUrl) : createWebHistory(baseUrl)

const router = createRouter({
    history,
    routes: [
        {
            path: '/',
            name: 'home',
            component: HomeView
        },
        {
            path: '/portfolio',
            name: 'portfolio',
            component: PortfolioView
        },
        {
            path: '/about',
            name: 'about',
            component: AboutView
        },
        {
            path: '/contact',
            name: 'contact',
            component: ContactView
        },
        {
            path: '/:pathMatch(.*)*',
            name: '404',
            component: NotFound
        },
    ]
})

export default router
