<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>
<div class="row">
    <div class="col-sm-6">
        <div class="column-responsive column-80">
            <div class="category view content">
                <table>
                    <tr>
                        <th>
                            <?= __('Tên Danh Mục: ') ?>
                        </th>
                        <td>
                            <h4>
                                <?= h($category->category_name) ?>
                            </h4>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?= __('Thời gian tạo: ') ?>
                        </th>
                        <td>
                            <?= h($category->createtime) ?>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?= __('Thời gian chỉnh sửa: ') ?>
                        </th>
                        <td>
                            <?= h($category->updatetime) ?>
                        </td>
                    </tr>
                </table>

            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <aside class="column">
            <div class="side-nav">
                <?= $this->Html->link(__('Sửa'), ['action' => 'edit', $category->catid], ['class' => 'side-nav-item badge bg-primary']) ?>
                <?= $this->Form->postLink(__('Xóa'), ['action' => 'delete', $category->catid], ['confirm' => __('Are you sure you want to delete # {0}?', $category->catid), 'class' => 'side-nav-item badge bg-danger']) ?>
                <?= $this->Html->link(__('Thêm Danh Mục'), ['action' => 'add'], ['class' => 'side-nav-item badge bg-success']) ?>
            </div>
        </aside>
    </div>
</div>

<div class="row col-sm-12">
    <div class="text">
        <strong>
            <?= __('Mô tả: ') ?>
        </strong>
        <blockquote>
            <?= $this->Text->autoParagraph(h($category->description)); ?>
        </blockquote>
    </div>
</div>