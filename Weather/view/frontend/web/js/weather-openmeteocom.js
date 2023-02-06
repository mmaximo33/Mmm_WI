define([
    'jquery'
], function ($) {
    'use strict';
    return function (config, element) {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                var latitude = position.coords.latitude;
                var longitude = position.coords.longitude;

                $.ajax({
                    url: 'https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=' + latitude + '&lon=' + longitude,
                    success: function (data) {
                        $("#mmm-weather-point").html(data.address.suburb + ', ' + data.address.city);
                    },
                    error: function () {
                        var location = document.getElementById("mmm-weather-location");
                        location.style.display = 'none';
                    }
                });

                var lat = 'latitude=' + latitude;
                var long = '&longitude=' + longitude;
                var params2 = encodeURI('&hourly=temperature_2m,relativehumidity_2m,apparent_temperature,windgusts_10m');
                $.ajax({
                    url: 'https://api.open-meteo.com/v1/forecast',
                    data: lat + long + params2,
                    success: function (data) {
                        var tmp = data.hourly.temperature_2m.at(-1);
                        $("#mmm-weather-temperature").html(tmp + data.hourly_units.temperature_2m);
                        $("#mmm-weather-humidity").html(data.hourly.relativehumidity_2m.at(-1) + data.hourly_units.relativehumidity_2m);
                        $("#mmm-weather-apparent_temperature").html(+ data.hourly.apparent_temperature.at(-1) + data.hourly_units.apparent_temperature);
                        $("#mmm-weather-windgusts").html(data.hourly.windgusts_10m.at(-1) + data.hourly_units.windgusts_10m);

                        var msg;
                        switch (true) {
                            case (tmp < 0):
                                msg = $.mage.__("Hoy no te olvides de la campera, gorro y bufanda en");
                                break;
                            case (tmp < 10):
                                msg = $.mage.__("Hoy con campera es suficiente en");
                                break;
                            case (tmp < 20):
                                msg = $.mage.__("Hoy solo llevamos sueter en");
                                break;
                            default:
                                msg = $.mage.__("Hoy se disfruta sin sueter en");
                                break;
                        }
                        $("#mmm-weather-message").html(msg);
                    }
                });
            });
        } else {
            $(element).style.display = 'none';
        }
    };
});

