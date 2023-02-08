<?php declare(strict_types=1);

namespace Mmm\InfiniteScroll\Block;

use \Magento\Framework\View\Element\Template\Context;
use \Magento\Store\Model\StoreManagerInterface;
use \Mmm\InfiniteScroll\Model\Configuration\Config;

class InfiniteScroll extends \Magento\Framework\View\Element\Template
{

    /** @var StoreManagerInterface */
    private $storeManager;

    /** @var Config */
    private $configmodule;

    /**
     * Construct
     *
     * @param Context $context
     * @param StoreManagerInterface $storeManager
     * @param Config $configmodule
     * @param array $data
     */
    public function __construct(
        Context $context,
        StoreManagerInterface $storeManager,
        Config $configmodule,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->storeManager = $storeManager;
        $this->configmodule = $configmodule;
    }

    /**
     * Get all configurations
     *
     * @return array
     */
    public function getSettings()
    {
        return $this->configmodule->getAllConfigs();
    }

    /**
     * Get gif
     *
     * ToDo: Review to customize the GIF by uploading it from backoffice
     */
}
