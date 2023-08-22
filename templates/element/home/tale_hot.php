<?php
use Cake\Datasource\ConnectionManager;

/**
 * @var \App\View\AppView $this
 * @var array $params
 * @var string $message
 */
// init data tale hot

$tale = getTaleHot();
function getTaleHot()
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
        <div class="title-text-home mt-3">
            <h4>Truyện Hot</h4><i class="fab fa-hotjar"></i>
        </div>
    </div>
    <div class="container px-4 px-lg-5 mt-3">
        <?php foreach ($tale as $tal): ?>
            <div class="item-tale">
                <a href="<?php echo $this->Url->build("/pages/taleView/" .$tal["tale_id"]); ?>"
                    itemprop="url">
                    <span class="full-label"></span>
                    <img src="<?php echo $this->Url->build('/' . $tal["avatar"]); ?>" class="img-avatar-tale"
                        itemprop="image">
                    <div class="title-tale">
                        <?php echo ($tal["tale_name"]) ?>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>