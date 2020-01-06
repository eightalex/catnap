import '../styles/app.sass';
import Vue from 'vue/dist/vue.js';
import Axios from 'axios';

window.axios = Axios;

Vue.component('cart', () => import('./components/Cart.vue'));
Vue.component('cart-counter', () => import('./components/CartCounter.vue'));
Vue.component('checkout-form', () => import('./components/CheckoutForm.vue'));

new Vue({
    el: '#app',
});

// Set fake order for tests
const fakeOrder = {1: 2, 2: 4};
localStorage.setItem('userOrder', JSON.stringify(fakeOrder));