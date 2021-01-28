require('./bootstrap');

import Vue from 'vue';
// import { App as InertiaApp, plugin as InertiaPlugin } from '@inertiajs/inertia-vue';
// import PortalVue from 'portal-vue';

// Vue.mixin({ methods: { route } });
// Vue.use(InertiaPlugin);
// Vue.use(PortalVue);

import VueCookies from 'vue-cookies'
Vue.use(VueCookies)

// import socket from './sockets'
// Vue.use(socket)

import store from './store'
Vue.use(store)


import Router from 'vue-router'
import router from './router'
Vue.use(router)

// const app = document.getElementById('app');

// const Page1 = r => require.ensure([], () => r(require('./routes/Page1.vue')))
// import Header  from './Pages/header.vue'
// let  Header = require ('./Pages/header.vue')

Vue.component('header-component', require ('./Pages/header.vue').default);
Vue.component('footer-component', require ('./Pages/footer.vue').default);

// const routes = [
//   { path: '/main', component: MainPage },
//   { path: '/page1', component: Page1 }
// ]
// let Home = require('./Pages/home.vue') 

new Vue({
    router,
    store,
    // components: { 'header': vue.Component(Header), },
    el: '#app',
    // ,socket
    // components: { Main, Home }
      
})






// import Vue from 'vue'
// import App from './App.vue' 
// import store from './store'

// const NotFound = { template: '<div app="id"> <p>Page not found</p></div>' }
// import VueSocketIO from 'vue-socket.io';
// import io from "socket.io-client";


// const routes = {
//   '/': App,
// }


// import VueCookies from 'vue-cookies'
// Vue.use(VueCookies)


 
// const options = {
//   debug: true,
//   transports : ['websocket'],//, 'polling', 'flashsocket'
// }


// Vue.use(new VueSocketIO({
//   debug: false,
//   connection: io('http://localhost:4000/', options), //options object is Optional
//   vuex: {
//     store,
//     actionPrefix: "SOCKET_",
//     mutationPrefix: "SOCKET_"
//   },

//   })
// );

// Vue.$cookies.config('1h')

// new Vue({
//   el: '#app',
//   store,
//   data: {
//     currentRoute: window.location.pathname
//   },
//   sockets: {
//     connection () {
//         console.log('socket connected!!')
//     },
//     pingServer(data) {
//       console.log('smuf', data.data)
//     },
    
//   },
//   methods: {
//     pingServer() {
    
//       console.log('check')

//       this.$socket.emit('pingServer', "PING!")
//       setTimeout(this.pingServer, 5000);

//     },
//   },
//   mounted() {
//       this.sockets.subscribe('connect1', (data) => {
//         console.log(data)
//     });
  
//       console.log('check')
//       setTimeout(this.pingServer, 3000);
//   },
//   computed: {
//     ViewComponent () {
//       return routes[this.currentRoute] || NotFound
//     }
//   },
//   render (h) { return h(this.ViewComponent) }
// })
// Vue.config.productionTip = false
