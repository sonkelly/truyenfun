<?php
use Cake\Datasource\ConnectionManager;

/**
 * @var \App\View\AppView $this
 * @var array $params
 * @var string $message
 */
// init data tale hot

// echo "Debug: " . json_encode($idTale, JSON_UNESCAPED_UNICODE);

$tale = getTaleContent($idTale);
function getTaleContent($id)
{

    $ConnAdmin = ConnectionManager::get('default');
    $query = 'SELECT * FROM tale WHERE tale_id=' . $id;
    $data = $ConnAdmin->execute($query)->fetchAll('assoc');
    if ($data) {
        // echo json_encode($data, JSON_UNESCAPED_UNICODE);
        return $data[0];
    } else {
        return [];
    }
}

?>

<div class="row">
    <div class="container">
        <div class="col-xs-12 col-sm-12 col-md-9 col-truyen-main">
            <div class="col-xs-12 col-info-desc" itemscope="">
                <div class="title-list book-intro">
                    <h2>Thông tin truyện</h2>
                </div>
                <h3 class="title" itemprop="name">
                    <?php echo $tale["tale_name"]; ?>
                </h3>

                <div class="col-xs-12 col-sm-4 col-md-4 info-holder">
                    <div class="books">
                        <div class="book"><img src="<?php echo $this->Url->build('/' . $tale["avatar"]); ?>"
                                itemprop="image" width="100" height="150">
                            <div class="book-shadow"></div>
                        </div>
                    </div>
                    <div class="info">
                        <div>
                            <h3>Tác giả:</h3><a itemprop="author" href="https://truyenfull.com/tac-gia/thanh-phong/"
                                title="Thanh Phong">Thanh Phong</a>
                        </div>
                        <div>
                            <h3>Thể loại:</h3><a href="https://truyenfull.com/truyen-tien-hiep/" itemprop="genre"
                                title="Tiên Hiệp">Tiên Hiệp</a>, <a href="https://truyenfull.com/truyen-kiem-hiep/"
                                itemprop="genre" title="Kiếm Hiệp">Kiếm Hiệp</a>, <a
                                href="https://truyenfull.com/truyen-ngon-tinh/" itemprop="genre" title="Ngôn Tình">Ngôn
                                Tình</a>, <a href="https://truyenfull.com/truyen-gia-dau/" itemprop="genre"
                                title="Gia Đấu">Gia Đấu</a>
                        </div>
                        <div>
                            <h3>Trạng thái:</h3><span class="text-primary">Đang ra</span>
                        </div>
                        <div>
                            <h3>Tags:</h3> <a href="https://truyenfull.com/tag/truyen-tien-hiep-huyen-ao-hay/"
                                title="truyện tiên hiệp huyền ảo hay">truyện tiên hiệp huyền ảo hay</a>, <a
                                href="https://truyenfull.com/tag/tieu-thuyet-kiem-hiep/"
                                title="tiểu thuyết kiếm hiệp">tiểu thuyết kiếm hiệp</a>, <a
                                href="https://truyenfull.com/tag/truyenyy/" title="truyenyy">truyenyy</a>, <a
                                href="https://truyenfull.com/tag/truyen-hay-wattpad/" title="truyen hay wattpad">truyen
                                hay wattpad</a>
                        </div>
                    </div>

                </div>
                <div class="col-xs-12 col-sm-8 col-md-8 desc">
                    <div class="rate">
                        <div class="rate-holder" data-score="7.8" style="cursor: pointer;"><img width="16" height="16"
                                src="//cdn.truyenfull.com/assets/truyenfull/img/star-on.png"
                                title="Không còn gì để nói..." alt="1"><img width="16" height="16"
                                src="//cdn.truyenfull.com/assets/truyenfull/img/star-on.png" title="WTF" alt="2"><img
                                width="16" height="16" src="//cdn.truyenfull.com/assets/truyenfull/img/star-on.png"
                                title="Cái gì thế này ?!" alt="3"><img width="16" height="16"
                                src="//cdn.truyenfull.com/assets/truyenfull/img/star-on.png" title="Haizz" alt="4"><img
                                width="16" height="16" src="//cdn.truyenfull.com/assets/truyenfull/img/star-on.png"
                                title="Tạm" alt="5"><img width="16" height="16"
                                src="//cdn.truyenfull.com/assets/truyenfull/img/star-on.png" title="Cũng được"
                                alt="6"><img width="16" height="16"
                                src="//cdn.truyenfull.com/assets/truyenfull/img/star-on.png" title="Khá đấy"
                                alt="7"><img width="16" height="16"
                                src="//cdn.truyenfull.com/assets/truyenfull/img/star-half.png" title="Được" alt="8"><img
                                width="16" height="16" src="//cdn.truyenfull.com/assets/truyenfull/img/star-off.png"
                                title="Hay" alt="9"><img width="16" height="16"
                                src="//cdn.truyenfull.com/assets/truyenfull/img/star-off.png" title="Tuyệt đỉnh!"
                                alt="10"></div> <em class="rate-text"></em>
                        <div class="small" itemprop="aggregateRating" itemscope=""
                            itemtype="https://schema.org/AggregateRating"><em>Đánh giá: <strong><span
                                        itemprop="ratingValue">7.8</span></strong>/<span class="text-muted"
                                    itemprop="bestRating">10</span>
                                <meta itemprop="worstRating" content="1"> từ <strong><span
                                        itemprop="ratingCount">179</span> lượt</strong>
                            </em></div>
                    </div>
                    <div class="desc-text desc-text-full">
                        <div style="text-align: justify;">Bạn đang đọc truyện <b>
                                <?php echo $tale["tale_name"]; ?>
                            </b> của tác giả
                            <b>
                                <?php echo $tale["tale_author"]; ?>
                            </b>.
                            <?php echo $tale["tale_introduce"]; ?>
                        </div>
                        <!-- <div class="showmore"> <button type="button" class="btn btn-default btn-xs" title="Xem thêm">Xem
                                thêm »</button>
                        </div> -->
                    </div>
                </div>
            </div>
            <?php echo $this->element('view/tale_list_chapter'); ?>

        </div>
        <div class="col-md-3 text-center col-truyen-side">
            <?php echo $this->element('mini_e/list_tale_fillter_side_bar'); ?>
            <?php echo $this->element('mini_e/list_tale_hot_side_bar'); ?>
        </div>
    </div>

</div>