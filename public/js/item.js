var item = (function() {

    var elem = {
        orderNowBtn: document.querySelector('.js-order-now')
    };

    var config = {
        addOrderUrl: '/order/add'
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

    function setItemToOrder() {
        fetch(config.addOrderUrl, {
            method: 'post',
            headers: {
                'Accept': 'application/json, text/plain, */*',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ itemId: 1 })
        })
            .then(function(response) {
                if (response.ok) {
                    dispatchSuccess();
                } else {
                    dispatchError();
                }
            })
            .catch(function(error) {
                dispatchError();
                console.error('Request failed', error);
            });
    }

    return {
        init: function() {
            elem.orderNowBtn.addEventListener('click', setItemToOrder);
        }
    }
})();

item.init();