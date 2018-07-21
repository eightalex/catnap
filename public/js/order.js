var order = (function() {

    var ROOT = '/';
    var TWO_DAYS = 3600 * 24 * 2;

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
                order.publish('notify', { notifyType: 'error', messageId: 1 });
            }
        }

        cookieEditor.set('order', JSON.stringify(order), {
            path: ROOT,
            expires: TWO_DAYS
        });

        mainMenu.publish('updateCartCounter');
    }

    function sendOrder(e) {
        e.preventDefault();

        var formData = new FormData(document.forms.checkout);
        var xhr = new XMLHttpRequest();

        xhr.open('POST', '/api/sendOrder', true);
        xhr.send(formData);
    }

    return {
        init: function() {
            mediator.installTo(order);
            mediator.subscribe('setOrder', setOrder);

            if (window.location.pathname === '/cart') {
                document.querySelector('.js-order').addEventListener('click', sendOrder);
            }
        },

        getOrderSize: function() {
            var order = getOrder();
            var size = 0;

            for (var key in order) {
                if (order.hasOwnProperty(key)) {
                    size += parseInt(order[key], 10);
                }
            }

            return size;
        }
    };
})();

order.init();