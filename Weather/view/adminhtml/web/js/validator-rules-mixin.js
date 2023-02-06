define([
    'jquery'
], function ($) {
    'use strict';
    return function (target) {
        $.validator.addMethod(
            'openweathermap-apikey',
            function (value) {
                return !(value.length == 31);
            },
            $.mage.__('The API key must have 31 characters')
        );

        $.validator.addMethod(
            'range-speed',
            function (value) {
                return (value >= 1 && value <= 100);
            },
            $.mage.__('Allowed range [1-100]')
        );

        $.validator.addMethod(
            'provider-select',
            function (value) {
                return !(value == 0);
            },
            $.mage.__('You must select a provider')
        );

        // ToDo: Once the providers have been added, disable this rule
        $.validator.addMethod(
            'provider-in-construction',
            function (value) {
                return !(value != 'openmeteocom');
            },
            $.mage.__('We are currently working to incorporate new providers, check the release sheet to see if it is available in the new version')
        );

        return target;
    };
});