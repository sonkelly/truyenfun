<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Chapter $chapter
 */
?>
<div class="row">
    <div class="col-sm-6">
            <table>
                <tr>
                    <th><?= __('Tên Chương: ') ?></th>
                    <td>Chương <?= $this->Number->format($chapter->chap_index) ?>: <?= h($chapter->chap_name) ?></td>
                </tr>
                <tr>
                <?php if ($tale != null) { ?>
                    <th><?= __('Tên Truyện: ') ?></th>
                    <td><?= h($tale["tale_name"]) ?></td>
                <?php } else { ?>
                    <th><?= __('Id Truyện: ') ?></th>
                    <td><?= $this->Number->format($chapter->tale_id) ?></td>
                <?php } ?>
                    
                </tr>
            </table>
    </div>
    <div class="col-sm-6">
        <div class="side-nav">
            <?= $this->Html->link(__('Chỉnh Sửa Chương'), ['action' => 'edit', $chapter->chap_id], ['class' => 'side-nav-item badge bg-primary']) ?>
            <?= $this->Form->postLink(__('Xóa'), ['action' => 'delete', $chapter->chap_id], ['confirm' => __('Are you sure you want to delete # {0}?', $chapter->chap_id), 'class' => 'side-nav-item badge bg-danger']) ?>
            <?= $this->Html->link(__('Thêm Mới'), ['action' => 'add', $chapter->tale_id], ['class' => 'side-nav-item badge bg-success']) ?>
        </div>
        <?= $this->Html->link(__('Danh Sách Chương'), ['action' => 'index'], ['class' => 'side-nav-item badge bg-warning']) ?>
    </div>
</div>
<div class="row col-sm-12">
    <div class="text">
        <strong><?= __('Nội Dung Chương') ?></strong>
        <blockquote>
            <?= $this->Text->autoParagraph(h($contents)); ?>
        </blockquote>
    </div>
</div>