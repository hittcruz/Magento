<?php
namespace Magento\Taskfirst\Controller\Adminhtml\First;
use Magento\Backend\App\Action;
use Magento\TestFramework\ErrorLog\Logger;
class Save extends \Magento\Backend\App\Action
{
    /**
     * @param Action\Context $context
     */
    public function __construct(Action\Context $context)
    {
        parent::__construct($context);
    }
    
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        print_r($data);
        echo '</br>';
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($data) {
            /** @var \Ashsmith\Blog\Model\Post $model */
            $model = $this->_objectManager->create('Magento\Taskfirst\Model\Product');
            $model->setData($data);
        
            $this->_eventManager->dispatch(
                'blog_post_prepare_save',
                ['post' => $model, 'request' => $this->getRequest()]
            );
            try {
                $model->save();
                $this->messageManager->addSuccess(__('Guardaste este nuevo producto.'));
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData(false);
              
                return $resultRedirect->setPath('*/*/');
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\RuntimeException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('Algo salió mal al guardar el producto..'));
            }
            $this->_getSession()->setFormData($data);
            return $resultRedirect->setPath('*/*/edit');
        }
        return $resultRedirect->setPath('*/*/');
    }
}