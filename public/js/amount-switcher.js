var amountSwitcher = (function() {
    var elem = {
        minus: document.querySelector('.js_amount-switcher__minus'),
        amount: document.querySelector('.js_amount-switcher__amount'),
        plus: document.querySelector('.js_amount-switcher__plus')
    };

    var config = {
        minNumber: 1,
        maxNumber: 90
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

        if (number < config.minNumber &&
            number > config.maxNumber) {
            return false;
        }

        return number % 1 === 0;
    }

    function handleChangeAmount() {
        var currentAmount = getAmount();

        if (currentAmount < config.minNumber) {
            setAmount(config.minNumber);
        } else if (currentAmount > config.maxNumber) {
            setAmount(config.maxNumber);
        }
    }

    function handleClickMinus() {
        var currentAmount = getAmount();

        if (!validateAmount(currentAmount)) {
            return;
        }

        setAmount(--currentAmount);
    }

    function handleClickPlus() {
        var currentAmount = getAmount();

        if (!validateAmount(currentAmount)) {
            return;
        }

        setAmount(++currentAmount);
    }

    return {
        init: function() {
            // TODO add listener to all elems
            elem.amount.addEventListener('change', handleChangeAmount);
            elem.minus.addEventListener('click', handleClickMinus);
            elem.plus.addEventListener('click', handleClickPlus);
        }
    }
})();

amountSwitcher.init();