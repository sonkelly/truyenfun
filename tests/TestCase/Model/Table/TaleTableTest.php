<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TaleTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TaleTable Test Case
 */
class TaleTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TaleTable
     */
    protected $Tale;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Tale',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Tale') ? [] : ['className' => TaleTable::class];
        $this->Tale = $this->getTableLocator()->get('Tale', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Tale);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TaleTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
