<?php declare(strict_types=1);
namespace Mmm\SpentSummary\Model\Configuration;

use Magento\Store\Model\ScopeInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;

/**
 * Settings manager
 */
class Config
{
    private const SETTING_ENABLE = "mmm_spentsummary/settings/enable";
    private const SETTING_CALCULATE = "mmm_spentsummary/settings/calculate";
    private const SETTING_STYLES_FRONTEND = "mmm_spentsummary/settings/styles_frontend";
    private const SETTING_STYLES_EMAIL = "mmm_spentsummary/settings/styles_email";

    /** @var ScopeConfigInterface */
    private $scopeConfig;

    /**
     * Construct
     *
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * Get Enable/Disable
     *
     * @return null|string
     */
    public function getEnable()
    {
        return $this->scopeConfig->getValue(
            self::SETTING_ENABLE,
            ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * Get custom styles
     *
     * @return null|string
     */
    public function getTypeCalculate()
    {
        return $this->scopeConfig->getValue(
            self::SETTING_CALCULATE,
            ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * Get custom styles
     *
     * @return null|string
     */
    public function getStylesFrontEnd()
    {
        return $this->scopeConfig->getValue(
            self::SETTING_STYLES_FRONTEND,
            ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * Get custom styles
     *
     * @return null|string
     */
    public function getStylesEmail()
    {
        return $this->scopeConfig->getValue(
            self::SETTING_STYLES_EMAIL,
            ScopeInterface::SCOPE_STORE
        );
    }
}
