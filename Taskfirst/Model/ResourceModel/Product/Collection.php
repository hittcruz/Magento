<?php
namespace Magento\Taskfirst\Model\ResourceModel\Product;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'product_id';
	protected $_eventPrefix = 'magento_taskfirst_product_collection';
	protected $_eventObject = 'product_collection';
	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('Magento\Taskfirst\Model\Product', 'Magento\Taskfirst\Model\ResourceModel\Product');
	}
}