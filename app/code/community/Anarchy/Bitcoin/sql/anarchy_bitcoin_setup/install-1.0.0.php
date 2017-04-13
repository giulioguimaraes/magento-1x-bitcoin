<?php

$installer = $this;
$installer->startSetup();
$installer->getConnection()->addColumn($installer->getTable('sales/quote'),'grand_total_bitcoin', array(
        'type'      => Varien_Db_Ddl_Table::TYPE_DECIMAL,
        'length'    => '12,8',
        'comment'   => 'Grand Total Bitcoin',
    ));
$installer->getConnection()->addColumn($installer->getTable('sales/order'),'grand_total_bitcoin', array(
        'type'      => Varien_Db_Ddl_Table::TYPE_DECIMAL,
        'length'    => '12,8',
        'comment'   => 'Grand Total Bitcoin',
    ));
$installer->endSetup();