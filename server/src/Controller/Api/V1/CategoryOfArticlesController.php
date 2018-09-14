<?php
namespace App\Controller\Api\V1;

use App\Controller\Api\V1\AppController;

/**
 * CategoryOfArticles Controller
 *
 * @property \App\Model\Table\CategoryOfArticlesTable $CategoryOfArticles
 *
 * @method \App\Model\Entity\CategoryOfArticle[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CategoryOfArticlesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $categoryOfArticles = $this->paginate($this->CategoryOfArticles);

        $this->set(compact('categoryOfArticles'));
    }

    /**
     * View method
     *
     * @param string|null $id Category Of Article id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $categoryOfArticle = $this->CategoryOfArticles->get($id, [
            'contain' => []
        ]);

        $this->set('categoryOfArticle', $categoryOfArticle);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $categoryOfArticle = $this->CategoryOfArticles->newEntity();
        if ($this->request->is('post')) {
            $categoryOfArticle = $this->CategoryOfArticles->patchEntity($categoryOfArticle, $this->request->getData());
            if ($this->CategoryOfArticles->save($categoryOfArticle)) {
                $this->Flash->success(__('The category of article has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The category of article could not be saved. Please, try again.'));
        }
        $this->set(compact('categoryOfArticle'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Category Of Article id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $categoryOfArticle = $this->CategoryOfArticles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $categoryOfArticle = $this->CategoryOfArticles->patchEntity($categoryOfArticle, $this->request->getData());
            if ($this->CategoryOfArticles->save($categoryOfArticle)) {
                $this->Flash->success(__('The category of article has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The category of article could not be saved. Please, try again.'));
        }
        $this->set(compact('categoryOfArticle'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Category Of Article id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $categoryOfArticle = $this->CategoryOfArticles->get($id);
        if ($this->CategoryOfArticles->delete($categoryOfArticle)) {
            $this->Flash->success(__('The category of article has been deleted.'));
        } else {
            $this->Flash->error(__('The category of article could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
