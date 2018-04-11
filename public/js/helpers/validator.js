var validator = (function() {
    return {
        checkInteger: function(integer) {
            if (isNaN(integer)) {
                return false;
            }

            return integer % 1 === 0;
        }
    };
})();