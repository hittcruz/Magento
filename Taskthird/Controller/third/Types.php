<?php
namespace Magento\Taskthird\Controller\Third;
class Types extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;
    protected $_blockdata;
	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
		\Magento\Taskthird\Block\Types $types
        )
	{
        $this->_blockdata = $types;
		$this->_pageFactory = $pageFactory;
		return parent::__construct($context);
	}
	public function execute()
	{
        $data = $this->getRequest()->getParams();
        /*print_r($data['type']);
        print_r($data['id']);
        echo '</br>';*/
        $this->_blockdata->setDataCollection($data);
		return $this->_pageFactory->create();
	}
}