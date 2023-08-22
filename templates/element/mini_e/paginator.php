<?php
/**
 * @var \App\View\AppView $this
 * @var array $params
 * @var string $message
 */
?>

<div class="row">
    <!-- <div class="col-6">
        <?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?>
    </div> -->
    <div class="col-sm-12">
        <ul class="col-sm-12 pagination pagination-sm center">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
    </div>
</div>