var item = (function() {

    var elem = {
        orderNowBtn: document.querySelector('.js-order-now')
    };

    function setItemToOrder() {
        try {
            item.publish('setOrder', { id: elem.orderNowBtn.dataset.id, action: 'increase', changer: 1 });
            item.publish('notify', { notifyType: 'success', messageId: 1 });
        } catch(e) {
            item.publish('notify', { notifyType: 'error', messageId: 1 });
            console.error(e.name + ": " + e.message + "\n" + e.stack);
        }
    }

    return {
        init: function() {
            mediator.installTo(item);
            elem.orderNowBtn.addEventListener('click', setItemToOrder);
        }
    }
})();

item.init();