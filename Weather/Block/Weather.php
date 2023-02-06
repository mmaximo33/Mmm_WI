<?php declare(strict_types=1);

namespace Mmm\Weather\Block;

use Magento\Framework\View\Element\Template\Context;
use Mmm\Weather\Model\Configuration\Config;

/**
 * More info page
 *
 * @author      Marucci Maximo <marucci.maximo@gmail.com>
 */
class Weather extends \Magento\Framework\View\Element\Template
{
    /** @var Config */
    private $config;

    /**
     * Constructor
     * 
     * @param Config $config
     * @param Context 
     */
    public function __construct(
        Config $config,
        Context $context,
        array $data = [],
    )
    {
        parent::__construct($context, $data);
        $this->config = $config;
    }

    /**
     * Get API key
     *
     * @return null|string
     */
    public function getApiKey()
    {
        return $this->config->getApiKey();
    }

    /**
     * Get provider used
     *
     * @return null|string
     */
    public function getProvider()
    {
        return $this->config->getProvider();
    }

    /**
     * Get styles
     *
     * @return null|string
     */
    public function getStyles()
    {
        return $this->config->getStyles();
    }
    /**
     * Get speed
     *
     * @return null|string
     */
    public function getSpeed()
    {
        return $this->config->getSpeed();
    }
}