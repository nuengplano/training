<?php
namespace App\Controller\api\v1;



/**
 * Privileges Controller
 *
 * @property \App\Model\Table\PrivilegesTable $Privileges
 *
 * @method \App\Model\Entity\Privilege[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PrivilegesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['UsersPrivileges']
        ];
        $privileges = $this->paginate($this->Privileges);

        $this->set(compact('privileges'));
        $this->set('_serialize', ['privileges']);
    }

    /**
     * View method
     *
     * @param string|null $id Privilege id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $status = null;
        $message = null;
        $data = $this->Privileges->find()
            ->where(['Privileges.id' => $id])
            ->contain(['PrivilegesCategories', 'PrivilegesImages', 'ServiceRequires', 'MeetingPoints', 'CarTypes', 'Places', 'RefProvinces'])
            ->first();
        if ($data) {
            $status = 200;
            $message = "OK";
        } else {
            $status = 400;
            $message = "OK";
        }

        $this->set(compact('status', 'data', 'message'));
        $this->set('_serialize', ['status', 'data', 'message']);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $privilege = $this->Privileges->newEntity();
        if ($this->request->is('post')) {
            $privilege = $this->Privileges->patchEntity($privilege, $this->request->getData());
            if ($this->Privileges->save($privilege)) {
                $this->Flash->success(__('The privilege has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The privilege could not be saved. Please, try again.'));
        }
        $usersPrivileges = $this->Privileges->UsersPrivileges->find('list', ['limit' => 200]);
        $atyourservice = $this->Privileges->Atyourservice->find('list', ['limit' => 200]);
        $members = $this->Privileges->Members->find('list', ['limit' => 200]);
        $carTypes = $this->Privileges->CarTypes->find('list', ['limit' => 200]);
        $meetingPoints = $this->Privileges->MeetingPoints->find('list', ['limit' => 200]);
        $places = $this->Privileges->Places->find('list', ['limit' => 200]);
        $serviceRequires = $this->Privileges->ServiceRequires->find('list', ['limit' => 200]);
        $users = $this->Privileges->Users->find('list', ['limit' => 200]);
        $this->set(compact('privilege', 'usersPrivileges', 'atyourservice', 'members', 'carTypes', 'meetingPoints', 'places', 'serviceRequires', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Privilege id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $privilege = $this->Privileges->get($id, [
            'contain' => ['Atyourservice', 'Members', 'CarTypes', 'MeetingPoints', 'Places', 'ServiceRequires', 'Users']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $privilege = $this->Privileges->patchEntity($privilege, $this->request->getData());
            if ($this->Privileges->save($privilege)) {
                $this->Flash->success(__('The privilege has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The privilege could not be saved. Please, try again.'));
        }
        $usersPrivileges = $this->Privileges->UsersPrivileges->find('list', ['limit' => 200]);
        $atyourservice = $this->Privileges->Atyourservice->find('list', ['limit' => 200]);
        $members = $this->Privileges->Members->find('list', ['limit' => 200]);
        $carTypes = $this->Privileges->CarTypes->find('list', ['limit' => 200]);
        $meetingPoints = $this->Privileges->MeetingPoints->find('list', ['limit' => 200]);
        $places = $this->Privileges->Places->find('list', ['limit' => 200]);
        $serviceRequires = $this->Privileges->ServiceRequires->find('list', ['limit' => 200]);
        $users = $this->Privileges->Users->find('list', ['limit' => 200]);
        $this->set(compact('privilege', 'usersPrivileges', 'atyourservice', 'members', 'carTypes', 'meetingPoints', 'places', 'serviceRequires', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Privilege id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $privilege = $this->Privileges->get($id);
        if ($this->Privileges->delete($privilege)) {
            $this->Flash->success(__('The privilege has been deleted.'));
        } else {
            $this->Flash->error(__('The privilege could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
