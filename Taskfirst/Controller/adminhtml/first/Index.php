<?php
namespace Magento\Taskfirst\Controller\Adminhtml\First;
class Index extends \Magento\Backend\App\Action
{
	protected $resultPageFactory = false;
	public function __construct(
		\Magento\Backend\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $resultPageFactory //Aporta toda la funcionalidad para grid
	)
	{
		parent::__construct($context);
		$this->resultPageFactory = $resultPageFactory;
	}

	/*protected function _isAllowed(){
		return $this->authorization->isAllowed('Pixelpro_helloword::post');
	}*/
	
	public function execute()
	{
		$resultPage = $this->resultPageFactory->create();
		$resultPage->setActiveMenu('Magento_Taskfirst::first');
		$resultPage->getConfig()->getTitle()->prepend((__('Productos Nuevos')));
		return $resultPage;
	}
}
