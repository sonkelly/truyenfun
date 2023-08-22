<?php
use Cake\Datasource\ConnectionManager;

/**
 * @var \App\View\AppView $this
 * @var array $params
 * @var string $message
 */

?>

<div class="chapter-nav" id="chapter-nav-top">
    <div class="btn-group">
        <?php if ($preChap != null) { ?>
            <a class="btn btn-success btn-chapter-nav"
                href="<?php echo $this->Url->build("/pages/chapterView/" . $preChap["chap_id"]); ?>" id="prev_chap"
                data-cid="">
            <?php } else { ?>
                <a class="btn btn-success btn-chapter-nav disabled" href="" id="prev_chap" data-cid="">
                <?php } ?>
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="hidden-xs">Chương</span>trước
            </a>
            <button type="button" class="btn btn-success btn-chapter-nav chapter_jump">
                <span class="glyphicon glyphicon-list-alt"></span>
            </button>
            <?php if ($nextChap != null) { ?>
                <a class="btn btn-success btn-chapter-nav"
                    href="<?php echo $this->Url->build("/pages/chapterView/" . $nextChap["chap_id"]); ?>" id="next_chap">
                <?php } else { ?>
                    <a class="btn btn-success btn-chapter-nav disabled" href="" id="next_chap">
                    <?php } ?>
                    <span class="hidden-xs">Chương </span>tiếp
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
    </div>
</div>