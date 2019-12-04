
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 //   const app = new Vue({
//     el: '#app'
// });

require('./bootstrap');

window.Vue = require('vue');
require('./script');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));


// $("#button1").click(function() {
//     // value値を取得
//     const str1 = $("#select_single_double_triple").val();
//     console.log(str1);
//     // $("#span1").text(str1);
//   });
