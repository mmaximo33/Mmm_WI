<?php declare(strict_types=1);
namespace Mmm\SpentSummary\Model\Configuration;

use Magento\Store\Model\StoreManagerInterface;
use Magento\Directory\Model\CurrencyFactory;

/**
 * Get current currency symbol
 */
class Currency
{
    /** @var StoreManagerInterface */
    private $storeConfig;

    /** @var CurrencyFactory */
    private $currencyCode;

    /**
     * Construct.
     *
     * @param StoreManagerInterface $storeConfig
     * @param CurrencyFactory $currencyFactory
     */
    public function __construct(
        StoreManagerInterface $storeConfig,
        CurrencyFactory $currencyFactory
    ) {
        $this->storeConfig = $storeConfig;
        $this->currencyCode = $currencyFactory->create();
    }

    /**
     * Return current symbol for store
     *
     * @return string
     */
    public function getSymbol()
    {
        $currentCurrency = $this->storeConfig->getStore()->getCurrentCurrencyCode();
        $currency = $this->currencyCode->load($currentCurrency);
        return $currency->getCurrencySymbol();
    }
}
