<?php

use Migrations\AbstractMigration;

class CreateTChargeTakusou extends AbstractMigration
{

    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('t_charge_takusou');
        $table->addColumn('pps_id', 'integer', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('customer_id', 'biginteger', [
            'default' => null,
            'limit' => 20,
            'null' => true,
        ]);
        $table->addColumn('customer_place_id', 'biginteger', [
            'default' => null,
            'limit' => 20,
            'null' => true,
        ]);
        $table->addColumn('supply_div', 'integer', [
            'default' => null,
            'limit' => 2,
            'null' => true,
        ]);
        $table->addColumn('supply_area', 'string', [
            'default' => null,
            'limit' => 2,
            'null' => true,
        ]);
        $table->addColumn('charge_date', 'date', [
            'default' => null,
            'limit' => 2,
            'null' => true,
        ]);
        $table->addColumn('teigaku_price', 'string', [
            'default' => null,
            'limit' => 10,
            'null' => true,
        ]);
        $table->addColumn('base_price_1', 'string', [
            'default' => null,
            'limit' => 10,
            'null' => true,
        ]);
        $table->addColumn('base_price_2', 'string', [
            'default' => null,
            'limit' => 10,
            'null' => true,
        ]);
        $table->addColumn('sum_kw_1', 'integer', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('sum_kw_2', 'integer', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('volume_price_1', 'string', [
            'default' => null,
            'limit' => 10,
            'null' => true,
        ]);
        $table->addColumn('volume_price_2', 'string', [
            'default' => null,
            'limit' => 10,
            'null' => true,
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('create_user', 'integer', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modify_user', 'integer', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('del_flg', 'boolean', [
            'default' => null,
            'null' => false,
        ]);
        $table->create();
    }

}
