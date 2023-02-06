<?php declare(strict_types=1);
namespace Mmm\SpentSummary\Block\Order\OnePage\Success;

use Magento\Framework\View\Element\Template\Context;
use Magento\Checkout\Model\Session;
use Mmm\SpentSummary\Model\Configuration\Config;
use Mmm\SpentSummary\Model\Configuration\Currency;
use Mmm\SpentSummary\Model\Order\CalculateTotalSpent;


class TotalSpent extends \Magento\Framework\View\Element\Template
{

    /** @var Config */
    protected $config;

    /** @var Session */
    private $checkoutSession;

    /** @var CalculateTotalSpent */
    private $calculateTotalSpent;

    /** @var Currency */
    private $currency;

    /**
     * Construct 
     * 
     * @param Context $context
     * @param Config $config
     * @param Session $checkoutSession
     * @param Currency $currency
     * @param CalculateTotalSpent $calculateTotalSpent
     * @param array $data
     */
    public function __construct(
        Context $context,
        Config $config,
        Session $checkoutSession,
        Currency $currency,
        CalculateTotalSpent $calculateTotalSpent,
        array $data = []
    ) {
        $this->checkoutSession = $checkoutSession;
        $this->config = $config;
        $this->currency = $currency;
        $this->calculateTotalSpent = $calculateTotalSpent;
        
        parent::__construct($context, $data);
    }

    /**
     * Get styles
     *
     * @return null|string
     */
    public function getStyles()
    {
        return $this->config->getStylesFrontend();
    }

     /**
     * Symbol currency store
     *
     * @return string
     */
    public function getSymbolCurrency()
    {
        return $this->currency->getSymbol();
    }

    /**
     * Email
     *
     * @return string
     */
    public function getEmailAddress()
    {
        return $this->checkoutSession->getLastRealOrder()->getCustomerEmail();
    }

    /**
     * Calculate the total spent by a customer based on their email address.
     * Return [
     *      'totalSpent' => $totalSpent,
     *      'totalOrders' => $totalOrders,
     *      'totalInvoicedOrders' => $totalInvoicedOrders,
     *      'totalCreditmemo' => $totalCreditmemo
     * ];
     *
     * @return array
     */
    public function getCalculateTotals()
    {
        $totalAmounts = $this->calculateTotalSpent->calculateTotalAmounts($this->getEmailAddress());
        return $totalAmounts;
    }
} 