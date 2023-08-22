<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TaleFixture
 */
class TaleFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'tale';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'tale_id' => 1,
                'tale_name' => 'Lorem ipsum dolor sit amet',
                'tale_author' => 'Lorem ipsum dolor sit amet',
                'category_ids' => 'Lorem ipsum dolor sit amet',
                'tale_introduce' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'tale_source' => 'Lorem ipsum dolor sit amet',
                'status' => 1,
                'tale_assess' => 1,
                'avatar' => 'Lorem ipsum dolor sit amet',
                'createtime' => '',
                'updatetime' => '',
            ],
        ];
        parent::init();
    }
}
