<?php
namespace Magento\Taskthird\Controller\Third;
class Pokemon extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;
    protected $_blockdata;
	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
		\Magento\Taskthird\Block\Pokemon $pokemon
        )
	{
        $this->_blockdata = $pokemon;
		$this->_pageFactory = $pageFactory;
		return parent::__construct($context);
	}
	public function execute()
	{
        $data = $this->getRequest()->getParams();
        $this->_blockdata->setDataCollection($data);
		return $this->_pageFactory->create();
	}
}