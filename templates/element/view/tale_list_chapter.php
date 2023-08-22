<?php
use Cake\Datasource\ConnectionManager;

/**
 * @var \App\View\AppView $this
 * @var array $params
 * @var string $message
 */
$size = floor(sizeof($chapters) / 2);
?>
<?php if (sizeof($chapters) > 0) { ?>
    <div class="row">
        <div class="container ">
            <div class="col-xs-12" id="list-chapter">
                <div class="title-list">
                    <h2>Danh sách chương</h2>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <ul class="list-chapter">
                            <?php foreach ($chapters as $key => $chapter): ?>
                                <?php if ($key <= $size - 1) { ?>
                                    <li><span class="glyphicon glyphicon-certificate"></span>
                                        <a href="<?php echo $this->Url->build("/pages/chapterView/" . $chapter["chap_id"]); ?>">
                                            <span class="chapter-text"><span>Chương </span></span>
                                            <?= h($chapter["chap_index"]) ?>:
                                            <?= h($chapter["chap_name"]) ?>
                                        </a>
                                    </li>
                                <?php } ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <ul class="list-chapter">
                            <?php foreach ($chapters as $key => $chapter): ?>
                                <?php if ($key > $size - 1) { ?>
                                    <li><span class="glyphicon glyphicon-certificate"></span>
                                        <a href="<?php echo $this->Url->build("/pages/chapterView/" . $chapter["chap_id"]); ?>">
                                            <span class="chapter-text"><span>Chương </span></span>
                                            <?= h($chapter["chap_index"]) ?>:
                                            <?= h($chapter["chap_name"]) ?>
                                        </a>
                                    </li>
                                <?php } ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <?php echo $this->element('mini_e/paginator'); ?>
            </div>
        </div>
    </div>
<?php } ?>