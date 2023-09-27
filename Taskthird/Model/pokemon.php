<?php
namespace Magento\Taskthird\Model;
class Pokemon extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'magento_taskthird_pokemon';
	protected $_cacheTag = 'magento_taskthird_pokemon';
	protected $_eventPrefix = 'magento_taskthird_pokemon';
	protected function _construct()
	{
		$this->_init('Magento\Taskthird\Model\ResourceModel\Pokemon');
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