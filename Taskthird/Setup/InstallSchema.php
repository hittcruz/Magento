<?php
namespace Magento\Taskthird\Setup;
class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface
{
	public function install(\Magento\Framework\Setup\SchemaSetupInterface $setup, \Magento\Framework\Setup\ModuleContextInterface $context)
	{
		$installer = $setup;
		$installer->startSetup();

		if (!$installer->tableExists('mgt_tbl_pokemon')) {
			$table = $installer->getConnection()->newTable(
				$installer->getTable('mgt_tbl_pokemon')
			)
				->addColumn(
					'pokemon_id',
					\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
					null,
					[
						'identity' => true,
						'nullable' => false,
						'primary'  => true,
						'unsigned' => true,
					],
					'Pokemon ID'
				)
				->addColumn(
					'name',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					255,
					['nullable => false'],
					'Codigo'
				)
                ->addColumn(
					'name',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					255,
					['nullable => false'],
					'Nombre'
				)
                ->addColumn(
					'description',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					255,
					['nullable => false'],
					'Descripcion'
				)
                ->addColumn(
                    'price',
                    \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
                    '10,2',
                    ['nullable' => false, 'default' => '0.00'],
                    'Precio'
                )
                ->addColumn(
					'stock',
					\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
					null,
					['nullable => false'],
					'Stock'
				)

				->setComment('Products Table');
			$installer->getConnection()->createTable($table);
			$installer->getConnection()->addIndex(
				$installer->getTable('mgt_tbl_pokemon'),
				$setup->getIdxName(
					$installer->getTable('mgt_tbl_pokemon'),
					['code','name', 'description'],
					\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
				),
				['code','name', 'description'],
				\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
			);
		}
		$installer->endSetup();
	}
}