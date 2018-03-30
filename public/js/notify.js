var notify = (function() {

    var elem = {
        notify: document.querySelector('.js-notify')
    };

    var config = {
        notifyTimeout: 2500,
        animationDuration: 300
    };

    var modifier = {
        hide: 'notify_hide',
        success: 'notify_success',
        error: 'notify_error'
    };

    var message = {
        'success': {
            1: {
                text: 'Успешно добавлено!'
            }
        },
        'error': {
            1: {
                text: 'Ошибочка при добавлении заказа',
                description: 'error when adding an order'
            }
        },
        'notify': {}
    };

    var state = {
        stopTimeout: null,
        animationTimeout: null
    };

    function stopNotify() {
        elem.notify.classList.add(modifier.hide);

        state.animationTimeout = setTimeout(function() {
            for (var key in modifier) {
                elem.notify.classList.remove(modifier[key]);
            }
            elem.notify.style.display = 'none';
        }, config.animationDuration)
    }

    function runNotify(event) {
        var notifyType = event.detail.notifyType || 'notify',
            currentMessage = message[notifyType][event.detail.messageId];

        clearTimeout(state.stopTimeout);
        clearTimeout(state.animationTimeout);

        switch (notifyType) {
            case 'success':
                elem.notify.classList.add(modifier.success);
                break;
            case 'error':
                elem.notify.classList.add(modifier.error);
                console.error('notify: ' + currentMessage.description);
        }

        elem.notify.innerText = currentMessage.text;
        elem.notify.style.display = 'block';

        state.stopTimeout = setTimeout(stopNotify, config.notifyTimeout);
    }

    return {
        init: function() {
            document.addEventListener('notify', runNotify);
        }
    };
})();

notify.init();