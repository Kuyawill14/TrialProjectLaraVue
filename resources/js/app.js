/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
//import Vue from 'vue';
window.Vue = require('vue').default;

import { Form, HasError, AlertError } from 'vform';
window.Form = Form;
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);


import VueProgressBar from 'vue-progressbar'
Vue.use(VueProgressBar, {
    color: '#bffaf3',
    failedColor: '#874b4b',
    thickness: '5px',
    transition: {
        speed: '0.2s',
        opacity: '0.6s',
        termination: 300
    },
        
});

import Swal from 'sweetalert2'
window.Swal = Swal;
 const Toast = Swal.mixin({
     toast: true,
     position: "top-end",
     showConfirmButton: false,
     timer: 3000,
     timerProgressBar: true,
     didOpen: (toast) => {
         toast.addEventListener("mouseenter", Swal.stopTimer);
         toast.addEventListener("mouseleave", Swal.resumeTimer);
     },
 });
window.Toast = Toast;

//laravelvue Pagination
Vue.component('pagination', require('laravel-vue-pagination'));

import Vuetify from '../plugins/vuetify';
import store from './store';
import router from './router';
import Vue from 'vue';
Vue.use(Vuetify);
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('front-page', require('./components/MainApp.vue').default);
Vue.component('login-form', require('./components/login.vue').default);
Vue.component('login-page', require('./components/main.vue').default);
Vue.component('home-page', require('./components/client/main.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    vuetify: Vuetify,
    router,
    store,
    el: '#app'
});
