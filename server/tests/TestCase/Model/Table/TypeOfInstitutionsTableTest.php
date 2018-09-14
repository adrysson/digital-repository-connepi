<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TypeOfInstitutionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TypeOfInstitutionsTable Test Case
 */
class TypeOfInstitutionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TypeOfInstitutionsTable
     */
    public $TypeOfInstitutions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.type_of_institutions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('TypeOfInstitutions') ? [] : ['className' => TypeOfInstitutionsTable::class];
        $this->TypeOfInstitutions = TableRegistry::getTableLocator()->get('TypeOfInstitutions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TypeOfInstitutions);

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
}
