import {createRouter, createWebHistory} from 'vue-router'
import HomeView from '@/views/home/HomeView.vue'
import PortfolioView from "@/views/portfolio/PortfolioView.vue";
import AboutView from "@/views/about/AboutView.vue";
import ContactView from "@/views/contact/ContactView.vue";
import NotFound from "@/views/404/NotFound.vue";
import DashboardPortfolio from "@/views/dashboard/DashboardPortfolio.vue";
import DashboardLayout from "@/components/layouts/DashboardLayout.vue";
import ClientLayout from "@/components/layouts/ClientLayout.vue";
import DashboardSettings from "@/views/dashboard/DashboardSettings.vue";
import DashboardAbout from "@/views/dashboard/DashboardAbout.vue";
import AuthPage from "@/views/auth/AuthPage.vue";

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: '/',
            component: ClientLayout,
            children: [
                {
                    path: '',
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
                    path: '/login',
                    name: 'auth',
                    component: AuthPage
                },
                {
                    path: '/:pathMatch(.*)*',
                    name: '404',
                    component: NotFound
                },
            ]
        },
        {
            path: '/dashboard',
            component: DashboardLayout,
            meta: {requiresAuth: true},
            children: [
                {
                    path: 'portfolio',
                    name: 'd-portfolio',
                    component: DashboardPortfolio
                },
                {
                    path: 'about',
                    name: 'd-about',
                    component: DashboardAbout
                },
                {
                    path: 'settings',
                    name: 'd-settings',
                    component: DashboardSettings
                }
            ]
        },
    ]
})
router.beforeEach((to, from, next) => {

    console.log(to, from, next)

    if (to.matched.some(record => record.meta.requiresAuth)) {
        // check if the user is authenticated
        if (!sessionStorage.getItem('token')) {
            // redirect to the login page if not authenticated
            next({
                name: 'auth',
                query: {redirect: to.fullPath}
            })
        } else {
            next()
        }
    } else {
        next()
    }

})
export default router
