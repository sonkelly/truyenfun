<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Table\CategoryTable;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;

class TaleController extends AppController
{

    public function initialize(): void
    {
        parent::initialize();
        header('Access-Control-Allow-Origin: *');
        $this->loadComponent('RequestHandler');
        $this->ConnAdmin = ConnectionManager::get('default');
        $this->Category = TableRegistry::get('Category', ['connection' => $this->ConnAdmin]);
    }
    public function index()
    {
        $tale = $this->paginate($this->Tale);
        $this->set(compact('tale'));
    }

    public function view($id = null)
    {
        $tale = $this->Tale->get($id, [
            'contain' => [],
        ]);

        $catIds = explode(",", $tale->category_ids);
        $cats = [];
        foreach ($catIds as $id) {
            $cat = $this->getCategoryById($id);
            $cats[] = $cat;
        }
        $this->set(compact('cats'));
        $this->set(compact('tale'));
    }

    public function add()
    {

        $tale = $this->Tale->newEmptyEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $data["status"] = 1;
            $data["tale_assess"] = 0;
            $listCatIdStr = "";
            $mess = "Thêm thất bại";
            if (isset($data["category_ids"])) {
                foreach ($data["category_ids"] as $key => $value) {
                    $listCatIdStr = $listCatIdStr . $value;
                    if ($key < sizeof($data["category_ids"]) - 1) {
                        $listCatIdStr = $listCatIdStr . ",";
                    }
                }
            } else {
                $mess = "Chưa chọn danh mục";
            }
            $data["category_ids"] = $listCatIdStr;
            $productImage = $this->request->getData("image");
            if (isset($productImage)) {
                $hasFileError = $productImage->getError();
                if ($hasFileError > 0) {
                    // no file uploaded
                    $data["avatar"] = "";
                } else {
                    // file uploaded
                    $fileName = $productImage->getClientFilename();
                    $fileType = $productImage->getClientMediaType();

                    if ($fileType == "image/png" || $fileType == "image/jpeg" || $fileType == "image/jpg") {
                        $imagePath = WWW_ROOT . "img/" . $fileName;
                        $productImage->moveTo($imagePath);
                        $data["avatar"] = "img/" . $fileName;
                    }
                }
            } else {
                $data["avatar"] = "";
            }
            $tale = $this->Tale->patchEntity($tale, $data);
            // $this->Flash->error(__(json_encode($tale, JSON_UNESCAPED_UNICODE)));

            if ($this->Tale->save($tale)) {
                $mess = "Thêm thành công";
                $this->Flash->success(__($mess));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__($mess));
        }
        $cats = $this->getAllCategory();
        $this->set(compact('cats'));
        $this->set(compact('tale'));
    }

    public function getAllCategory()
    {
        // return $this->Category->find()->select(['catid', 'category_name']);
        $query = 'SELECT catid,category_name FROM category';
        $data = $this->ConnAdmin->execute($query)->fetchAll('assoc');
        if ($data) {
            // echo json_encode( $data, JSON_UNESCAPED_UNICODE);
            return $data;
        } else {
            return [];
        }
    }
    public function getCategoryById($id)
    {
        $query = 'SELECT category_name FROM category WHERE catid=' . $id;
        $data = $this->ConnAdmin->execute($query)->fetchAll('assoc');
        if ($data) {
            return $data[0];
        } else {
            return null;
        }
    }

    public function edit($id = null)
    {
        $tale = $this->Tale->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $data["status"] = 1;
            $data["tale_assess"] = 0;
            $listCatIdStr = "";
            if (var_dump(isset($data["category_ids"]))) {
                foreach ($data["category_ids"] as $key => $value) {
                    $listCatIdStr = $listCatIdStr . $value;
                    if ($key < sizeof($data["category_ids"]) - 1) {
                        $listCatIdStr = $listCatIdStr . ",";
                    }
                }
                $data["category_ids"] = $listCatIdStr;
            }
            $productImage = $this->request->getData("image");
            if (var_dump(isset($productImage))) {
                $hasFileError = $productImage->getError();
                if ($hasFileError > 0) {
                    // no file uploaded
                    $data["avatar"] = "";
                } else {
                    // file uploaded
                    $fileName = $productImage->getClientFilename();
                    $fileType = $productImage->getClientMediaType();

                    if ($fileType == "image/png" || $fileType == "image/jpeg" || $fileType == "image/jpg") {
                        $imagePath = WWW_ROOT . "img/" . $fileName;
                        $productImage->moveTo($imagePath);
                        $data["avatar"] = "img/" . $fileName;
                        $tale->avatar = "img/" . $fileName;
                    }
                }
            }

            if ($listCatIdStr != "") {
                $tale->category_ids = $listCatIdStr;
            }
            $tale->tale_name = $data["tale_name"];
            $tale->tale_author = $data["tale_author"];
            $tale->tale_source = $data["tale_source"];
            $tale->tale_introduce = $data["tale_introduce"];
            $tale->chap_path = $data["chap_path"];
            if ($this->Tale->save($tale)) {
                $this->Flash->success(__('The tale has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tale could not be saved. Please, try again.'));
        }
        $catIds = explode(",", $tale->category_ids);
        $currentCats = [];
        foreach ($catIds as $id) {
            $cat = $this->getCategoryById($id);
            $currentCats[] = $cat;
        }
        $cats = $this->getAllCategory();
        $this->set(compact('currentCats'));
        $this->set(compact('cats'));
        $this->set(compact('tale'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tale = $this->Tale->get($id);
        if ($this->Tale->delete($tale)) {
            $this->Flash->success(__('The tale has been deleted.'));
        } else {
            $this->Flash->error(__('The tale could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}