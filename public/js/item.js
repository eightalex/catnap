var item = (function() {

    var elem = {
        orderNowBtn: document.querySelector('.js-order-now'),
        removeBtns: document.querySelectorAll('.js-cart__remove')
    };

    function setItemToOrder(event) {
        try {
            item.publish('setOrder', { id: elem.orderNowBtn.dataset.id, action: 'increase' });
            item.publish('notify', { notifyType: 'success', messageId: 1 });
            item.publish('signalBtn', { btn: event.target });
        } catch(e) {
            item.publish('notify', { notifyType: 'error', messageId: 1 });
            console.error(e.name + ": " + e.message + "\n" + e.stack);
        }
    }

    function removeItem(event) {
        event.target.parentNode.remove();
        item.publish('setOrder', { id: event.target.dataset.id, action: 'delete' });
        item.publish('setTotal');
        // TODO if 0 items reset cart
    }

    return {
        init: function() {
            mediator.installTo(item);

            if (elem.orderNowBtn) {
                elem.orderNowBtn.addEventListener('click', setItemToOrder);
            }

            if (elem.removeBtns) {
                elem.removeBtns.forEach(function(removeBtn) {
                    removeBtn.addEventListener('click', removeItem);
                });
            }
        }
    }
})();

item.init();