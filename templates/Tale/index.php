<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Tale> $tale
 */
?>


<div class="row">
    <div class="col-sm-10">
        <h3>
            <?= __('Danh Sách Truyện') ?>
        </h3>
    </div><!-- /.col -->
    <div class="col-sm-2">
        <?= $this->Html->link(__('Thêm Truyện'), ['action' => 'add'], ['class' => 'btn btn-block btn-success']) ?>
    </div><!-- /.col -->

    <table class="table table-sm">
        <thead>
            <tr>
                <th class="actions">
                    <?= __('Tên Truyện') ?>
                </th>
                <th class="actions">
                    <?= __('Ảnh Bìa') ?>
                </th>
                <th class="actions">
                    <?= __('Tác Giả') ?>
                </th>
                <th class="actions">
                    <?= __('Danh Mục') ?>
                </th>
                <th class="actions">
                    <?= __('Nguồn') ?>
                </th>
                <th class="actions">
                    <?= __('Trạng Thái') ?>
                </th>
                <th class="actions">
                    <?= __('Đánh Giá') ?>
                </th>
                <th class="actions">
                    <?= __('Thư Mục Chương') ?>
                </th>
                <th class="actions">
                    <?= __('Chức Năng   ') ?>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tale as $tale): ?>
                <tr>
                    <td>
                        <?= h($tale->tale_name) ?>
                    </td>
                    <td>
                        <?php
                        echo $this->Html->image('/webroot/' . $tale->avatar, array('height' => '100', 'width' => '100')); ?>
                    </td>

                    <td>
                        <?= h($tale->tale_author) ?>
                    </td>
                    <td>
                        <?= h($tale->category_ids) ?>
                    </td>
                    <td>
                        <?= h($tale->tale_source) ?>
                    </td>
                    <?php if ($tale->status == 2) { ?>
                        <td class="badge bg-primary">Full</td>
                    <?php } else { ?>
                        <td class="badge bg-success">Đang Ra</td>
                    <?php } ?>
                    <td>
                        <?= $this->Number->format($tale->tale_assess) ?>/10
                    </td>
                    <td>
                        <?= h($tale->chap_path) ?>
                    </td>
                    <td class="actions">
                        <?= $this->Html->link(__('Xem Chi Tiết'), ['action' => 'view', $tale->tale_id], ['class' => 'badge bg-success']) ?>
                        <?= $this->Html->link(__('Sửa'), ['action' => 'edit', $tale->tale_id], ['class' => 'badge bg-primary']) ?>
                        <?= $this->Form->postLink(__('Xóa'), ['action' => 'delete', $tale->tale_id], ['confirm' => __('Are you sure you want to delete # {0}?', $tale->tale_id), 'class' => 'badge bg-danger']) ?>
                        <?= $this->Form->postLink(__('Danh Sách Chương'), ['controller' => 'chapter', 'action' => 'index', $tale->tale_id], ['class' => 'badge bg-warning']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php echo $this->element('mini_e/paginator'); ?>