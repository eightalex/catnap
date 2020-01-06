import '../styles/app.sass';
import Vue from 'vue/dist/vue.js';

Vue.component('cart', () => import('./components/Cart.vue'));
Vue.component('checkout-form', () => import('./components/CheckoutForm.vue'));

new Vue({
    el: '#app',
});