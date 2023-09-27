<?php
namespace Magento\Taskthird\Controller\Third;

class Save extends \Magento\Framework\App\Action\Action
{
	protected $_pokemonFactory;
	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Taskthird\Model\PokemonFactory $pokemonFactory
	) {
		$this->_pokemonFactory = $pokemonFactory;
		return parent::__construct($context);
	}
	public function execute()
	{
		$data = $this->getRequest()->getPostValue();
		//return $this->_pageFactory->create();
		$resultRedirect = $this->resultRedirectFactory->create();

		if ($data) {
			try {
				$model = $this->_pokemonFactory->create();
				foreach ($model->getCollection() as $value) {
					if ($data['id'] == $value['id']) {
						$this->messageManager->addError(__('Pokemon ya existe.'));
						return $resultRedirect->setPath('*/*/');
						break;
					}
				}
				$model->setData($data);
				$this->_eventManager->dispatch(
					'blog_post_prepare_save',
					['pokemon' => $model, 'request' => $this->getRequest()]
				);
				$model->save();
				$this->messageManager->addSuccess(__('Pokemon a favoritos.'));

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