<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Category> $category
 */
?>

<div class="row">
    <div class="col-sm-10">
        <h3>
            <?= __('Danh Sách Danh Mục Truyện') ?>
        </h3>
    </div><!-- /.col -->
    <div class="col-sm-2">
        <?= $this->Html->link(__('Thêm danh mục'), ['action' => 'add'], ['class' => 'btn btn-block btn-success']) ?>
    </div><!-- /.col -->

    <table class="table table-sm">
        <thead>
            <tr>
                <th class="actions">
                    <?= __('Tên Danh Mục') ?>
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
            <?php foreach ($category as $category): ?>
                <tr>
                    <td>
                        <?= h($category->category_name) ?>
                    </td>
                    <td>
                        <?= h($category->createtime) ?>
                    </td>
                    <td>
                        <?= h($category->updatetime) ?>
                    </td>
                    <td class="actions">
                        <?= $this->Html->link(__('Xem Chi Tiết'), ['action' => 'view', $category->catid], ['class' => 'badge bg-success']) ?>
                        <?= $this->Html->link(__('Sửa'), ['action' => 'edit', $category->catid], ['class' => 'badge bg-primary']) ?>
                        <?= $this->Form->postLink(__('Xóa'), ['action' => 'delete', $category->catid], ['confirm' => __('Are you sure you want to delete # {0}?', $category->catid), 'class' => 'badge bg-danger']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php echo $this->element('mini_e/paginator'); ?>