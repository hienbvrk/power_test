<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CommonInfosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CommonInfosTable Test Case
 */
class CommonInfosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CommonInfosTable
     */
    public $CommonInfos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.common_infos',
        'app.companies',
        'app.transactions',
        'app.areas',
        'app.kwh_details'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CommonInfos') ? [] : ['className' => 'App\Model\Table\CommonInfosTable'];
        $this->CommonInfos = TableRegistry::get('CommonInfos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CommonInfos);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
