<?php
namespace Magento\Taskthird\Controller\Third;

use Magento\Framework\App\Action\Context;

class Index extends \Magento\Framework\App\Action\Action
{
    /** @var  \Magento\Framework\View\Result\Page */
    protected $resultPageFactory;

    /*** @param \Magento\Framework\App\Action\Context $context      */
    public function __construct(
        Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Taskthird\Helper\Data $data
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->helper = $data;
        parent::__construct($context);
    }

    /**
     * Get City Details.
     *
     * @return JSON City details
     */
    public function execute()
    {
        // Call Helper function to get order details //
        $this->helper->getCitiesDetails();
        echo 'estoy en thrid';
    }
}