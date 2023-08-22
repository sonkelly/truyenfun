<?php
use Cake\Datasource\ConnectionManager;

/**
 * @var \App\View\AppView $this
 * @var array $params
 * @var string $message
 */
// init data list cat

$cats = getListCategory();
function getListCategory()
{
    $ConnAdmin = ConnectionManager::get('default');
    $query = 'SELECT * FROM category';
    $data = $ConnAdmin->execute($query)->fetchAll('assoc');
    if ($data) {
        // echo json_encode( $data, JSON_UNESCAPED_UNICODE);
        return $data;
    } else {
        return [];
    }
}


?>
<li class="dropdown" id="menu2"><a href="javascript:ShowMenu(2)" data-toggle="dropdown"><span
            class="glyphicon glyphicon-list">
        </span>
        Danh Mục <span class="caret"></span></a>
    <ul class="dropdown-menu" role="menu">
        <?php foreach ($cats as $cat): ?>
            <li><a href="<?php echo $this->Url->build("/pages/categoryView/" . $cat["catid"]); ?>"><?= h($cat["category_name"]) ?></a></li>
        <?php endforeach; ?>
    </ul>
</li>