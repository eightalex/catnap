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
                <menu class="amount-switcher">
                    <li class="amount-switcher__item">
                        <button class="amount-switcher__operator"
                                @click="amountDecrease(index)"></button>
                    </li>
                    <li class="amount-switcher__item amount-switcher__item_mh_m">
                        <input class="amount-switcher__amount"
                               v-model="item.amount"
                               @input="validateAmount(index)">
                    </li>
                    <li class="amount-switcher__item">
                        <button class="amount-switcher__operator amount-switcher__operator_plus"
                                @click="amountIncrease(index)"></button>
                    </li>
                </menu>
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