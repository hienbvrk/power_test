<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\KwhDetailsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\KwhDetailsTable Test Case
 */
class KwhDetailsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\KwhDetailsTable
     */
    public $KwhDetails;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.kwh_details',
        'app.common_infos',
        'app.companies',
        'app.transactions',
        'app.areas',
        'app.customers',
        'app.apps'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('KwhDetails') ? [] : ['className' => 'App\Model\Table\KwhDetailsTable'];
        $this->KwhDetails = TableRegistry::get('KwhDetails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->KwhDetails);

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
