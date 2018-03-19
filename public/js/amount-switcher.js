var amountSwitcher = (function() {
    var elem = {
        minus: document.querySelector('.js_amount-switcher__minus'),
        amount: document.querySelector('.js_amount-switcher__amount'),
        plus: document.querySelector('.js_amount-switcher__plus')
    };

    var config = {
        minNumber: 1,
        maxNumber: 10
    };

    function getAmount() {
        return Number(elem.amount.value);
    }

    function setAmount(newAmount) {
        elem.amount.value = newAmount;
    }

    function validateAmount(number) {
        if (isNaN(number)) {
            return false;
        }

        if (number % 1 !== 0) {
            return false;
        }

        return true;
    }

    function handleChangeAmount() {
        var currentAmount = getAmount();

        if (currentAmount < config.minNumber) {
            setAmount(config.minNumber);
        }

        if (currentAmount > config.maxNumber) {
            setAmount(config.maxNumber);
        }
    }

    function handleClickMinus() {
        var currentAmount = getAmount();

        if (!validateAmount(currentAmount)) {
            return;
        }

        if (currentAmount === config.minNumber) {
            return false;
        }

        setAmount(--currentAmount);
    }

    function handleClickPlus() {
        var currentAmount = getAmount();

        if (!validateAmount(currentAmount)) {
            return;
        }

        if (currentAmount === config.maxNumber) {
            return false;
        }

        setAmount(++currentAmount);
    }

    return {
        init: function() {
            elem.amount.addEventListener('change', handleChangeAmount);
            elem.minus.addEventListener('click', handleClickMinus);
            elem.plus.addEventListener('click', handleClickPlus);
        }
    }
})();

amountSwitcher.init();