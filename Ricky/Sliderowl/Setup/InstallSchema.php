<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Ricky\Sliderowl\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;


/**
 * @codeCoverageIgnore
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */

    public function install(
        SchemaSetupInterface $setup,
        ModuleContextInterface $context
    ){
        $installer = $setup;
        
        $installer->startSetup();

        if (!$installer->getConnection()->isTableExists($installer->getTable('ricky_sliderowl_manage'))) {
        /**
         * Create table 'ricky_sliderowl_manage'
         */
        
            $table = $installer->getConnection()->newTable(
                $installer->getTable('ricky_sliderowl_manage')
            )->addColumn(
                'slider_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity'=>true, 'unsigned'=>true, 'nullable'=>false, 'primary'=>true],
                'Slider Id'
            )->addColumn(
                'title',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                100,
                ['nullable'=>false, 'default'=>null],
                'Title'
            )->addColumn(
                'slides',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                '2M',
                ['nullable'=>false, 'default'=>null],
                'Slides'
            )->addColumn(
                'items',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                20,
                ['nullable'=>false, 'default'=>1],
                'Item'
            )->addColumn(
                'margin',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                100,
                ['nullable'=>false, 'default'=>0],
                'Margin'
            )->addColumn(
                'loop',
                \Magento\Framework\DB\Ddl\Table::TYPE_BOOLEAN,
                null,
                ['nullable'=>false, 'default'=>false],
                'Loop'
            )->addColumn(
                'nav',
                \Magento\Framework\DB\Ddl\Table::TYPE_BOOLEAN,
                null,
                ['nullable'=>false, 'default'=>false],
                'Navigation'
            )->addColumn(
                'navText',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                '2M',
                ['nullable'=>false, 'default'=>null],
                'Navigation Text'
            )->addColumn(
                'dots',
                \Magento\Framework\DB\Ddl\Table::TYPE_BOOLEAN,
                null,
                ['nullable'=>false, 'default'=>false],
                'Dots'
            )->addColumn(
                'autoplay',
                \Magento\Framework\DB\Ddl\Table::TYPE_BOOLEAN,
                null,
                ['nullable'=>false, 'default'=>false],
                'Auto Play'
            )->addColumn(
                'autoplayTimeout',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                30000,
                ['nullable'=>false, 'default'=>5000],
                'Auto Play TimeOut'
            )->addColumn(
                'animateOut',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                80,
                ['nullable'=>false, 'default'=>null],
                'Animation out class'
            )->addColumn(
                'animateIn',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                80,
                ['nullable'=>false, 'default'=>null],
                'Animation in class'
            )->setComment(
                'Slider Data Table'
            );

            $installer->getConnection()->createTable($table);            
        }
        $installer->endSetup();
    }
}