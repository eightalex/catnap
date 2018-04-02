var item = (function() {

    var elem = {
        orderNowBtn: document.querySelector('.js-order-now')
    };

    var config = {
        twoDays: 3600 * 24 * 2
    };

    function dispatchSuccess() {
        var event = new CustomEvent('notify', {
            detail: {
                'notifyType': 'success',
                'messageId': 1
            }
        });

        document.dispatchEvent(event);
    }

    function dispatchError() {
        var event = new CustomEvent('notify', {
            detail: {
                'notifyType': 'error',
                'messageId': 1
            }
        });

        document.dispatchEvent(event);
    }

    function getUpdatedOrder() {
        var order = getCookie('order') || '{}',
            id = elem.orderNowBtn.dataset.id;

        order = JSON.parse(order);

        if (order['item' + id] !== undefined) {
            order['item' + id]++;
        } else {
            order['item' + id] = 1;
        }

        return order;
    }

    function setItemToOrder() {
        var updatedOrder = getUpdatedOrder();

        try {
            setCookie('order', JSON.stringify(updatedOrder), { expires: config.twoDays });
            dispatchSuccess();
        } catch(e) {
            dispatchError();
            console.error(e.name + ": " + e.message + "\n" + e.stack);
        }
    }

    return {
        init: function() {
            elem.orderNowBtn.addEventListener('click', setItemToOrder);
        }
    }
})();

item.init();