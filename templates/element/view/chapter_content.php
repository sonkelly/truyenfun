<?php
use Cake\Datasource\ConnectionManager;

/**
 * @var \App\View\AppView $this
 * @var array $params
 * @var string $message
 */
$contents = splicContent($chap);
function splicContent($chap)
{
    $contents = explode("<ads_admin_key>", $chap["chap_content"]);
    return $contents;
}
?>

<div id="chapter-big-container" class="container chapter" style="height: auto !important; margin-top: 10px;">
    <div class="row" style="height: auto !important;">
        <div class="col-xs-12" style="height: auto !important; min-height: 0px !important;">
            <a class="truyen-title" href="<?php echo $this->Url->build("/pages/taleView/" . $tale["tale_id"]); ?>">
                <?= h($tale["tale_name"]) ?>
            </a>
            <h2>
                <a class="chapter-title" href="">
                    <span class="chapter-text"><span>Chương </span></span>
                    <?= h($chap["chap_index"]) ?>:
                    <?= h($chap["chap_name"]) ?>
                </a>
            </h2>
            <hr class="chapter-start">
            <?php echo $this->element('mini_e/next_controller'); ?>
            <hr class="chapter-end">

            <div id="chapter-c" class="chapter-c" style="height: auto !important; white-space: pre-line;line-height: 3rem;">
                <?php echo $contentCut ?>
                <!-- <?php foreach ($contents as $content): ?>
                    <?php echo $this->element('ads/ads_chap_content'); ?>
                <?php endforeach; ?> -->
            </div>
            <hr class="chapter-end" id="chapter-end-bot">
            <?php echo $this->element('mini_e/next_controller'); ?>
        </div>
    </div>
</div>