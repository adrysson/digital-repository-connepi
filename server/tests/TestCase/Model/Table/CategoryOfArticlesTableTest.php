<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CategoryOfArticlesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CategoryOfArticlesTable Test Case
 */
class CategoryOfArticlesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CategoryOfArticlesTable
     */
    public $CategoryOfArticles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.category_of_articles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('CategoryOfArticles') ? [] : ['className' => CategoryOfArticlesTable::class];
        $this->CategoryOfArticles = TableRegistry::getTableLocator()->get('CategoryOfArticles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CategoryOfArticles);

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
