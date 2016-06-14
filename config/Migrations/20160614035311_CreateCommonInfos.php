<?php
use Migrations\AbstractMigration;

class CreateCommonInfos extends AbstractMigration
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
        $table = $this->table('common_infos');
        $table->addColumn('sent_company_id',  'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('received_company_id',  'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('type_code', 'string', [
            'default' => null,
            'limit' => 16,
            'null' => false,
        ]);
        $table->addColumn('report_name', 'string', [
            'default' => null,
            'limit' => 256,
            'null' => false,
        ]);
        $table->addColumn('plan_submitter_code', 'string', [
            'default' => null,
            'limit' => 16,
            'null' => false,
        ]);
        $table->addColumn('plan_submitter_name', 'string', [
            'default' => null,
            'limit' => 256,
            'null' => false,
        ]);
        $table->addColumn('time', 'string', [
            'default' => null,
            'limit' => 10,
            'null' => false,
        ]);
        $table->addColumn('bpid_code', 'string', [
            'default' => null,
            'limit' => 16,
            'null' => false,
        ]);  
        $table->addColumn('field1', 'string', [
            'default' => null,
            'limit' => 16,
            'null' => false,
        ]);
        $table->addColumn('field2', 'string', [
            'default' => null,
            'limit' => 16,
            'null' => false,
        ]);
        $table->addColumn('field3', 'string', [
            'default' => null,
            'limit' => 16,
            'null' => false,
        ]);
        $table->addColumn('field4', 'string', [
            'default' => null,
            'limit' => 16,
            'null' => false,
        ]);
        $table->addColumn('field5', 'string', [
            'default' => null,
            'limit' => 16,
            'null' => false,
        ]);
        $table->addColumn('field6', 'string', [
            'default' => null,
            'limit' => 16,
            'null' => false,
        ]);
        $table->addColumn('field7', 'string', [
            'default' => null,
            'limit' => 16,
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
