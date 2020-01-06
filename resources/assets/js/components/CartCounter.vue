<template>
    <a class="cart-counter" :data-counter="amount">
        <slot></slot>
    </a>
</template>

<script>
    import Order from '../services/Order';

    export default {
        name: 'CartCounter',

        data() {
            return {
                amount: 0,
            };
        },

        mounted() {
            const order = new Order();
            this.amount = order.getOrderSize();
        }
    }
</script>