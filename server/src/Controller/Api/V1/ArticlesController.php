<?php
namespace App\Controller\Api\V1;

use App\Controller\Api\V1\AppController;

/**
 * Articles Controller
 *
 * @property \App\Model\Table\ArticlesTable $Articles
 *
 * @method \App\Model\Entity\Article[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ArticlesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['CategoryOfArticles', 'Institutions', 'Areas']
        ];
        $articles = $this->paginate($this->Articles);
        
        $this->set([
            'articles'=>$articles,
            '_serialize'=>['articles']
        ]);
    }

    /**
     * View method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $article = $this->Articles->get($id, [
            'contain' => ['CategoryOfArticles', 'Institutions', 'Areas', 'Authors', 'Keywords']
        ]);

        $this->set('article', $article);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $article = $this->Articles->newEntity();
        if ($this->request->is('post')) {
            $article = $this->Articles->patchEntity($article, $this->request->getData());
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('The article has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The article could not be saved. Please, try again.'));
        }
        $categoryOfArticles = $this->Articles->CategoryOfArticles->find('list', ['limit' => 200]);
        $institutions = $this->Articles->Institutions->find('list', ['limit' => 200]);
        $areas = $this->Articles->Areas->find('list', ['limit' => 200]);
        $authors = $this->Articles->Authors->find('list', ['limit' => 200]);
        $keywords = $this->Articles->Keywords->find('list', ['limit' => 200]);
        $this->set(compact('article', 'categoryOfArticles', 'institutions', 'areas', 'authors', 'keywords'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $article = $this->Articles->get($id, [
            'contain' => ['Authors', 'Keywords']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $article = $this->Articles->patchEntity($article, $this->request->getData());
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('The article has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The article could not be saved. Please, try again.'));
        }
        $categoryOfArticles = $this->Articles->CategoryOfArticles->find('list', ['limit' => 200]);
        $institutions = $this->Articles->Institutions->find('list', ['limit' => 200]);
        $areas = $this->Articles->Areas->find('list', ['limit' => 200]);
        $authors = $this->Articles->Authors->find('list', ['limit' => 200]);
        $keywords = $this->Articles->Keywords->find('list', ['limit' => 200]);
        $this->set(compact('article', 'categoryOfArticles', 'institutions', 'areas', 'authors', 'keywords'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $article = $this->Articles->get($id);
        if ($this->Articles->delete($article)) {
            $this->Flash->success(__('The article has been deleted.'));
        } else {
            $this->Flash->error(__('The article could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
