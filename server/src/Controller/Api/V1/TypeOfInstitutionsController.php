<?php
namespace App\Controller\Api\V1;

use App\Controller\Api\V1\AppController;

/**
 * TypeOfInstitutions Controller
 *
 * @property \App\Model\Table\TypeOfInstitutionsTable $TypeOfInstitutions
 *
 * @method \App\Model\Entity\TypeOfInstitution[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TypeOfInstitutionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $typeOfInstitutions = $this->paginate($this->TypeOfInstitutions);

        $this->set(compact('typeOfInstitutions'));
    }

    /**
     * View method
     *
     * @param string|null $id Type Of Institution id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $typeOfInstitution = $this->TypeOfInstitutions->get($id, [
            'contain' => []
        ]);

        $this->set('typeOfInstitution', $typeOfInstitution);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $typeOfInstitution = $this->TypeOfInstitutions->newEntity();
        if ($this->request->is('post')) {
            $typeOfInstitution = $this->TypeOfInstitutions->patchEntity($typeOfInstitution, $this->request->getData());
            if ($this->TypeOfInstitutions->save($typeOfInstitution)) {
                $this->Flash->success(__('The type of institution has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The type of institution could not be saved. Please, try again.'));
        }
        $this->set(compact('typeOfInstitution'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Type Of Institution id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $typeOfInstitution = $this->TypeOfInstitutions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $typeOfInstitution = $this->TypeOfInstitutions->patchEntity($typeOfInstitution, $this->request->getData());
            if ($this->TypeOfInstitutions->save($typeOfInstitution)) {
                $this->Flash->success(__('The type of institution has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The type of institution could not be saved. Please, try again.'));
        }
        $this->set(compact('typeOfInstitution'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Type Of Institution id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $typeOfInstitution = $this->TypeOfInstitutions->get($id);
        if ($this->TypeOfInstitutions->delete($typeOfInstitution)) {
            $this->Flash->success(__('The type of institution has been deleted.'));
        } else {
            $this->Flash->error(__('The type of institution could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
