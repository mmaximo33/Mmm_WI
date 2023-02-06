<?php declare(strict_types=1);
namespace Mmm\SpentSummary\Block\Order\Email;
class TotalSpent extends \Mmm\SpentSummary\Block\Order\OnePage\Success\TotalSpent
{
    /**
     * Get styles
     *
     * @return null|string
     */
    public function getStyles()
    {
        return $this->config->getStylesEmail();
    }
} 