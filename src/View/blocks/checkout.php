<section class="checkout">
    <div class="page-title">Оформление заказа</div>
    <div class="container container_checkout">
        <?php $this->renderBlock('cart', ['order' => $order]) ?>
        <form class="form checkout__form js-checkout__form" name="checkout">
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
                               style="width: 220px;">
                    </div>
                </div>
                <div class="table__row">
                    <div class="table__cell">
                        <label class="label" for="user-email">Электронная почта</label>
                    </div>
                    <div class="table__cell">
                        <input class="input"
                               name="user-email"
                               id="user-email"
                               type="email"
                               placeholder="n.petrovich@gmail.com"
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
                               style="width: 130px;">
                    </div>
                </div>
                <div class="table__row">
                    <div class="table__cell">
                        <label class="label label_np" for="delivery-city">Город</label>
                    </div>
                    <div class="table__cell">
                        <input class="input js-delivery-city"
                               id="delivery-city"
                               name="delivery-city"
                               type="search"
                               autocomplete="off"
                               style="width: 390px;">
                    </div>
                </div>
                <div class="table__row">
                    <div class="table__cell">
                        <label class="label" for="delivery-type">Тип доставки</label>
                    </div>
                    <div class="table__cell">
                        <select class="select" name="delivery-type" id="delivery-type" style="width: 140px;">
                            <option value="На отделение">На отделение</option>
                            <option value="На адрес">На адрес</option>
                        </select>
                    </div>
                </div>
                <div class="table__row">
                    <div class="table__cell">
                        <label class="label" for="delivery-warehouse">Отделение Новой Почты</label>
                    </div>
                    <div class="table__cell">
                        <select class="select js-delivery-warehouse" name="delivery-warehouse" id="delivery-warehouse" disabled>
                            <option value="Выберите отделение">Выберите отделение</option>
                        </select>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="checkout__btn-wrapper">
        <a href="/checkout" class="btn btn_accent js-order">Заказать</a>
    </div>
</section>