<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\Http\Response;
use Cake\View\Exception\MissingTemplateException;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;
use App\Model\Entity\User;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

/**
 * Static content controller
 *
 * This controller will render views from templates/Pages/
 *
 * @link https://book.cakephp.org/4/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{
    /**
     * Displays a view
     *
     * @param string ...$path Path segments.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Http\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\View\Exception\MissingTemplateException When the view file could not
     *   be found and in debug mode.
     * @throws \Cake\Http\Exception\NotFoundException When the view file could not
     *   be found and not in debug mode.
     * @throws \Cake\View\Exception\MissingTemplateException In debug mode.
     */


    public function initialize(): void
    {
        parent::initialize();
        header('Access-Control-Allow-Origin: *');
        $this->loadComponent('RequestHandler');
        $this->ConnAdmin = ConnectionManager::get('default');
        $this->Category = TableRegistry::get('Category', ['connection' => $this->ConnAdmin]);
        $this->Chapter = TableRegistry::get('Chapter', ['connection' => $this->ConnAdmin]);
    }
    public function display(string ...$path): ?Response
    {
        if (!$path) {
            return $this->redirect('/');
        }
        if (in_array('..', $path, true) || in_array('.', $path, true)) {
            throw new ForbiddenException();
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        $this->set(compact('page', 'subpage'));

        try {
            return $this->render(implode('/', $path));
        } catch (MissingTemplateException $exception) {
            if (Configure::read('debug')) {
                throw $exception;
            }
            throw new NotFoundException();
        }
    }

    public function checkLogin(): ?Response
    {
        try {
            return $this->render(implode('/', ["login"]));
        } catch (MissingTemplateException $exception) {
            if (Configure::read('debug')) {
                throw $exception;
            }
            throw new NotFoundException();
        }
    }

    public function handleLogin(): ?Response
    {
        $this->loadModel('Users');
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $p = $this->request->getParam('password');
            $user = $this->Users->patchEntity($user, $this->request->getData());
            echo "Tesst: " . json_encode($user, JSON_UNESCAPED_UNICODE);
            

            // if ($this->Users->save($user)) {

            // return $this->redirect(['controller'=> 'category', 'action' => 'index']);
            // }
        }
        $this->set(compact('user'));


        // try {
        //     return $this->render(implode('/', ["login"]));
        // } catch (MissingTemplateException $exception) {
        //     if (Configure::read('debug')) {
        //         throw $exception;
        //     }
        //     throw new NotFoundException();
        // }
    }

    public function showHomePage(string ...$path): ?Response
    {
        if (!$path) {
            return $this->redirect('/');
        }
        if (in_array('..', $path, true) || in_array('.', $path, true)) {
            throw new ForbiddenException();
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        $this->set(compact('page', 'subpage'));

        try {
            return $this->render(implode('/', $path));
        } catch (MissingTemplateException $exception) {
            if (Configure::read('debug')) {
                throw $exception;
            }
            throw new NotFoundException();
        }
    }

    public function taleView($idTale = null): ?Response
    {
        // echo "Debug: " .json_encode( $idTale, JSON_UNESCAPED_UNICODE);
        $this->set(compact('idTale'));
        $chapters = $this->paginate($this->Chapter->find()->where(['tale_id' => $idTale])->order(['chap_index' => 'ASC']));
        $this->set(compact('chapters'));

        try {
            return $this->render(implode('/', ["tale"]));
        } catch (MissingTemplateException $exception) {
            if (Configure::read('debug')) {
                throw $exception;
            }
            throw new NotFoundException();
        }
    }

    public function categoryView($idCat = null): ?Response
    {
        // echo "Debug: " .json_encode( $idTale, JSON_UNESCAPED_UNICODE);
        $ConnAdmin = ConnectionManager::get('default');
        $query = 'SELECT * FROM category WHERE catid=' . $idCat;
        $data = $ConnAdmin->execute($query)->fetchAll('assoc');
        if ($data) {
            // echo json_encode($data, JSON_UNESCAPED_UNICODE);
            $cat = $data[0];
            $this->set(compact('cat'));
        }

        try {
            return $this->render(implode('/', ["list_tale_by_cat"]));
        } catch (MissingTemplateException $exception) {
            if (Configure::read('debug')) {
                throw $exception;
            }
            throw new NotFoundException();
        }
    }

    public function chapterView($idChap = null): ?Response
    {
        // echo "Debug: " .json_encode( $idTale, JSON_UNESCAPED_UNICODE);
        $ConnAdmin = ConnectionManager::get('default');
        $query = 'SELECT * FROM chapter WHERE chap_id=' . $idChap;
        $data = $ConnAdmin->execute($query)->fetchAll('assoc');
        if ($data) {
            $chap = $data[0];
            $this->set(compact('chap'));
        }





        $queryTale = 'SELECT * FROM tale WHERE tale_id=' . $chap["tale_id"];
        $dataTale = $ConnAdmin->execute($queryTale)->fetchAll('assoc');
        if ($dataTale) {
            $tale = $dataTale[0];
            $this->set(compact('tale'));
        }

        $queryListChap = 'SELECT * FROM chapter WHERE tale_id=' . $chap["tale_id"];
        $dataListChap = $ConnAdmin->execute($queryListChap)->fetchAll('assoc');
        $preChap = null;
        $nextChap = null;
        if ($dataListChap) {
            if ($chap["chap_index"] == 1) {
                $preChap = null;
            } else {
                foreach ($dataListChap as $chapE) {
                    if ($chapE["chap_index"] == $chap["chap_index"] - 1) {
                        $preChap = $chapE;
                    }
                }
            }

            foreach ($dataListChap as $chapE) {
                if ($chapE["chap_index"] == $chap["chap_index"] + 1) {
                    $nextChap = $chapE;
                }
            }
        }
        $this->set(compact('preChap'));
        $this->set(compact('nextChap'));


        $path = WWW_ROOT . "chapters/" . $chap["path"];
        $file = new File($path);
        $contents = $file->read(false, "rb", true);
        $contentCut = $this->cutChapterContent($contents);
        $this->set(compact('contentCut'));
        $file->close(); // Be sure to close the file when you're done



        try {
            return $this->render(implode('/', ["chapter"]));
        } catch (MissingTemplateException $exception) {
            if (Configure::read('debug')) {
                throw $exception;
            }
            throw new NotFoundException();
        }
    }
    public function cutChapterContent($contents)
    {
        $str = explode("\r\n\r\n\r\n\r\n", $contents);
        return $str[1];
    }
}