<template>
    <div class="cart">
        <ul class="cart__list" v-if="!isEmptyOrder">
            <li class="cart-item" v-for="(item, index) in userOrder" :key="item.id">
                <figure class="cart-item__img">
                    <img :src="'/img/item/' + item.id + '/cover.jpg'" alt="img">
                </figure>

                <div class="cart-item__block cart-item__block_second">
                    <a :href="'/item/' + item.id" class="cart-item__title">{{ item.title }}</a>
                    <p class="cart-item__description">Полуторный комплект: 2 наволочки 50х70 и 70х70см</p>
                    <var class="cart-item__summary">
                        <span>{{ item.price * item.amount }}</span> грн
                    </var>
                </div>

                <div class="cart-item__block cart-item__block_third">
                    <div class="amount-switcher">
                        <div class="amount-switcher__item">
                            <button class="amount-switcher__operator"
                                    @click="amountDecrease(index)"></button>
                        </div>
                        <div class="amount-switcher__item amount-switcher__item_mh_m">
                            <input class="amount-switcher__amount"
                                   v-model="item.amount"
                                   @input="validateAmount(index)">
                        </div>
                        <div class="amount-switcher__item">
                            <button class="amount-switcher__operator amount-switcher__operator_plus"
                                    @click="amountIncrease(index)"></button>
                        </div>
                    </div>
                    <var class="cart-item__price">
                        1шт = <span>{{ item.price }}</span> грн
                    </var>
                </div>

                <button class="cart-item__remove" @click="remove(index)"></button>
            </li>
        </ul>
        <div class="cart__footer" v-if="!isEmptyOrder">
            Всего: <var class="cart__total">{{ total }} грн</var>
        </div>
        <div class="cart__placeholder" v-if="isEmptyOrder">
            Корзина пустая
        </div>
    </div>
</template>

<script>
    import Order from "../services/Order";

    const order = new Order();

    export default {
        name: 'Cart',

        data() {
            return {
                userOrder: {},
            }
        },

        beforeCreate() {
            order.getUserOrder()
                .then(result => {
                    this.userOrder = Object.assign({}, this.userOrder, result.data)
                })
                .catch(console.error);
        },

        computed: {

            isEmptyOrder() {
                return Object.keys(this.userOrder).length === 0;
            },

            total() {
                let result = 0, item;

                for (item in this.userOrder) {
                    if (this.userOrder.hasOwnProperty(item)) {
                        result += this.userOrder[item].price * this.userOrder[item].amount;
                    }
                }

                return result;
            }

        },

        methods: {

            remove(index) {
                console.log(this.userOrder[index].id);
                this.$delete(this.userOrder, index);
            },

            amountDecrease(index) {
                this.userOrder[index].amount > 1 && --this.userOrder[index].amount;
            },

            amountIncrease(index) {
                ++this.userOrder[index].amount;
            },

            validateAmount(index) {
                if (!Number.isInteger(+this.userOrder[index].amount)) {
                    this.$set(this.userOrder[index], 'amount', 1);
                }
            }

        }
    }
</script>