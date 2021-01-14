/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('admin-lte');

window.Vue = require('vue');

import { Form, HasError, AlertError } from 'vform'
window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

import VueRouter from 'vue-router'
Vue.use(VueRouter)

Vue.component('pagination', require('laravel-vue-pagination'));

import moment from 'moment'

import VueProgressBar from 'vue-progressbar'
Vue.use(VueProgressBar, {
    color: 'rgb(143, 255, 199)',
    failedColor: 'red',
    height: '3px'
})

import swal from 'sweetalert2'
window.swal = swal;
const toast = swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: (toast) => {
      toast.addEventListener('mouseenter', swal.stopTimer)
      toast.addEventListener('mouseleave', swal.resumeTimer)
    }
  })
window.toast = toast;

import StarRating from 'vue-star-rating'
Vue.component('star-rating', StarRating);

let routes = [
    { path: '/admin-dashboard', component: require('./components/AdminDashboard.vue').default },
    { path: '/daftar-admin', component: require('./components/DaftarAdmin.vue').default },
    { path: '/daftar-pekerja', component: require('./components/DaftarPekerja.vue').default },
    { path: '/daftar-majikan', component: require('./components/DaftarMajikan.vue').default },
    { path: '/pembantu', component: require('./components/Pembantu.vue').default },
    { path: '/babysitter', component: require('./components/Babysitter.vue').default },
    { path: '/perawat', component: require('./components/Perawat.vue').default },
    { path: '/pendaftaran-pekerja', component: require('./components/PendaftaranPekerja.vue').default },
]

const router = new VueRouter({
    // mode: 'history',
    routes
})

Vue.filter('upText', function(text){
    return text.charAt(0).toUpperCase() + text.slice(1)
})

Vue.filter('currency', function(number){
    let val = (number/1).toFixed(0).replace('.', ',')
    return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
})

Vue.filter('myDate', function(date){
    return moment(date).format('DD MMMM YYYY')
})

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router
});
