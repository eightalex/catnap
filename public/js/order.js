var order = (function() {

    var config = {
        root: '/',
        twoDays: 3600 * 24 * 2
    };

    function getOrder() {
        var order = cookieEditor.get('order') || '{}';
        return JSON.parse(order);
    }

    function setOrder(args) {

        var id = args.id,
            action = args.action,
            order = getOrder();

        if (order[id] === undefined)
        {
            order[id] = 1;
        }
        else
        {
            order[id] = Number(order[id]);

            switch (action) {
                case 'increase':
                    order[id] += 1;
                    break;
                case 'change':
                    order[id] = args.newAmount || null;
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

    function sendOrder(e) {
        e.preventDefault();

        var form = document.querySelector('.js-checkout__form');
        var formData = new FormData(form);
        var xhr = new XMLHttpRequest();

        xhr.open('POST', '/api/sendOrder', true);
        xhr.send(formData);
    }

    return {
        init: function() {
            mediator.installTo(order);
            mediator.subscribe('setOrder', setOrder);

            serializeCart();
            document.querySelector('.js-order').addEventListener('click', sendOrder);
        }
    };
})();

order.init();