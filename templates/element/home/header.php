<?php
use Cake\Datasource\ConnectionManager;

/**
 * @var \App\View\AppView $this
 * @var array $params
 * @var string $message
 */
// init data tale hot


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        CakePHP: the rapid development PHP framework:
        <?= $this->fetch('title') ?>
    </title>


    <?= $this->Html->css([
        'normalize.min',
        'all.min.css',
        'brands.css',
        'brands.min.css',
        'fontawesome.min.css',
        'regular.css',
        'regular.min.css',
        'solid.css',
        'solid.min.css',
        'svg-with-js.css',
        'svg-with-js.min.css',
        'v4-shims.css',
        'v4-shims.min.css',
        // 'cake',
        'custom-user.css',
        'bootstrap.min.css',
        'all.css',
        'fontawesome.css',
        'bootstrap.css',
        'adminlte.min.css',
        // 'adminlte.css',
        'old-1.css',
        'old-2.css',
        'bootstrap-reboot.min.css',
        'bootstrap-reboot.css',
        'bootstrap-grid.min.css',
        'bootstrap-grid.css',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css'
    ]) ?>
    <?= $this->Html->script(['bootstrap.bundle.js', 'custom.js', 'bootstrap.bundle.min.js', 'bootstrap.js', 'bootstrap.min.js']) ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <script>
        window.addEventListener('click', function (e) {
            if (document.getElementById('menu1').contains(e.target)) {
                // Clicked in box
            } else {
                document.getElementById("menu1").classList.remove('open');
            }
            if (document.getElementById('menu2').contains(e.target)) {
                // Clicked in box
            } else {
                document.getElementById("menu2").classList.remove('open');
            }
        });
        function ShowMenu(index) {
            if (index == 1) {
                var menu = document.getElementById("menu1");
                var listClass = menu.classList;
                if (listClass.length == 2) {
                    listClass.remove('open');
                } else {
                    listClass.add('open');
                }
            } else if (index == 2) {
                var menu = document.getElementById("menu2");
                var listClass = menu.classList;
                if (listClass.length == 2) {
                    listClass.remove('open');
                } else {
                    listClass.add('open');
                }
            }
        }
    </script>

</head>

<body class="body-home">
    <div class="wrapper">
        <nav class="navbar-expand-lg navbar-default">
            <div class="container">
                <div class="navbar-collapse collapse">
                    <meta itemprop="url" content="https://truyenfull.vn">
                    <ul class="control nav navbar-nav ">
                        <a class="header-logo" href="<?php echo $this->Url->build("/"); ?>" title="doc truyen">doc truyen</a>

                        <?php echo $this->element('menu/menu_list'); ?>
                        <?php echo $this->element('menu/menu_list_cat'); ?>

                        <li class="dropdown"><a href="javascript:void(0)" data-toggle="dropdown"><span
                                    class="glyphicon glyphicon-cog"></span> Tùy chỉnh <span class="caret"></span></a>
                            <div class="dropdown-menu dropdown-menu-right settings">
                                <form class="form-horizontal">
                                    <div class="form-group form-group-sm"><label class="col-sm-2 col-md-5 control-label"
                                            for="truyen-background">Màu nền</label>
                                        <div class="col-sm-5 col-md-7"><select class="form-control"
                                                id="truyen-background">
                                                <option value="#F4F4F4" selected="">Xám nhạt</option>
                                                <option value="#232323">Màu tối</option>
                                            </select></div>
                                    </div>
                                </form>
                            </div>
                        </li>
                    </ul>
                    <form class="navbar-form navbar-right" action="https://truyenfull.vn/tim-kiem/" role="search"
                        itemprop="potentialAction" itemscope="" itemtype="https://schema.org/SearchAction">
                        <div class="input-group search-holder">
                            <meta itemprop="target" content="https://truyenfull.vn/tim-kiem/?tukhoa={tukhoa}"><input
                                aria-label="Từ khóa tìm kiếm" role="search key" class="form-control" id="search-input"
                                type="search" name="tukhoa" placeholder="Tìm kiếm..." value="" itemprop="query-input"
                                required="">
                            <div class="input-group-btn"><button class="btn btn-default" type="submit"
                                    aria-label="Tìm kiếm" role="search"><span
                                        class="glyphicon glyphicon-search"></span></button></div>
                        </div>
                        <div class="list-group list-search-res hide"></div>
                    </form>
                </div>
            </div>
        </nav>
        <div class="navbar-breadcrumb">
            <div class="container breadcrumb-container"> Đọc truyện online, đọc truyện chữ, truyện full, truyện hay.
                Tổng hợp đầy đủ và cập nhật liên tục. </div>
        </div>
        <div class="content">