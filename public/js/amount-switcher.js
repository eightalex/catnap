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
        maxNumber: 500
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

    function publishAmount(currentInput, newAmount) {
        amountSwitcher.publish('changeAmount', {
            currentInput: currentInput,
            newAmount: newAmount
        });
    }

    function validateAmount(number) {
        if (number < config.minNumber ||
            number > config.maxNumber) {
            return false;
        }

        return validator.checkInteger(number); // TODO call through mediator
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
            newAmount = state.currentAmount;
        } else if (newAmount < config.minNumber) {
            setAmount(currentInput, config.minNumber);
        } else if (newAmount > config.maxNumber) {
            setAmount(currentInput, config.maxNumber);
        }

        publishAmount(currentInput, newAmount);
    }

    function handleClickMinus() {
        var currentInput = getInput(this),
            newAmount = getAmount(currentInput) - 1;

        if (!validateAmount(newAmount)) {
            return;
        }

        setAmount(currentInput, newAmount);
        publishAmount(currentInput, newAmount);
    }

    function handleClickPlus() {
        var currentInput = getInput(this),
            newAmount = getAmount(currentInput) + 1;

        if (!validateAmount(newAmount)) {
            return;
        }

        setAmount(currentInput, newAmount);
        publishAmount(currentInput, newAmount);
    }

    return {
        init: function() {
            mediator.installTo(amountSwitcher);

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