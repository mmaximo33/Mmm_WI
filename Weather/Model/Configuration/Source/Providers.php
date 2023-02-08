<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Mmm\Weather\Model\Configuration\Source;

use \Magento\Framework\Data\OptionSourceInterface;

/**
 * Summary of Providers
 */
class Providers implements OptionSourceInterface
{
  /**
   * Options key, value
   *
   * @return array
   */
    public function toOptionArray()
    {
        return [
        ['value' => 'null', 'label' => __('-- Select Provider --  ')],
        ['value' => 'openmeteocom', 'label' => __('open-meteo.com')],
        ['value' => 'openweathermaporg', 'label' => __('openweathermap.org')],
        ];
    }
}
