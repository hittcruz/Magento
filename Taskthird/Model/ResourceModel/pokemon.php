<?php
namespace Magento\Taskthird\Model\ResourceModel;
class Pokemon extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
	
	public function __construct(
		\Magento\Framework\Model\ResourceModel\Db\Context $context
	)
	{
		parent::__construct($context);
	}
	
	protected function _construct()
	{
		$this->_init('mgt_tbl_pokemon', 'pokemon_id');
	}
	
}