<?php

use Migrations\AbstractMigration;

class CreateTBalancingGroupChild extends AbstractMigration
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
        $table = $this->table('t_balancing_group_children');
        $table->addColumn('balancing_group_id', 'integer', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('pps_id', 'integer', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('bg_start_date', 'date', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('bg_end_date', 'date', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('memo', 'text', [
            'default' => null,
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

        $table->addIndex('balancing_group_id');
        $table->create();
    }

}
