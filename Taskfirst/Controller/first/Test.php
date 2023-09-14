<?php
namespace Magento\Taskfirst\Controller\First;
class Test extends \Magento\Framework\App\Action\Action
{
	protected $_productFactory;
	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
		\MAgento\Taskfirst\Model\ProductFactory $productFactory
		)
	{
		$this->_pageFactory = $pageFactory;
		$this->_productFactory = $productFactory;
		return parent::__construct($context);
	}
	public function execute()
	{
		
		$product = $this->_productFactory->create();
		$collection = $product->getCollection();
		foreach($collection as $item){
			echo "<pre>";
			print_r($item->getData());
			echo "</pre>";
		}
	}
}