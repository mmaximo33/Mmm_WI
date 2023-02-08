<?php declare(strict_types=1);

namespace Mmm\Weather\Model\Configuration;

use Magento\Store\Model\ScopeInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;

/**
 * Settings manager
 */
class Config
{
    private const SETTING_ENABLE = 'mmm_weather/settings/enable';
    private const SETTING_APIKEY = 'mmm_weather/settings/apikey';
    private const SETTING_PROVIDER = 'mmm_weather/settings/provider';
    private const SETTING_STYLES = 'mmm_weather/settings/styles';
    private const SETTING_SPEED = 'mmm_weather/settings/speed';

    /** @var ScopeConfigInterface */
    private $scopeConfig;

    /**
     * Constructor
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
     * Get API key
     *
     * @return null|string
     */
    public function getApiKey()
    {
        return $this->scopeConfig->getValue(
            self::SETTING_APIKEY,
            ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * Get provider used
     *
     * @return null|string
     */
    public function getProvider()
    {
        return $this->scopeConfig->getValue(
            self::SETTING_PROVIDER,
            ScopeInterface::SCOPE_STORE
        );
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

    /**
     * Get speed widget
     *
     * @return null|string
     */
    public function getSpeed()
    {
        return $this->scopeConfig->getValue(
            self::SETTING_SPEED,
            ScopeInterface::SCOPE_STORE
        );
    }
}
