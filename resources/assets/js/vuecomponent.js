window.Vue = require('vue');


import NavComponent from './components/NavComponent.vue';
import ReadComponent from './components/ReadComponent.vue';
import UpdateComponent from './components/UpdateComponent.vue';

Vue.component('nav-component', NavComponent);
Vue.component('read-component', ReadComponent);
Vue.component('update-component', UpdateComponent);

Vue.component('insert-component', require('./components/InsertComponent.vue'));
Vue.component('read-single-component', require('./components/ReadSingleComponent.vue'));

const app = new Vue({
    el: '#app'
});