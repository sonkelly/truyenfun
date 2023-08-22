<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\User> $users
 */
?>
<div class="users index content">
    <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3>
        <?= __('Users') ?>
    </h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>
                        <?= $this->Paginator->sort('uid') ?>
                    </th>
                    <th>
                        <?= $this->Paginator->sort('user_name') ?>
                    </th>
                    <th>
                        <?= $this->Paginator->sort('roles') ?>
                    </th>
                    <th>
                        <?= $this->Paginator->sort('create_time') ?>
                    </th>
                    <th>
                        <?= $this->Paginator->sort('update_time') ?>
                    </th>
                    <th class="actions">
                        <?= __('Actions') ?>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td>
                            <?= $this->Number->format($user->uid) ?>
                        </td>
                        <td>
                            <?= h($user->user_name) ?>
                        </td>
                        <td>
                            <?= $this->Number->format($user->roles) ?>
                        </td>
                        <td>
                            <?= h($user->create_time) ?>
                        </td>
                        <td>
                            <?= h($user->update_time) ?>
                        </td>
                        <td class="actions">
                            <?= $this->Html->link(__('Xem Chi Tiết'), ['action' => 'view', $user->uid]) ?>
                            <?= $this->Html->link(__('Sửa'), ['action' => 'edit', $user->uid]) ?>
                            <?= $this->Form->postLink(__('Xóa'), ['action' => 'delete', $user->uid], ['confirm' => __('Are you sure you want to delete # {0}?', $user->uid)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php echo $this->element('mini_e/paginator'); ?>