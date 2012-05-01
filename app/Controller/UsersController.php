<?php

class UsersController extends AppController {

	public $name = 'Users';
	
	public function add() {
		
		$this->set('title_for_layout', 'Incluir Usuário');
		
		if ($this->request->is('post')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash('Usuário cadastrado com sucesso!', 'default', array('class' => 'authSuccess'));
				$this->redirect('/users/index');
			} else {
				$this->Session->setFlash('Erro!', 'default', array('class' => 'authError'));
			}
		}
		
		$this->set('grupos', array('A' => 'Administrador', 'C' => 'Cliente'));
	}
	
	public function beforeFilter() {
		
		$this->Auth->allow(array('add'));
		parent::beforeFilter();
		
	}
	
	public function delete($id) {

		if ($this->User->delete($id, true)) {
			$this->Session->setFlash('Registro excluído com sucesso!', 'default', array('class' => 'flashOk'));
		}
		
		$this->redirect(array('action' => 'index'));
	}	
	
	public function edit($id) {
		
		$this->set('title_for_layout', 'Editar Usuário');
		
		if ($this->request->is('post')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash('Usuário alterado com sucesso!', 'default', array('class' => 'authSuccess'));
				$this->redirect('/users/index');
			} else {
				$this->Session->setFlash('Erro!', 'default', array('class' => 'authError'));
			}
		} else {
			$this->User->id = $id;
			$this->request->data = $this->User->read();	
		}
		
		$this->set('grupos', array('A' => 'Administrador', 'C' => 'Cliente'));
	}	
	
	public function grid() {

		$this->autoRender = false;
		
		$conditions = array();

		if ($this->request->data['query'] != '') {
			$conditions[$this->request->data['qtype'] . ' ILIKE'] = '%' . str_replace(' ', '%', $this->request->data['query']) . '%';
		} 
		
		$this->paginate = array(
            'page' => $this->request->data['page'],
            'limit' => $this->request->data['rp'],
            'order' => array($this->request->data['sortname'] => $this->request->data['sortorder']),
            'conditions' => $conditions,
			'recursive' => 0
		);

		$registros = $this->paginate($this->modelClass);

		$data = array();

		$data['page'] 	= $this->request->data['page'];
		$data['total'] 	= count($registros);
		$data['rows'] 	= array();

		foreach($registros as $registro) {
			$data['rows'][] = array(
		        'id' => $registro[$this->modelClass]['id'],
		        'cell' => array(
					$registro[$this->modelClass]['id'],
					$registro[$this->modelClass]['nome'],
					$registro[$this->modelClass]['username']
				)
			);
		}

		return json_encode($data);
	}	

	public function index() {
		
		$this->set('title_for_layout', 'Usuários');
	}
	
	public function isAuthorized($user) {
		
		$usuario = SessionComponent::read('usuario');
		
		if ($usuario['User']['grupo'] == 'A') {
			return true;
		} else if (in_array($this->action, array('logout'))) {
	        return true;
	    }
		
	    return false;
	}

	public function login() {
		
		if ($this->request->is('post')) {
			
			if ($this->Auth->login()) {
				
				if ($this->request->data['User']['lembrar_senha'] == 1) {
					$this->Cookie->write('User', array('username' => $this->request->data['User']['username'], 'password' => $this->request->data['User']['password']), false);
				} else {
					$this->Cookie->delete('User');
				}

				$this->Session->write('usuario', $this->User->read(array(), $this->Auth->user('id')));
				$this->Session->setFlash('Login efetuado com sucesso!', 'default', array('class' => 'authSuccess'));
				
			} else {
				
				$this->Session->setFlash('Login ou senha inválidos!', 'default', array('class' => 'authError'));
				
			}
			
		}
		
		return $this->redirect('/pages/home');
	}

	public function logout() {
    	
		$this->Session->destroy();
		$this->redirect($this->Auth->logout());
	}
	
}