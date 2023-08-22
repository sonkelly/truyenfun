<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tale $tale
 */
?>
<div class="row form-group">
    <div class="col-sm-3">
        <?php echo $this->Html->image('/webroot/' . $tale->avatar); ?>
    </div>
    <div class="col-sm-5">
        <div class="tale view content">
            <table>
                <tr>

                    <td>
                        <h4>
                            <?= h($tale->tale_name) ?>
                        </h4>
                    </td>
                </tr>
                <tr>
                    <th>
                        <?= __('Tác Giả: ') ?>
                    </th>
                    <td>
                        <?= h($tale->tale_author) ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        <?= __('Danh Mục: ') ?>
                    </th>
                    <td>
                        <?php foreach ($cats as $cat): ?>
                            <span class="badge badge-info">
                                <?php echo ($cat["category_name"]) ?>
                            </span>
                        <?php endforeach; ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        <?= __('Nguồn: ') ?>
                    </th>
                    <td>
                        <?= h($tale->tale_source) ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        <?= __('Trạng Thái: ') ?>
                    </th>
                    <?php if ($tale->status == 2) { ?>
                        <td class="badge bg-primary">Full</td>
                    <?php } else { ?>
                        <td class="badge bg-success">Đang Ra</td>
                    <?php } ?>
                </tr>
                <tr>
                    <th>
                        <?= __('Đánh Giá: ') ?>
                    </th>
                    <td>
                        <?= $this->Number->format($tale->tale_assess) ?>
                    </td>
                </tr>

                <tr>
                    <th>
                        <?= __('Thư Mục Chương: ') ?>
                    </th>
                    <td>
                        <?= h($tale->chap_path) ?>
                    </td>
                </tr>
            </table>

        </div>
    </div>
    <div class="col-sm-4">
        <aside class="column">
            <div class="side-nav">
                <h4 class="heading">
                    <?= __('Chức Năng') ?>
                </h4>
                <?= $this->Html->link(__('Sửa'), ['action' => 'edit', $tale->tale_id], ['class' => 'side-nav-item badge bg-primary']) ?>
                <?= $this->Form->postLink(__('Xóa'), ['action' => 'delete', $tale->tale_id], ['confirm' => __('Are you sure you want to delete # {0}?', $tale->tale_id), 'class' => 'side-nav-item badge bg-danger']) ?>
                <?= $this->Html->link(__('Thêm Truyện'), ['action' => 'add'], ['class' => 'side-nav-item badge bg-success']) ?>
            </div>
            <?= $this->Html->link(__('Xem Danh Sách Chương'), ['controller' => 'chapter', 'action' => 'index', $tale->tale_id], ['class' => 'side-nav-item badge bg-warning']) ?>
        </aside>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="text">
            <strong>
                <?= __('Giới Thiệu: ') ?>
            </strong>
            <blockquote>
                <?= $this->Text->autoParagraph(h($tale->tale_introduce)); ?>
            </blockquote>
        </div>
    </div>
</div>