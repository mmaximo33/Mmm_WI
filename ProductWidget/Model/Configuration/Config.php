<?php declare(strict_types=1);
namespace Mmm\ProductWidget\Model\Configuration;

use Magento\Store\Model\ScopeInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;

/**
 * Settings manager
 */
class Config
{
    private const SETTING_STYLES = "mmm_productwidget/settings/styles";

    /** @var ScopeConfigInterface */
    private $scopeConfig;

    /**
     * Construct 
     * 
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig
    )
    {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * Get custom styles
     *
     * @return null|string
     */
    public function getStyles()
    {
        return $this->scopeConfig->getValue(
            self::SETTING_STYLES,
            ScopeInterface::SCOPE_STORE
        );
    }
}