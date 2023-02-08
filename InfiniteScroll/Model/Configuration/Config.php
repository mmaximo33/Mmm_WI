<?php declare(strict_types=1);

namespace Mmm\InfiniteScroll\Model\Configuration;

use Magento\Store\Model\ScopeInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;

/**
 * Settings manager
 */
class Config
{
    private const SETTING_ENABLE = "mmm_infinitescroll/settings/enable";
    private const SETTING_BEHAVIOR_DELAY = "mmm_infinitescroll/settings_behavior/delay";
    private const SETTING_BEHAVIOR_CONTENT = "mmm_infinitescroll/settings_behavior/content";
    private const SETTING_BEHAVIOR_PAGINATION = "mmm_infinitescroll/settings_behavior/pagination";
    private const SETTING_BEHAVIOR_NEXT = "mmm_infinitescroll/settings_behavior/next";
    private const SETTING_BEHAVIOR_ITEM = "mmm_infinitescroll/settings_behavior/item";
    private const SETTING_FRONTNEND_LOADING_TEXT = "mmm_infinitescroll/settings_frontend/loading_text";
    private const SETTING_FRONTNEND_DONE_TEXT = "mmm_infinitescroll/settings_frontend/done_text";
    private const SETTING_FRONTNEND_LOAD_MORE = "mmm_infinitescroll/settings_frontend/load_more";
    private const SETTING_FRONTNEND_LOAD_MORE_TEXT = "mmm_infinitescroll/settings_frontend/load_more_text";

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
     * Get all configurations
     *
     * @return array
     */
    public function getAllConfigs()
    {
        $paths = [
            self::SETTING_ENABLE,
            self::SETTING_BEHAVIOR_DELAY,
            self::SETTING_BEHAVIOR_CONTENT,
            self::SETTING_BEHAVIOR_PAGINATION,
            self::SETTING_BEHAVIOR_NEXT,
            self::SETTING_BEHAVIOR_ITEM,
            self::SETTING_FRONTNEND_LOADING_TEXT,
            self::SETTING_FRONTNEND_DONE_TEXT,
            self::SETTING_FRONTNEND_LOAD_MORE,
            self::SETTING_FRONTNEND_LOAD_MORE_TEXT
        ];
        foreach ($paths as $path) {
            $parts = explode('/', $path);
            $key = end($parts);
            $cfgs[$key] = $this->getConfig(
                $path
            );
        }
        return $cfgs;
    }

    /**
     * General get config
     *
     * @param string $path
     * @return null|string
     */
    private function getConfig($path)
    {
        return $this->scopeConfig->getValue(
            $path,
            ScopeInterface::SCOPE_STORE
        );
    }
}
