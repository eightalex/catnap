export default class Order {

    getOrder() {
        const order = localStorage.getItem('userOrder') || '{}';
        return JSON.parse(order);
    }

    getUserOrder() {
        const order = localStorage.getItem('userOrder') || '{}';
        return axios.get('/api/getOrder?order=' + order);
    }

    setOrder(args) {

        let id = args.id,
            action = args.action,
            order = this.getOrder();

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
                // NOTIFY ERROR
            }
        }

        localStorage.setItem('userOrder', JSON.stringify(order));
    }

    sendOrder(e) {
        e.preventDefault();

        var formData = new FormData(document.forms.checkout);
        var xhr = new XMLHttpRequest();

        xhr.open('POST', '/api/sendOrder', true);
        xhr.send(formData);
    }

    getOrderSize() {
        const order = this.getOrder();
        let size = 0;

        for (let key in order) {
            if (order.hasOwnProperty(key)) {
                size += parseInt(order[key], 10);
            }
        }

        return size;
    }
}
