var cart = (function() {

    var selector = {
        item: '.js-cart__item',
        price: '.js-cart__price',
        summary: '.js-cart__summary'
    };

    var elem = {
        total: document.querySelector('.js-cart__total')
    };

    function getSummaryElem(currentInput) {
        return currentInput.closest(selector.item).querySelector(selector.summary);
    }

    function getAllSummary() {
        var summaryElems = document.querySelectorAll(selector.summary),
            allSummary = 0;

        summaryElems.forEach(function(summaryElem) {
            allSummary += Number(summaryElem.innerText)
        });

        return allSummary;
    }

    function getPrice(currentInput) {
        var priceElem = currentInput.closest(selector.item).querySelector(selector.price);
        return Number(priceElem.innerText);
    }

    function setSummary(args) {
        var summaryElem = getSummaryElem(args.currentInput),
            price = getPrice(args.currentInput);

        summaryElem.innerText = price * args.newAmount;
    }

    function setTotal() {
        elem.total.innerText = getAllSummary();
    }

    function changeAmount(args) {
        cart.publish('setOrder', { id: args.id, action: 'change', newAmount: args.newAmount });
        setSummary(args);
        setTotal();
    }

    return {
        init: function() {
            mediator.installTo(cart);
            mediator.subscribe('changeAmount', changeAmount);
            mediator.subscribe('setTotal', setTotal);
        }
    }
})();

cart.init();