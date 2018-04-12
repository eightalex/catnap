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
        hideTimeout: null,
        animationTimeout: null
    };

    function resetTimeouts() {
        clearTimeout(state.animationTimeout);
        clearTimeout(state.hideTimeout);
    }

    function hideNotify() {
        elem.notify.classList.add(modifier.hide);

        state.animationTimeout = setTimeout(function() {
            for (var key in modifier) {
                elem.notify.classList.remove(modifier[key]);
            }
            elem.notify.style.display = 'none';
        }, config.animationDuration)
    }

    function showNotify(args) {
        var notifyType = args.notifyType || 'notify',
            currentMessage = message[notifyType][args.messageId];

        switch (notifyType) {
            case 'success':
                elem.notify.classList.add(modifier.success);
                break;
            case 'error':
                elem.notify.classList.add(modifier.error);
                console.error('notify: ' + currentMessage.description);
                console.trace();
        }

        elem.notify.innerText = currentMessage.text;
        elem.notify.style.display = 'block';
    }

    function runNotify(args) {
        resetTimeouts();
        showNotify(args);
        state.hideTimeout = setTimeout(hideNotify, config.notifyTimeout);
    }

    return {
        init: function() {
            mediator.installTo(notify);
            mediator.subscribe('notify', runNotify);
        }
    };
})();

notify.init();