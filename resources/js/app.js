/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import 'owl.carousel';
import Vue from 'vue';
import VueSweetalert2 from 'vue-sweetalert2';
window.Vue = require('vue');
Vue.use(VueSweetalert2);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.config.ignoredElements=['trix-editor','trix-toolbar']
Vue.component('moment', require('./components/Moment.vue').default);
Vue.component('eliminar',require('./components/eliminar.vue').default);

Vue.component('like',require('./components/like.vue').default)
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

$(function() {
    $(".heart").on("click", function() {
      $(this).toggleClass("is-active");
    });
  });


jQuery(document).ready(function(){
    jQuery('.owl-carousel').owlCarousel({
      loop:true,
      margin:10,
      autoplay:true,
      autoplayHoverPause:true,
      autoWidth:true
    })

  })