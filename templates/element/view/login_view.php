<?php
use Cake\Datasource\ConnectionManager;

/**
 * @var \App\View\AppView $this
 * @var array $params
 * @var string $message
 */
// init data tale hot

// echo "Debug: " . json_encode($idTale, JSON_UNESCAPED_UNICODE);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        Đăng Nhập
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->css([
        'login.css',
        'ultis_login.css',
    ]) ?>
    <?= $this->Html->script(['bootstrap.bundle.js', 'custom.js', 'bootstrap.bundle.min.js', 'bootstrap.js', 'bootstrap.min.js']) ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body>
    <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
        <div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
            <form action= 'pages/handleLogin' method="post" class="login100-form validate-form">
                <span class="login100-form-title p-b-37">
                    Đăng Nhập Admin
                </span>
                <div class="wrap-input100 validate-input m-b-20" data-validate="Enter username or email">
                    <?php
                    echo $this->Form->control('user_name', ['class' => 'input100', 'value' => 'Tên Đăng Nhập', 'label' => '']);
                    ?>
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 validate-input m-b-25" data-validate="Enter password">
                    <?php
                    echo $this->Form->control('password', ['class' => 'input100', 'value' => 'Password', 'label' => '']);
                    ?>
                    <span class="focus-input100"></span>
                </div>
                <div class="container-login100-form-btn">
                    <?= $this->Form->button(__('Đăng Nhập'), ['class' => 'login100-form-btn']) ?>
                </div>
            </form>
        </div>
    </div>
</body>

</html>