<template>
    <form class="checkout-form form" name="checkout">
        <div class="table checkout__table">
            <div class="table__row">
                <div class="table__cell">
                    <label class="label" for="user-name">Имя и фамилия</label>
                </div>
                <div class="table__cell">
                    <input class="input"
                           name="user-name"
                           id="user-name"
                           type="text"
                           placeholder="Николай Петрович"
                           autofocus
                           v-model="name"
                           @keyup="checkName"
                           style="width: 220px;">
                </div>
            </div>
            <div class="table__row">
                <div class="table__cell">
                    <label class="label" for="user-email">
                        Электронная почта
                        <span class="label__description">(не обязательно)</span>
                    </label>
                </div>
                <div class="table__cell">
                    <input class="input"
                           name="user-email"
                           id="user-email"
                           type="email"
                           placeholder="n.petrovich@gmail.com"
                           v-model="email"
                           @keyup="checkEmail"
                           style="width: 220px;">
                </div>
            </div>
            <div class="table__row">
                <div class="table__cell">
                    <label class="label" for="user-tel">Телефон</label>
                </div>
                <div class="table__cell">
                    <input class="input"
                           name="user-tel"
                           id="user-tel"
                           type="tel"
                           placeholder="0635670011"
                           required
                           v-model="phone"
                           @keyup="checkPhone"
                           style="width: 130px;">
                </div>
            </div>
            <div class="table__row">
                <div class="table__cell">
                    <label class="label label_np" for="delivery-city">Город</label>
                </div>
                <div class="table__cell">
                    <input class="input"
                           id="delivery-city"
                           name="delivery-city"
                           type="search"
                           autocomplete="off"
                           placeholder="Киев"
                           v-model="city"
                           @keyup="checkCity"
                           style="width: 290px;">
                </div>
            </div>
            <div class="table__row">
                <div class="table__cell">
                    <label class="label" for="delivery-warehouse">Отделение Новой Почты</label>
                </div>
                <div class="table__cell">
                    <select class="select"
                            name="delivery-warehouse"
                            id="delivery-warehouse"
                            v-model="warehouse"
                            @keyup="checkWarehouse"
                            disabled>
                        <option value="Выберите отделение">Выберите отделение</option>
                    </select>
                </div>
            </div>
        </div>
    </form>
</template>

<script>
    const MIN_LENGTH = {
        name: 2,
        email: 3,
        phone: 10,
        city: 1,
        warehouse: 1
    };

    const TWO_SECONDS = 2000;
    const CLASS_ERROR = 'error';

    export default {
        name: 'CheckoutForm',

        data() {
            return {
                name: '',
                email: '',
                phone: '',
                city: '',
                warehouse: '',
            }
        },

        methods: {

            showError(elem) {
                setTimeout(function() {
                    elem.classList.add(CLASS_ERROR);
                }, TWO_SECONDS);
            },

            hideError(elem) {
                elem.classList.remove(CLASS_ERROR);
            },

            checkName(e) {
                const check = this.name && this.name.length >= MIN_LENGTH.name;

                if (!check) {
                    this.showError(e.target);
                } else {
                    this.hideError(e.target);
                }
            },

            checkEmail() {
                const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(String(this.email).toLowerCase());
            },

            checkPhone() {
                return true;
            },

            checkCity() {
                return true;
            },

            checkWarehouse() {
                return true;
            },

            errorOfCheck(inputName) {
                throw new Error('Error of validation ' + inputName);
            }

        }
    }
</script>