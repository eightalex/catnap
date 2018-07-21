var mainMenu = (function() {

    var elem = {
        cartCounter: document.querySelector('.js-cart-counter')
    };

    function highlightItem() {
        var slug = document.location.pathname.slice(1);
        var item = document.querySelector('[data-slug="' + slug + '"]');

        console.log(item);

        if (item) {
            item.classList.add('main-menu__item_active');
        }
    }

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

            highlightItem();
            updateCartCounter();
        }
    }
})();

mainMenu.init();