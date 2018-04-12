var order = (function() {

    var config = {
        root: '/',
        twoDays: 3600 * 24 * 2
    };

    function getOrder() {
        var order = cookieEditor.get('order') || '{}'; // TODO get through mediator
        return JSON.parse(order);
    }

    function setOrder(args) {
        var order = getOrder();
        var id = args.id,
            action = args.action,
            changer = args.changer || null;

        if (order[id] === undefined) {
            order[id] = 1;
        } else {
            switch(action) {
                case 'increase':
                    order[id] += changer;
                    break;
                case 'decrease':
                    order[id] -= changer;
                    break;
                case 'delete':
                    delete order[id];
                    break;
            }

            if (action !== 'delete' && !validator.checkInteger(order[id])) {
                order[id] = 1;
                item.publish('notify', { notifyType: 'error', messageId: 1 });
            }
        }

        cookieEditor.set('order', JSON.stringify(order), {
            path: config.root,
            expires: config.twoDays
        });
    }

    return {
        init: function() {
            mediator.installTo(order);
            mediator.subscribe('setOrder', setOrder);
        }
    };
})();

order.init();