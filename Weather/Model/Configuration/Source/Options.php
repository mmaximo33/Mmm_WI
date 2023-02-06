<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Mmm\Weather\Model\Configuration\Source;

use \Magento\Framework\Data\OptionSourceInterface;

/**
 * Summary of Options
 */
class Options implements OptionSourceInterface
{
  /**
   * Options key, value
   * 
   * @return array
   */
  public function toOptionArray()
  {
    return [
      ['value' => 'temperature_2m', 'label' => __('temperature')],
      ['value' => 'relativehumidity_2m', 'label' => __('relativehumidity')],
      ['value' => 'apparent_temperature', 'label' => __('apparent_temperature')],
      ['value' => 'windgusts_10m', 'label' => __('windgusts')],
    ];
  }
}