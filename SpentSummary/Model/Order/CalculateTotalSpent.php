<?php declare(strict_types=1);

namespace Mmm\SpentSummary\Model\Order;

use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Sales\Api\OrderRepositoryInterface;
use Magento\Sales\Model\Order\CreditmemoRepository;

/**
 * Calculate total
 */
class CalculateTotalSpent
{
    /** @var OrderRepositoryInterface */
    private $orderRepository;

    /** @var CreditmemoRepository */
    private $creditmemoRepository;

    /** @var SearchCriteriaBuilder */
    private $searchCriteriaBuilder;

    /**
     * Construct
     *
     * @param OrderRepositoryInterface $orderRepository
     * @param CreditmemoRepository $creditmemoRepository
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     */
    public function __construct(
        OrderRepositoryInterface $orderRepository,
        CreditmemoRepository $creditmemoRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder
    ) {
        $this->orderRepository = $orderRepository;
        $this->creditmemoRepository = $creditmemoRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
    }

    /**
     * Calculate the total spent by a customer based on their email address.
     *
     * @param string $email
     *
     * @return array
     */
    public function calculateTotalAmounts($email)
    {
        $totalSpent = 0;
        $totalOrders = 0;
        $totalInvoicedOrders = 0;
        $totalCreditmemo = 0;

        $searchCriteria = $this->searchCriteriaBuilder
            ->addFilter('customer_email', $email)
            ->create();

        foreach ($this->orderRepository->getList($searchCriteria)->getItems() as $order) {
            $totalOrders += $order->getGrandTotal();
            if ($order->hasInvoices()) {
                $totalInvoicedOrders += $order->getGrandTotal();
            }

            $searchCriteria = $this->searchCriteriaBuilder
                ->addFilter('order_id', $order->getEntityId())
                ->create();

            foreach ($this->creditmemoRepository->getList($searchCriteria)->getItems() as $creditmemo) {
                $totalCreditmemo += $creditmemo->getGrandTotal();
            }
        }

        $totalSpent = $totalInvoicedOrders - $totalCreditmemo;

        return [
            'totalOrders' => $totalOrders,
            'totalInvoicedOrders' => $totalInvoicedOrders,
            'totalCreditmemo' => $totalCreditmemo,
            'totalSpent' => $totalSpent
        ];
    }
}
