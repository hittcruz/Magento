<?php
namespace Magento\Taskthird\Controller\Third;
class Save extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;
	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory)
	{
		$this->_pageFactory = $pageFactory;
		return parent::__construct($context);
	}
	public function execute()
	{
        $param = $this->getRequest()->getPostValue();
        print_r($param);
		//return $this->_pageFactory->create();
	}
}