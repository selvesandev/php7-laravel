window.Vue = require('vue');
window.axios = require('axios');
import VueRouter from 'vue-router';

import NavComponent from './components/NavComponent.vue';
import ReadComponent from './components/ReadComponent.vue';
import UpdateComponent from './components/UpdateComponent.vue';
import InsertComponent from './components/InsertComponent.vue';


Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    base: '/vue',
    linkActiveClass: 'active',
    routes: [
        {
            path: '/',
            component: ReadComponent
        },
        {
            path: '/create',
            component: InsertComponent
        },
        {
            path: '/home',
            component: ReadComponent
        },
        {
            path: '/edit/:id',
            component: UpdateComponent,
            name: 'edit-route'
        }
    ]
});

Vue.component('nav-component', NavComponent);
Vue.component('read-component', ReadComponent);
Vue.component('update-component', UpdateComponent);

Vue.component('read-single-component', require('./components/ReadSingleComponent.vue'));

const app = new Vue({
    router,
    el: '#app'
});