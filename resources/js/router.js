import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)
// const Home = require('./Pages/home.vue')
// const Main = require('./Pages/main.vue')
// const Home = r => require.ensure([], () => r(require('./Pages/home.vue')))
// const Login = r => require.ensure([], () => r(require('./Pages/login.vue')))
// const Register = r => require.ensure([], () => r(require('./Pages/register.vue')))

// const Company = r => require.ensure([], () => r(require('./Pages/company.vue')))
// const Companies = r => require.ensure([], () => r(require('./Pages/companies.vue')))
// const Blog = r => require.ensure([], () => r(require('./Pages/blog.vue')))
// const Map = r => require.ensure([], () => r(require('./Pages/map.vue')))
// const Contact = r => require.ensure([], () => r(require('./Pages/contact.vue')))
const Dashboard = r => require.ensure([], () => r(require('./Pages/dashboard.vue')))


export default new Router({
    mode:'history',
    path:'/vue/',
    routes: [
        {
            path: '/dashboard',
            name: 'dashboard',
            component: Dashboard
        },
    ],
    // root:'/',
})



