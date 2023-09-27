<?php
namespace Magento\Taskthird\Model\ResourceModel\Pokemon;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'pokemon_id';
	protected $_eventPrefix = 'magento_taskthird_pokemon_collection';
	protected $_eventObject = 'pokemon_collection';
	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('Magento\Taskthird\Model\Pokemon', 'Magento\Taskthird\Model\ResourceModel\Pokemon');
	}
}