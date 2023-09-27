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
					'id',
					\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
					null,
					['nullable => false'],
					'ID Pokemom'
				)
                ->addColumn(
					'name',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					255,
					['nullable => false'],
					'Nombre'
				)
				->addColumn(
					'image',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					255,
					['nullable => false'],
					'Imagen'
				)
                ->addColumn(
					'base',
					\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
					null,
					['nullable => false'],
					'Base Experiencia'
				)
                ->addColumn(
					'height',
					\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
					null,
					['nullable => false'],
					'Altura'
				)
                ->addColumn(
					'weight',
					\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
					null,
					['nullable => false'],
					'Peso'
				)
				->addColumn(
					'hp',
					\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
					null,
					['nullable => false'],
					'HP'
				)
				->addColumn(
					'speed',
					\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
					null,
					['nullable => false'],
					'Velocidad'
				)
				->addColumn(
					'attack',
					\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
					null,
					['nullable => false'],
					'Ataque'
				)
				->addColumn(
					'defense',
					\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
					null,
					['nullable => false'],
					'Defensa'
				)
				->addColumn(
					'special_attack',
					\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
					null,
					['nullable => false'],
					'Ataque Especial'
				)
				->addColumn(
					'special_defense',
					\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
					null,
					['nullable => false'],
					'Defensa Especial'
				)

				->setComment('Pokemons Table');
			$installer->getConnection()->createTable($table);
			$installer->getConnection()->addIndex(
				$installer->getTable('mgt_tbl_pokemon'),
				$setup->getIdxName(
					$installer->getTable('mgt_tbl_pokemon'),
					['name','image'],
					\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
				),
				['name','image'],
				\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
			);
		}
		$installer->endSetup();
	}
}