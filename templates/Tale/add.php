<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tale $tale
 */
?>

<?= $this->Form->create($tale, ["enctype" => "multipart/form-data"]) ?>
<div class="row">
    <h3>
        <?= __('Thêm Truyện') ?>
    </h3>
</div>
<div class="row form-group">
    <div class="col-sm-3">
        <?php echo $this->Form->control('tale_name', ["class" => "form-control", 'label' => 'Tên Truyện']); ?>
    </div>
    <div class="col-sm-3">
        <?php echo $this->Form->control('tale_author', ["class" => "form-control", 'label' => 'Tác Giả']); ?>
    </div>
    <div class="col-sm-3">
        <label class="form-label">Ảnh</label>
        <input type="file" name="image" class="form-control" class="image">
    </div>
    <div class="col-sm-3">
        <?php echo $this->Form->control('tale_source', ["class" => "form-control", 'label' => 'Nguồn']); ?>
    </div>
</div>
<div class="row form-group">
    
    <div class="col-sm-12">
        <?php echo $this->Form->control('chap_path', ["class" => "form-control", 'label' => 'Thư Mục Chương']); ?>
    </div>
   
</div>

<div class="row form-group">
    <div class="col-sm-3">
        <label class="form-label">Danh Mục</label>
        <select class="form-control" name="category_ids[]" multiple size="10">
            <?php foreach ($cats as $cat): ?>
                <option value="<?= h($cat["catid"]) ?>">
                    <?= h($cat["category_name"]) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="col-sm-9">
        <?php echo $this->Form->control('tale_introduce', ['type' => 'textarea', 'name' => 'tale_introduce', 'class' => 'form-control', 'rows' => 10, 'label' => 'Giới Thiệu']); ?>
    </div>
</div>
<div class="form-group">
    <?= $this->Form->button(__('Thêm Truyện'), ["class" => "btn btn-success"]) ?>
    <?= $this->Form->end() ?>
</div>