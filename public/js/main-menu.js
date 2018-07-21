var mainMenu = (function() {

    var elem = {
        cartCounter: document.querySelector('.js-cart-counter')
    };

    function updateCartCounter() {
        var orderSize = order.getOrderSize();

        if (orderSize) {
            elem.cartCounter.classList.add('cart-counter_show');
        } else {
            elem.cartCounter.classList.remove('cart-counter_show');
        }

        elem.cartCounter.dataset.counter = orderSize;
    }

    return {
        init: function() {
            mediator.installTo(mainMenu);
            mainMenu.subscribe('updateCartCounter', updateCartCounter);

            updateCartCounter();
        }
    }
})();

mainMenu.init();