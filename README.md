# MM Modules

## Table of Contents

- [About](#about)
- [Install](#install)
- [Modules](#usage)
  - [Weather Widget](#weather-widget)
  - [Spent Summary](#spent-summary)
  - [Product Widget](#product-widget)

## Instalation

Download this repository and add it in your project path
it should be as follows

```sh
- project
    - app
        - code
            - Mmm
                - Core
                - Weather
                - SpentSummary
                - ProductWidget
```

Enable the modules

```sh
bin/magento module:enable Mmm_Core Mmm_Weather Mmm_SpentSummary Mmm_ProductWidget

bin/magento s:up;bin/magento s:d:c;bin/magento s:s:d -f; bin/magento c:f

```

![result](doc/module_enable.png)

Refresh your browser and go to the back office of your store.

![result](doc/menu.png)

### Modules

#### Weather Widget

This module allows you to add a weather widget based on the location of the visitor.
It is displayed in the head of your store.

**Settings**

To enable the module you must go to
Menu > Mm Module > Weather Widget.
Here you will find the necessary settings to enable and customize this module.

**Warning:** Currently only the open-meteo.com provider is available, soon we will add new ones.
![result](Weather/doc/img/settings.png)

***Frontend**

After installing and enabling the module, the result is displayed as in the following image
![result](Weather/doc/img/frontend.png)

#### Spent Summary

This module is responsible for calculating the total amount spent by a user according to their email.

**Settings**

You can find the configuration of the module from
Menu > MM Module > Spent Summary

**Observation**
In case you want to use this feature in a custom template from the backoffice, you can add the following code to make use of the feature
```
    {{block
        area="frontend"
        class="Mmm\SpentSummary\Block\Order\Email\TotalSpent"
        template="Mmm_SpentSummary::order/onepage/success/total_spent.phtml"
    }}
```

![result](SpentSummary/doc/img/settings.png)

**Frontend**

After installing and enabling the module, the result is displayed as in the following image
![result](SpentSummary/doc/img/frontend.png)
![result](SpentSummary/doc/img/email.png)

#### Product Widget

This module adds a small widget to your store's PDP, where you can enter a small message and customize it as required.

**Settings**

You can find the configuration of the module from
Menu > MM Module > Product Widget
![result](ProductWidget/doc/img/settings.png)
**Frontend**

After installing and enabling the module, the result is displayed as in the following image
![result](ProductWidget/doc/img/frontend.png)