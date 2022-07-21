/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

window.Swal = require('sweetalert2');

Vue.component('cliente-component', require('./components/UserHome.vue').default);


const app = new Vue({
    el: '#app',
});
