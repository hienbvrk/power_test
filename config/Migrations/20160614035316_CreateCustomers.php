<?php
use Migrations\AbstractMigration;

class CreateCustomers extends AbstractMigration
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
        $table = $this->table('customers');
        $table->addColumn('code', 'string', [
            'default' => null,
            'limit' => 16,
            'null' => false,
        ]);
        $table->addColumn('name', 'string', [
            'default' => null,
            'limit' => 256,
            'null' => false,
        ]);
        $table->addColumn('app_id', 'string', [
            'default' => null,
            'limit' => 16,
            'null' => true,
        ]);
        $table->addColumn('is_cost_auto', 'integer', [
            'default' => null,
            'limit' => 1,
            'null' => false,
        ]);
        $table->addColumn('is_instructed_area', 'integer', [
            'default' => null,
            'limit' => 1,
            'null' => false,
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->create();
    }
}
