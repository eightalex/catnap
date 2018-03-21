var amountSwitcher = (function() {
    var selector = {
        minus: '.js-amount-switcher__minus',
        amount: '.js-amount-switcher__amount',
        plus: '.js-amount-switcher__plus'
    };

    var elem = {
        switchers: document.querySelectorAll('.js-amount-switcher')
    };

    var config = {
        minNumber: 1,
        maxNumber: 10
    };

    function getInput(target) {
        return target.nodeName === 'INPUT'
            ? target
            : target.parentNode.parentNode.querySelector(selector.amount);
    }

    function getAmount(input) {
        return Number(input.value);
    }

    function setAmount(input, newAmount) {
        input.value = newAmount;
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

    function handleChangeAmount() {
        var currentInput = getInput(this),
            currentAmount = getAmount(currentInput);

        if (currentAmount < config.minNumber) {
            setAmount(currentInput, config.minNumber);
        } else if (currentAmount > config.maxNumber) {
            setAmount(currentInput, config.maxNumber);
        }
    }

    function handleClickMinus() {
        var currentInput = getInput(this),
            newAmount = getAmount(currentInput) - 1;

        if (!validateAmount(newAmount)) {
            return;
        }

        setAmount(currentInput, newAmount);
    }

    function handleClickPlus() {
        var currentInput = getInput(this),
            newAmount = getAmount(currentInput) + 1;

        if (!validateAmount(newAmount)) {
            return;
        }

        setAmount(currentInput, newAmount);
    }

    return {
        init: function() {
            elem.switchers.forEach(function(switcher) {
                switcher.querySelector(selector.amount).addEventListener('change', handleChangeAmount);
                switcher.querySelector(selector.minus).addEventListener('click', handleClickMinus);
                switcher.querySelector(selector.plus).addEventListener('click', handleClickPlus);
            });
        }
    }
})();

amountSwitcher.init();