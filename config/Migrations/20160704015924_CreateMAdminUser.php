<?php

use Migrations\AbstractMigration;

class CreateMAdminUser extends AbstractMigration
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
        $table = $this->table('m_admin_user');
        $table->addColumn('login_id', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('login_password', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('user_name', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('email_address', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('role_code', 'integer', [
            'default' => null,
            'null' => false,
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
