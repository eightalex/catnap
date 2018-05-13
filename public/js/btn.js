var btn = (function() {

    function signalBtn(args) {
        var _btn = args.btn || undefined;

        if (_btn) {
            _btn.classList.add('btn_signal');
            _btn.addEventListener('animationend', function() {
                _btn.classList.remove('btn_signal');
            });
        }
    }

    return {
        init: function() {
            mediator.installTo(btn);
            mediator.subscribe('signalBtn', signalBtn);
        }
    }
})();

btn.init();