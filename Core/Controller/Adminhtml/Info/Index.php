<?php declare(strict_types=1);


namespace Mmm\Core\Controller\Adminhtml\Info;

/**
 * More info page
 *
 * @author      Marucci Maximo <marucci.maximo@gmail.com>
 */
class Index extends \Magento\Backend\App\Action
{
    /**
     * @var boolean 
     */
    protected $resultPageFactory = false;

    /**
     * Details constructor.
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    )
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * Bulk list action
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Mmm_Core::menu');
        $resultPage->getConfig()->getTitle()->prepend(__('More info'));
        return $resultPage;
    }

    /**
     * @inheritDoc
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Mmm_Core::info');
    }
}