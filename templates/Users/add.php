<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div class="row">
    <aside class="column-30">
        <div class="side-nav">
            <?php echo $this->element('admin_side_menu/admin-side-bar'); ?>
        </div>
    </aside>
    <div class="column-responsive column-70">
        <div class="users form content">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend>
                    <?= __('Add User') ?>
                </legend>
                <?php
                echo $this->Form->control('user_name');
                echo $this->Form->control('password');
                echo $this->Form->control('roles');
                echo $this->Form->control('create_time');
                echo $this->Form->control('update_time');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>