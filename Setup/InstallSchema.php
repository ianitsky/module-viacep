<?php
/**
 * A Magento 2 module named Ianitsky/ViaCep
 * Copyright (C) 2018 Douglas Ianitsky <ianitsky@gmail.com>
 * 
 * This file is part of Ianitsky/ViaCep.
 * 
 * Ianitsky/ViaCep is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */

namespace Ianitsky\ViaCep\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{

    /**
     * {@inheritdoc}
     */
    public function install(
        SchemaSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $table_ianitsky_viacep_postcode = $setup->getConnection()->newTable($setup->getTable('ianitsky_viacep_postcode'));

        $table_ianitsky_viacep_postcode->addColumn(
            'postcode_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['identity' => true,'nullable' => false,'primary' => true,'unsigned' => true,],
            'Entity ID'
        );

        $table_ianitsky_viacep_postcode->addColumn(
            'postcode',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            8,
            ['nullable' => false,'identity' => false,'unsigned' => true],
            'postcode'
        );

        $table_ianitsky_viacep_postcode->addColumn(
            'street',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            [],
            'street'
        );

        $table_ianitsky_viacep_postcode->addColumn(
            'street',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            null,
            [],
            'street'
        );

        $table_ianitsky_viacep_postcode->addColumn(
            'complement',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            50,
            [],
            'complement'
        );

        $table_ianitsky_viacep_postcode->addColumn(
            'neighborhood',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            50,
            [],
            'neighborhood'
        );

        $table_ianitsky_viacep_postcode->addColumn(
            'city',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            50,
            ['nullable' => False],
            'city'
        );

        $table_ianitsky_viacep_postcode->addColumn(
            'state',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            2,
            ['nullable' => False],
            'state'
        );

        $table_ianitsky_viacep_postcode->addColumn(
            'ibge',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['unsigned' => true],
            'ibge'
        );

        $table_ianitsky_viacep_postcode ->addIndex(
            $setup->getIdxName('ianitsky_viacep_postcode', ['postcode']),
            ['postcode']
        );

        $setup->getConnection()->createTable($table_ianitsky_viacep_postcode);
    }
}
