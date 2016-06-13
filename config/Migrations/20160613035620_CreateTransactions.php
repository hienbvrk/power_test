<?php
use Migrations\AbstractMigration;

class CreateTransactions extends AbstractMigration
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
        $table = $this->table('transactions');
        $table->addColumn('data_id', 'string', [
            'default' => null,
            'limit' => 16,
            'null' => false,
        ]);
        $table->addColumn('company_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('transaction_at', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('area_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('val1', 'float', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('val2', 'float', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('val3', 'float', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('val4', 'float', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('val5', 'float', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('val6', 'float', [
            'default' => null,
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
