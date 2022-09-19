import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import Login from '../views/LoginView.vue'
import Search from '../views/SearchView.vue'
import ListSearch from '../views/ListSearchView.vue'
import ViewSearch from '../views/ViewSearchView.vue'

Vue.use(VueRouter)

const routes = [{
        path: '/',
        name: 'Home',
        component: Home
    },
    {
        path: '/login',
        name: 'Login',
        component: Login
    },
    {
        path: '/search',
        name: 'Search',
        component: Search,
        beforeEnter: (to, from, next) => {
            if (to.path != '/login/' && !localStorage.getItem("token")) {
                next('/login/');
            } else {
                next();
            }
        }
    },
    {
        path: '/list-search',
        name: 'ListSearch',
        component: ListSearch,
        beforeEnter: (to, from, next) => {
            if (to.path != '/login/' && !localStorage.getItem("token")) {
                next('/login/');
            } else {
                next();
            }
        }
    },
    {
        path: '/view-search/:id',
        name: 'ViewSearch',
        component: ViewSearch,
        beforeEnter: (to, from, next) => {
            if (to.path != '/login/' && !localStorage.getItem("token")) {
                next('/login/');
            } else {
                next();
            }
        }
    },
]

const router = new VueRouter({
    routes
})

// router.beforeEach((to, from, next) => {

//     if (to.path != '/login/' && !localStorage.getItem("token")) {
//         next('/');
//     } else if (from.path == '/login/' && localStorage.getItem("token")) {
//         console.log('this hit')
//         next();
//     } else {
//         next();
//     }
// })

export default router