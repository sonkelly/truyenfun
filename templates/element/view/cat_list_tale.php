<?php
use Cake\Datasource\ConnectionManager;

/**
 * @var \App\View\AppView $this
 * @var array $params
 * @var string $message
 */
// init data tale hot

// echo "Debug: " . json_encode($idTale, JSON_UNESCAPED_UNICODE);

$tales = getListTaleByCategory($cat["catid"]);
function getListTaleByCategory($id)
{
    $ConnAdmin = ConnectionManager::get('default');
    $query = 'SELECT * FROM tale';
    $data = $ConnAdmin->execute($query)->fetchAll('assoc');
    $listTale = [];
    if ($data) {
        foreach ($data as $tale) {
            // echo "Tale: " . json_encode($tale, JSON_UNESCAPED_UNICODE);
            $catIds = explode(",", $tale["category_ids"]);
            foreach ($catIds as $idCat) {
                if ((int) $idCat == $id) {
                    $listTale[] = $tale;
                    break;
                }
            }
        }
    }
    return $listTale;
}

?>

<div class="row">
    <div class="container " id="list-page">

        <div class="col-xs-12 col-sm-12 col-md-9 col-truyen-main">
            <div class="list list-truyen col-xs-12">
                <div class="title-list cat-title">
                    <h2>
                        <?= h($cat["category_name"]) ?>
                    </h2>
                </div>
                <?php foreach ($tales as $tale): ?>
                    <div class="row">
                        <div class="col-xs-3 col-sm-2 col-md-3 col-list-image">
                            <div><img src="<?php echo $this->Url->build('/' . $tale["avatar"]); ?>" itemprop="image"
                                    width="100" height="150"></div>
                        </div>
                        <div class="col-xs-9 col-sm-10 col-md-9 col-list-info">
                            <div><span class="glyphicon glyphicon-book"></span>
                                <h3 class="truyen-title" itemprop="name"><a
                                        href="<?php echo $this->Url->build("/pages/taleView/" . $tale["tale_id"]); ?>"><?= h($tale["tale_name"]) ?></a>
                                </h3><span class="label-title label-hot"></span><span class="author"><span
                                        class="glyphicon glyphicon-pencil"></span>
                                    <?= h($tale["tale_name"]) ?>
                                </span><span class="author"><span class="glyphicon glyphicon-list"></span> 2407
                                    chương</span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="col-md-3 text-center col-truyen-side">
            <?php echo $this->element('mini_e/list_tale_fillter_side_bar'); ?>
            <?php echo $this->element('mini_e/list_tale_hot_side_bar'); ?>
        </div>
    </div>
</div>