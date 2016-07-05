<?php

use Migrations\AbstractMigration;

class CreateMBalancingGroup extends AbstractMigration
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
        $table = $this->table('m_balancing_group');
        $table->addColumn('bg_code', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ])->addIndex(['bg_code']);
        $table->addColumn('area_code', 'integer', [
            'default' => null,
            'limit' => 2,
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
        $table->create();
    }

}
