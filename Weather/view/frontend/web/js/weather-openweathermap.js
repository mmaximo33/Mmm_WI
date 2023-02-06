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
                    url: 'https://api.openweathermap.org/data/3.0/onecall',
                    data: {
                        lat: latitude,
                        lon: longitude,
                        appid: config.apiKey,
                        exclude: 'hourly,daily'
                    },
                    success: function (data) {
                        var currentWeather = data.current_weather;
                        var temperature = currentWeather.temperature;
                        var windspeed = currentWeather.windspeed;
                        //var winddirection = currentWeather.winddirection;
                        $("#mmm-weather-temperature").html(temperature);
                        $("#mmm-weather-windgusts").html(windspeed);
                    }
                });
            });
        } else {
            $(element).style.display = 'none';
        }
    };
});

