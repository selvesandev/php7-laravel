window.Vue = require('vue');
window.axios = require('axios');
import VueRouter from 'vue-router';

window.myEventBus = new Vue();


import NavComponent from './components/NavComponent.vue';
import ReadComponent from './components/ReadComponent.vue';
import UpdateComponent from './components/UpdateComponent.vue';
import InsertComponent from './components/InsertComponent.vue';
import ReadSingleComponent from './components/ReadSingleComponent.vue';


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
        },
        {
            path: '/single/:id',
            component: ReadSingleComponent,
            name: 'view-single'
        }
    ]
});

Vue.component('nav-component', NavComponent);
Vue.component('read-component', ReadComponent);
Vue.component('update-component', UpdateComponent);

const app = new Vue({
    router,
    el: '#app'
});