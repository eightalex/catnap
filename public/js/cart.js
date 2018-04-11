var cart = (function() {

    var selector = {
        item: '.js-cart__item',
        price: '.js-cart__price',
        summary: '.js-cart__summary'
    };

    var elem = {
        total: document.querySelector('.js-cart__total'),
        removeBtns: document.querySelectorAll('.js-cart__remove')
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
        setSummary(args);
        setTotal();
    }

    function deleteItemCookies(id) { // TODO move method to Item
        var order = cookieEditor.get('order') || '{}'; // TODO get through mediator

        order = JSON.parse(order);

        delete order['item' + id];

        order.set(order); // TODO set through mediator
    }

    function removeItem(target) { // TODO move method to Item
        deleteItemCookies(target.dataset.id);
        target.parentNode.remove();
    }

    return {
        init: function() {
            mediator.installTo(cart);
            mediator.subscribe('changeAmount', changeAmount);

            elem.removeBtns.forEach(function(removeBtn) {
                removeBtn.addEventListener('click', function(event) {
                    removeItem(event.target);
                    setTotal();
                    // TODO if 0 items reset cart
                });
            });
        }
    }
})();

cart.init();