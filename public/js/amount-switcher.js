var amountSwitcher = (function() {

    var selector = {
        switcher: '.js-amount-switcher',
        minus: '.js-amount-switcher__minus',
        amount: '.js-amount-switcher__amount',
        plus: '.js-amount-switcher__plus'
    };

    var elem = {
        switchers: document.querySelectorAll(selector.switcher)
    };

    var config = {
        minNumber: 1,
        maxNumber: 10
    };

    var state = {
        currentAmount: 1
    };

    function getInput(target) {
        if (target.nodeName === 'INPUT') {
            return target;
        } else {
            return target.closest(selector.switcher).querySelector(selector.amount);
        }
    }

    function getAmount(input) {
        return Number(input.value);
    }

    function setAmount(input, newAmount) {
        input.value = newAmount;
    }

    function dispatchAmount(currentInput, newAmount) {
        var event = new CustomEvent('changeAmount', {
            detail: {
                'currentInput': currentInput,
                'newAmount': newAmount
            }
        });

        document.dispatchEvent(event);
    }

    function validateAmount(number) {
        if (isNaN(number)) {
            return false;
        }

        if (number < config.minNumber ||
            number > config.maxNumber) {
            return false;
        }

        return number % 1 === 0;
    }

    function handleFocusAmount(event) {
        var currentAmount = event.target.value;

        if (!validateAmount(currentAmount)) {
            return;
        }

        state.currentAmount = currentAmount;
    }

    function handleChangeAmount(event) {
        var currentInput = getInput(this),
            newAmount = event.target.value;

        if (!validateAmount(newAmount)) {
            setAmount(currentInput, state.currentAmount);
            return;
        } else if (newAmount < config.minNumber) {
            setAmount(currentInput, config.minNumber);
        } else if (newAmount > config.maxNumber) {
            setAmount(currentInput, config.maxNumber);
        }

        dispatchAmount(currentInput, newAmount);
    }

    function handleClickMinus() {
        var currentInput = getInput(this),
            newAmount = getAmount(currentInput) - 1;

        if (!validateAmount(newAmount)) {
            return;
        }

        setAmount(currentInput, newAmount);
        dispatchAmount(currentInput, newAmount);
    }

    function handleClickPlus() {
        var currentInput = getInput(this),
            newAmount = getAmount(currentInput) + 1;

        if (!validateAmount(newAmount)) {
            return;
        }

        setAmount(currentInput, newAmount);
        dispatchAmount(currentInput, newAmount);
    }

    return {
        init: function() {
            // todo set config.minNumber to input.value

            elem.switchers.forEach(function(switcher) {
                switcher.querySelector(selector.amount).addEventListener('focus', handleFocusAmount);
                switcher.querySelector(selector.amount).addEventListener('change', handleChangeAmount);
                switcher.querySelector(selector.minus).addEventListener('click', handleClickMinus);
                switcher.querySelector(selector.plus).addEventListener('click', handleClickPlus);
            });
        }
    }
})();

amountSwitcher.init();