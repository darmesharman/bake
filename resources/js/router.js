import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)
// const Home = require('./Pages/home.vue')
// const Main = require('./Pages/main.vue')
const Home = r => require.ensure([], () => r(require('./Pages/home.vue')))

const Company = r => require.ensure([], () => r(require('./Pages/сompany.vue')))
const Blog = r => require.ensure([], () => r(require('./Pages/blog.vue')))
const Map = r => require.ensure([], () => r(require('./Pages/map.vue')))
const Contact = r => require.ensure([], () => r(require('./Pages/contact.vue')))

export default new Router({
    mode:'history',
    path:'/vue/',
    routes: [
        {
            path: '/vue/home',
            name: 'main',
            component: Home 
        },
        {
            path: '/vue/companies',
            name: 'companies',
            component: Company
        },
        {
            path: '/vue/blog',
            name: 'blog',
            component: Blog
        },
        {
            path: '/vue/maps',
            name: 'maps',
            component: Map
        },
        {
            path: '/vue/contacts',
            name: 'contacts',
            component: Contact
        },
    ],
    // root:'/',
})



