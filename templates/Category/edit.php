<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>

<?= $this->Form->create($category) ?>
<div class="row">
    <h3>
        <?= __('Sửa Danh Mục') ?>
    </h3>
</div>
<div class="row">
    <div class="col-sm-4">
        <?php echo $this->Form->control('category_name', ["class" => "form-control", "label" => "Tên Danh Mục"]); ?>
    </div>
    <div class="col-sm-4">
        <?php echo $this->Form->control('createtime', ["class" => "form-control", "label" => "Thời Gian Tạo"]); ?>
    </div>
    <div class="col-sm-4">
        <?php echo $this->Form->control('updatetime', ["class" => "form-control", "label" => "Thời Gian Chỉnh Sửa"]); ?>
    </div>
</div>
<div class="form-group">
    <label for="exampleTextarea" class="form-label mt-4">Mô Tả Danh Mục</label>
    <textarea class="form-control" name="description" rows="10"><?php echo($category->description)?></textarea>
</div>
<?= $this->Form->button(__('Sửa Danh Mục'), ["class" => "btn btn-success form-group"]) ?>
<?= $this->Form->end() ?>