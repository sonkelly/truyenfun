<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Chapter> $chapter
 */
?>


<div class="row">
    <div class="col-sm-10">
        <h3>
            <?= __('Danh Sách Chương') ?>
        </h3>
    </div><!-- /.col -->
    <div class="col-sm-2">
        <?= $this->Html->link(__('Khởi Tạo Tự Động'), ['action' => 'autoAdd', $tale["tale_id"]], ['class' => 'btn btn-block btn-success']) ?>
        <?= $this->Html->link(__('Thêm Chương'), ['action' => 'add', $tale["tale_id"]], ['class' => 'btn btn-block btn-success']) ?>
    </div><!-- /.col -->

    <table class="table table-sm">
        <thead>
            <tr>
                <th class="actions">
                    <?= __('Tên Truyện') ?>
                </th>
                <th class="actions">
                    <?= __('Tên Chương') ?>
                </th>
                <th class="actions">
                    <?= __('Số Thứ Tự') ?>
                </th>
                <th class="actions">
                    <?= __('URL File') ?>
                </th>
                <th class="actions">
                    <?= __('Thời Gian Tạo') ?>
                </th>
                <th class="actions">
                    <?= __('Thời Gian Chỉnh Sửa') ?>
                </th>
                <th class="actions">
                    <?= __('Chức Năng') ?>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($chapter as $chapter): ?>
                <tr>
                    <td>
                        <?= h($tale["tale_name"]) ?>
                    </td>
                    <td>
                        <?= h($chapter->chap_name) ?>
                    </td>
                    <td>
                        Chương:
                        <?= $this->Number->format($chapter->chap_index) ?>
                    </td>
                    <td>
                        <?= h($chapter->path) ?>
                    </td>
                    <td>
                        <?= h($chapter->create_time) ?>
                    </td>
                    <td>
                        <?= h($chapter->update_time) ?>
                    </td>
                    <td class="actions">
                        <?= $this->Html->link(__('Xem Chi Tiết'), ['action' => 'view', $chapter->chap_id], ['class' => 'badge bg-success']) ?>
                        <?= $this->Html->link(__('Sửa'), ['action' => 'edit', $chapter->chap_id], ['class' => 'badge bg-primary']) ?>
                        <?= $this->Form->postLink(__('Xóa'), ['action' => 'delete', $chapter->chap_id], ['confirm' => __('Are you sure you want to delete # {0}?', $chapter->chap_id), 'class' => 'badge bg-danger']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php echo $this->element('mini_e/paginator'); ?>