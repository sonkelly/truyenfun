<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Core\App;
use Cake\Datasource\ConnectionManager;
use Cake\I18n\FrozenTime;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

/**
 * Chapter Controller
 *
 * @property \App\Model\Table\ChapterTable $Chapter
 * @method \App\Model\Entity\Chapter[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ChapterController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

    public function initialize(): void
    {
        parent::initialize();
        header('Access-Control-Allow-Origin: *');
        $this->loadComponent('RequestHandler');
        $this->ConnAdmin = ConnectionManager::get('default');
    }

    public function cutChapterName($contents)
    {
        $str2 = explode("Chương ", $contents);
        $str3 = explode(": ", $str2[1]);
        $str4 = explode("\r", $str3[1]);
        return $str4[0];
    }

    public function cutChapterIndex($path)
    {
        $str2 = explode(".txt", $path);
        $str3 = explode("-", $str2[0]);
        return $str3[sizeof($str3) - 1];
    }
    public function index($tale_id = null)
    {
        $tale = $this->getTaleById($tale_id);
        if ($tale != null) {
            $this->set(compact('tale'));
        }
        $chapter = $this->paginate($this->Chapter);
        if ($tale_id != null) {
            $chapter = $this->paginate($this->Chapter->find()->where(['tale_id' => $tale_id])->order(['chap_index' => 'ASC']));
        }

        $this->set(compact('chapter'));
    }

    /**
     * View method
     *
     * @param string|null $id Chapter id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $chapter = $this->Chapter->get($id, [
            'contain' => [],
        ]);
        $tale = $this->getTaleById($chapter->tale_id);
        if ($tale != null) {
            // echo json_encode( $tale, JSON_UNESCAPED_UNICODE);
            $this->set(compact('tale'));
        }
        $this->set(compact('chapter'));


        $path = WWW_ROOT . "chapters/" . $chapter["path"];
        $file = new File($path);
        $contents = $file->read(false, "rb", true);
        $this->set(compact('contents'));
        $file->close(); // Be sure to close the file when you're done
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($tale_id)
    {
        $chapter = $this->Chapter->newEmptyEntity();
        if ($this->request->is('post')) {
            $chapter = $this->Chapter->patchEntity($chapter, $this->request->getData());
            $maxIndex = $this->getMaxIndexChapter($chapter->tale_id);
            // $this->Flash->error(__(json_encode($maxIndex, JSON_UNESCAPED_UNICODE)));
            $chapter->chap_index = $maxIndex + 1;
            $chapter->create_time = FrozenTime::now();
            $chapter->update_time = FrozenTime::now();
            if ($this->Chapter->save($chapter)) {
                $this->Flash->success(__('The chapter has been saved.'));
                return $this->redirect(['controller' => 'chapter', 'action' => 'index', $chapter->tale_id]);
            }
            $this->Flash->error(__('The chapter could not be saved. Please, try again.'));
        }
        $tale = $this->getTaleById($tale_id);
        if ($tale != null) {
            $this->set(compact('tale'));
        }
        $tales = $this->getAllTale();
        $this->set(compact('tales'));
        $this->set(compact('chapter'));
    }

    public function getMaxIndexChapter($tale_id = null)
    {
        if ($tale_id != null) {
            $query = 'SELECT MAX(chap_index) FROM chapter WHERE tale_id =' . $tale_id;
            $data = $this->ConnAdmin->execute($query)->fetchAll('assoc');
            if ($data) {
                return $data[0]["MAX(chap_index)"];
            } else {
                return 0;
            }
        }
    }

    public function getAllTale()
    {
        $query = 'SELECT tale_id,tale_name FROM tale';
        $data = $this->ConnAdmin->execute($query)->fetchAll('assoc');
        if ($data) {
            return $data;
        } else {
            return [];
        }
    }

    public function getTaleById($id)
    {
        $query = 'SELECT tale_id,tale_name,chap_path FROM tale WHERE tale_id =' . $id;
        $data = $this->ConnAdmin->execute($query)->fetchAll('assoc');
        if (sizeof($data) > 0) {
            return $data[0];
        } else {
            return null;
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Chapter id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $chapter = $this->Chapter->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $chapter = $this->Chapter->patchEntity($chapter, $this->request->getData());
            $chapter->update_time = FrozenTime::now();
            if ($this->Chapter->save($chapter)) {
                $this->Flash->success(__('The chapter has been saved.'));
                return $this->redirect(['controller' => 'chapter', 'action' => 'index', $chapter->tale_id]);
            }
            $this->Flash->error(__('The chapter could not be saved. Please, try again.'));
        }

        $tale = $this->getTaleById($chapter->tale_id);
        if ($tale != null) {
            $this->set(compact('tale'));
        }
        $tales = $this->getAllTale();
        $this->set(compact('tales'));
        $this->set(compact('chapter'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Chapter id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $chapter = $this->Chapter->get($id);
        if ($this->Chapter->delete($chapter)) {
            $this->Flash->success(__('The chapter has been deleted.'));
        } else {
            $this->Flash->error(__('The chapter could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function autoAdd($tale_id)
    {
        $tale = $this->getTaleById($tale_id);
        if ($tale != null) {
            $this->set(compact('tale'));
        }
        $path = WWW_ROOT . "chapters/" . $tale["chap_path"];
        $dir = new Folder($path, false, 0755);
        $files = $dir->find('.*\.txt');
        foreach ($files as $file) {
            $path = $file;
            $file = new File($dir->pwd() . DS . $file);
            $contents = $file->read(false, "rb", true);
            // echo json_encode($path, JSON_UNESCAPED_UNICODE);
            // echo json_encode("----" . $this->cutChapterName($contents), JSON_UNESCAPED_UNICODE);
            // echo json_encode("----" . $this->cutChapterIndex($path), JSON_UNESCAPED_UNICODE);
            $file->close(); // Be sure to close the file when you're done
            // init chap
            $chapter = $this->Chapter->newEmptyEntity();
            $chapter->chap_name = $this->cutChapterName($contents);
            $chapter->tale_id = $tale_id;
            $chapter->chap_index = $this->cutChapterIndex($path);
            $chapter->path = $tale["chap_path"] . "/" . $path;
            $chapter->create_time = FrozenTime::now();
            $chapter->update_time = FrozenTime::now();
            $this->Flash->error(__(json_encode($chapter, JSON_UNESCAPED_UNICODE)));
            if ($this->Chapter->save($chapter)) {
                // $this->Flash->success(__('The chapter has been saved.'));
            } else {
                // $this->Flash->error(__('The chapter could not be saved. Please, try again.'));
            }
        }
        return $this->redirect(['action' => 'index', $tale_id]);
    }
}