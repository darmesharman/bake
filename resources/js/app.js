require('./bootstrap');

import Vue from 'vue';
import { App as InertiaApp, plugin as InertiaPlugin } from '@inertiajs/inertia-vue';
import PortalVue from 'portal-vue';

Vue.mixin({ methods: { route } });
Vue.use(InertiaPlugin);
Vue.use(PortalVue);

import VueCookies from 'vue-cookies'
Vue.use(VueCookies)

import socket from './sockets'
Vue.use(socket)

import store from './store'
Vue.use(store)


const app = document.getElementById('app');


new Vue({
    store,
    render: (h) =>
        h(InertiaApp, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent: (name) => require(`./Pages/${name}`).default,
            },
        }),
        // ,socket
      
}).$mount(app);