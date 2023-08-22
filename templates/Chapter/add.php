<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Chapter $chapter
 */
?>
<?= $this->Form->create($chapter) ?>
<div class="row">
    <h3>
        <?= __('Thêm Chương') ?>
    </h3>
</div>

<div class="row form-group">
    <div class="col-sm-6">
        <label for="exampleSelect1" class="form-label">Tên Truyện</label>
        <select class="form-control" name="tale_id">
            <?php foreach ($tales as $tal): ?>
                <?php if ($tale["tale_id"] == $tal["tale_id"]) { ?>
                    <option selected value="<?php echo $tal["tale_id"] ?>">
                        <?php echo $tal["tale_name"] ?>
                    </option>
                <?php } else { ?>
                    <option value="<?php echo $tal["tale_id"] ?>">
                        <?php echo $tal["tale_name"] ?>
                    </option>
                <?php } ?>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="col-sm-6">
        <?php echo $this->Form->control('chap_name', ["class" => "form-control", 'label' => 'Tên Chương']); ?>
    </div>
</div>
<div class="row form-group">
    <div class="col-sm-12">
        <?php echo $this->Form->control('path', ["class" => "form-control", 'label' => 'URL File']); ?>
    </div>
</div>
<div class="row form-group">
    <div class="col-sm-12">
        <?php echo $this->Form->control('chap_content', ['type' => 'textarea', 'name' => 'chap_content', 'class' => 'form-control', 'rows' => 10, 'label' => 'Nội Dung']); ?>
    </div>
</div>

<div class="form-group">
    <?= $this->Form->button(__('Thêm Chương'), ["class" => "btn btn-success"]) ?>
    <?= $this->Form->end() ?>
</div>