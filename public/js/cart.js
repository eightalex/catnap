var cart = (function() {

    var selector = {
        cart__item: '.js-cart__item',
        price: '.js-cart__price',
        summary: '.js-cart__summary'
    };

    function getPrice(currentInput) {
        var priceElem = currentInput.closest(selector.cart__item).querySelector(selector.price);
        return Number(priceElem.innerText);
    }

    function getSummaryElem(currentInput) {
        return currentInput.closest(selector.cart__item).querySelector(selector.summary);
    }

    function setSummary(event) {
        var summaryElem = getSummaryElem(event.detail.currentInput),
            price = getPrice(event.detail.currentInput);

        summaryElem.innerText = price * event.detail.newAmount;
    }

    // todo getTotal
    // todo setTotal

    return {
        init: function() {
            document.addEventListener('changeAmount', setSummary);
        }
    }
})();

cart.init();