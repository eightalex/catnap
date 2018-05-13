<section class="checkout">
    <div class="page-title">Оформление заказа</div>
    <div class="container">
        <form class="form checkout__form js-checkout__form">
            <fieldset class="form__fieldset">
                <label class="label" for="user-name">Ваше имя</label>
                <input class="input" name="user-name" id="user-name" type="text" placeholder="Алексендр Николаевич">
                <label class="label" for="user-email">Ваша электронная почта</label>
                <input class="input" name="user-email" id="user-email" type="email" placeholder="a.nikolaevich@gmail.com">
                <label class="label" for="user-tel">Ваш телефон</label>
                <input class="input" name="user-tel" id="user-tel" type="tel" placeholder="0635670011" required>
            </fieldset>
            <fieldset class="form__fieldset">
                <label class="label" for="delivery-city">Город доставки</label>
                <select class="select" name="delivery-city" id="delivery-city">
                    <option value="Киев">Киев</option>
                </select>
                <label class="label" for="delivery-type">Тип доставки</label>
                <select class="select" name="delivery-type" id="delivery-type">
                    <option value="На отделение">На отделение</option>
                </select>
                <label class="label" for="delivery-department">Отделение Новой Почты</label>
                <select class="select" name="delivery-department" id="delivery-department">
                    <option value="Выберите отделение">Выберите отделение</option>
                </select>
            </fieldset>
        </form>
        <?php $this->renderBlock('cart', ['order' => $order]) ?>
    </div>
    <div class="checkout__btn-wrapper">
        <a href="/checkout" class="btn btn_accent js-order">Оформить заказ</a>
    </div>
</section>