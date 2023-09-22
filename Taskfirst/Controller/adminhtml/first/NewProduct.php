<?php
namespace Magento\Taskfirst\Controller\Adminhtml\First;
class NewProduct extends \Magento\Backend\App\Action
{
	protected $resultPageFactory = false;
	public function __construct(
		\Magento\Backend\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $resultPageFactory
	)
	{
		parent::__construct($context);
		$this->resultPageFactory = $resultPageFactory;
	}
	
	public function execute()
	{
		$id = $this->getRequest()->getParam('id');
		$resultPage = $this->resultPageFactory->create();
		$resultPage->getConfig()->getTitle()->prepend((__(isset($id) ? 'Modificar Producto' : 'Nuevo Producto')));
		return $resultPage;
	}
}