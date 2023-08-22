<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ChapterFixture
 */
class ChapterFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'chapter';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'chap_id' => 1,
                'tale_id' => 1,
                'chap_name' => 'Lorem ipsum dolor sit amet',
                'chap_index' => 1,
                'chap_content' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'create_time' => '',
                'update_time' => '',
            ],
        ];
        parent::init();
    }
}
