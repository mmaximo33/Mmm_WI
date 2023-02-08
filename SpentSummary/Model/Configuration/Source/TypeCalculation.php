<?php declare(strict_types=1);
namespace Mmm\SpentSummary\Model\Configuration\Source;

use \Magento\Framework\Data\OptionSourceInterface;

/**
 * Options type calculation
 */
class TypeCalculation implements OptionSourceInterface
{
    private const CAL_WITH_CREDITMEMO = "withcreditmemo";
    private const CAL_WITHOUT_CREDITMEMO = "withoutcreditmemo";

  /**
   * Options key,value
   *
   * @return array
   */
    public function toOptionArray()
    {
        return [
        ['value' => null, 'label' => __('--Type of calculation--  ')],
        ['value' => self::CAL_WITH_CREDITMEMO, 'label' => __('With CreditMemo')],
        ['value' => self::CAL_WITHOUT_CREDITMEMO, 'label' => __('Without Creditmemo')],
        ];
    }
}
