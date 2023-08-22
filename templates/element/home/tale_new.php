<?php
use Cake\Datasource\ConnectionManager;

/**
 * @var \App\View\AppView $this
 * @var array $params
 * @var string $message
 */
// init data tale hot

$tale = getTaleNew();
function getTaleNew()
{
        $ConnAdmin = ConnectionManager::get('default');
        $query = 'SELECT * FROM tale';
        $data = $ConnAdmin->execute($query)->fetchAll('assoc');
        if ($data) {
                // echo json_encode( $data, JSON_UNESCAPED_UNICODE);
                return $data;
        } else {
                return [];
        }
}

?>

<div class="row">
        <div class="container title-home mt-3">
                <div class="title-text-home">
                        <h4>Truyện Mới Cập Nhật</h4>
                </div>
        </div>
        <div class="container mt-3">
                <div class="col-md-8">
                        <?php foreach ($tale as $tal): ?>
                                <div class="row" itemscope="" itemtype="https://schema.org/Book">
                                        <div class="col-xs-9 col-sm-6 col-md-5 col-title">
                                                <span class="glyphicon glyphicon-chevron-right"></span>
                                                <a href="#" class="link-dark">
                                                        <?= h($tal["tale_name"]) ?>
                                                </a>
                                                <span class="label-title label-hot"></span>
                                        </div>
                                        <div class="hidden-xs col-sm-3 col-md-3 col-cat"><a href="#" class="link-dark">Ngôn
                                                        Tình</a></div>
                                        <div class="col-xs-3 col-sm-3 col-md-2 col-chap text-info"><a href="#">
                                                        <span class="chapter-text">
                                                                <span>Chương</span></span>235</a></div>
                                        <div class="hidden-xs hidden-sm col-md-2 col-time">5 giờ trước </div>
                                </div>
                        <?php endforeach; ?>
                </div>
                <div class="col-md-4 col-truyen-side">
                        <div class="visible-md-block visible-lg-block text-center">
                                <div class="list list-truyen list-history col-xs-12">
                                        <div class="title-list">
                                                <h2>Truyện đang đọc</h2>
                                        </div>
                                        <div class="row">
                                                <div class="col-md-5 col-lg-7"><span
                                                                class="glyphicon glyphicon-chevron-right"></span>
                                                        <h3 itemprop="name"><a
                                                                        href="https://truyenfull.vn/khon-ninh/">Khôn
                                                                        Ninh</a></h3>
                                                </div>
                                                <div class="col-md-7 col-lg-5 text-info"><a
                                                                href="https://truyenfull.vn/khon-ninh/chuong-1/">Đọc
                                                                tiếp C1</a></div>
                                        </div>
                                        <div class="row">
                                                <div class="col-md-5 col-lg-7"><span
                                                                class="glyphicon glyphicon-chevron-right"></span>
                                                        <h3 itemprop="name"><a
                                                                        href="https://truyenfull.vn/the-gioi-kinh-di-toi-thu-tien-thue-trong-tro-choi-kinh-di/">Thế
                                                                        Giới Kinh Dị Tôi Thu Tiền Thuê Trong Trò Chơi
                                                                        Kinh Dị</a></h3>
                                                </div>
                                                <div class="col-md-7 col-lg-5 text-info"><a
                                                                href="https://truyenfull.vn/the-gioi-kinh-di-toi-thu-tien-thue-trong-tro-choi-kinh-di/chuong-175/">Đọc
                                                                tiếp C175</a></div>
                                        </div>
                                </div>
                                <div class="list list-truyen list-cat col-xs-12">
                                        <div class="title-list">
                                                <h4>Thể loại truyện</h4>
                                        </div>
                                        <div class="row">
                                                <div class="col-xs-6">
                                                        <a class ="link-dark" href="https://truyenfull.vn/the-loai/tien-hiep/"
                                                                title="Truyện Tiên Hiệp">Tiên Hiệp</a>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
</div>