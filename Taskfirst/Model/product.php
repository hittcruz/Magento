<?php
namespace Magento\Taskfirst\Model;
class Product extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'magento_taskfirst_product';
	protected $_cacheTag = 'magento_taskfirst_product';
	protected $_eventPrefix = 'magento_taskfirst_product';
	protected function _construct()
	{
		$this->_init('Magento\Taskfirst\Model\ResourceModel\Product');
	}
	public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}
	public function getDefaultValues()
	{
		$values = [];
		return $values;
	}
}