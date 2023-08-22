<?php
/**
 * @var \App\View\AppView $this
 * @var array $params
 * @var string $message
 */
?>
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <?= $this->Html->link(__('Danh Sách Danh Mục'), ['controller' => 'category', 'action' => 'index'], ['class' => 'nav-link']) ?>
        </li>
        <li class="nav-item">
            <?= $this->Html->link(__('Danh Sách Truyện'), ['controller' => 'tale', 'action' => 'index'], ['class' => 'nav-link']) ?>
        </li>
    </ul>
</nav>