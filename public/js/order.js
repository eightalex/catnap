var order = (function() {

    function getOrder() {
        var order = localStorage.getItem('userOrder') || '{}';
        return JSON.parse(order);
    }

    function getUserOrder() {
        var order = localStorage.getItem('userOrder') || '{}';
        return axios.get('/api/getOrder?order=' + order);
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

        localStorage.setItem('userOrder', JSON.stringify(order));
        mainMenu.publish('updateCartCounter');
    }

    function sendOrder(e) {
        e.preventDefault();

        var formData = new FormData(document.forms.checkout);
        var xhr = new XMLHttpRequest();

        xhr.open('POST', '/api/sendOrder', true);
        xhr.send(formData);
    }

    function getOrderSize() {
        var order = getOrder();
        var size = 0;

        for (var key in order) {
            if (order.hasOwnProperty(key)) {
                size += parseInt(order[key], 10);
            }
        }

        return size;
    }

    return {
        getUserOrder,
        getOrderSize,
        init() {
            var jsOrder = document.querySelector('.js-order');

            mediator.installTo(order);
            mediator.subscribe('setOrder', setOrder);

            if (window.location.pathname === '/cart' && jsOrder) {
                jsOrder.addEventListener('click', sendOrder);
            }
        },
    };
})();

order.init();