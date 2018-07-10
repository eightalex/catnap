var np = (function() {

    var state = {
        cities: {}
    };

    var elem = {
        warehousesSelect: document.querySelector('.js-delivery-warehouse')
    };

    function getCities() {
        var xhr = new XMLHttpRequest();

        xhr.open('POST', '/api/getNPCities', true);
        xhr.send();

        xhr.onreadystatechange = function() {
            if (xhr.readyState !== 4) return;

            if (xhr.status !== 200) {
                console.error(xhr.status + ': ' + xhr.statusText);
            } else {
                state.cities = JSON.parse(xhr.responseText);

                var cities = state.cities.map(function(city) {
                    return city.DescriptionRu;
                });

                initAutocomplete(cities);
            }
        }
    }

    function initAutocomplete(cities) {
        new autoComplete({
            selector: '.js-delivery-city',
            minChars: 1,
            source: function(term, response) {
                term = term.toLowerCase();

                var matches = [];

                for (var i = 0; i < cities.length; i++) {
                    if (cities[i].toLowerCase().indexOf(term) !== -1) {
                        matches.push(cities[i]);
                    }
                }

                response(matches);
            },
            onSelect: function(event, cityName, item) {
                var city = state.cities.filter(function(city) {
                    return city.DescriptionRu === cityName;
                })[0];

                getWarehouses(city.Ref, city.CityID);
            }
        });
    }

    function getWarehouses(cityRef, cityID) {
        var xhr = new XMLHttpRequest();

        var body = 'cityRef=' + encodeURIComponent(cityRef)
            + '&CityID=' + encodeURIComponent(cityID);

        xhr.open('POST', '/api/getNPWarehouses', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.send(body);

        xhr.onreadystatechange = function() {
            if (xhr.readyState !== 4) return;

            if (xhr.status !== 200) {
                console.error(xhr.status + ': ' + xhr.statusText);
            } else {
                var warehouses = JSON.parse(xhr.responseText);
                showWarehouses(warehouses);
            }
        }
    }

    function showWarehouses(warehouses) {
        var html = '';

        warehouses.forEach(function(warehouse) {
            html += '<option value="'+warehouse.DescriptionRu+'">' + warehouse.DescriptionRu + '</option>';
        });

        elem.warehousesSelect.disabled = false;
        elem.warehousesSelect.innerHTML = html;
    }

    return {
        init: function() {
            getCities();
        }
    }
})();

np.init();