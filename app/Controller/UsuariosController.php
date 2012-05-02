<?php

class UsuariosController extends AppController {

	public $name = 'Usuarios';
	
	public function incluir() {
		
		$this->set('title_for_layout', 'Incluir Usuário');
		
		if ($this->request->is('post')) {
			if ($this->Usuario->save($this->request->data)) {
				$this->Session->setFlash('Usuário cadastrado com sucesso!', 'default', array('class' => 'authSuccess'));
				$this->redirect('/usuarios/index');
			} else {
				$this->Session->setFlash('Erro!', 'default', array('class' => 'authError'));
			}
		}
		
		$this->set('grupos', $this->Usuario->carregar_grupo());
	}
	
	public function beforeFilter() {
		
		$this->Auth->allow(array('incluir'));
		parent::beforeFilter();
		
	}
	
	public function delete($id) {

		if ($this->Usuario->delete($id, true)) {
			$this->Session->setFlash('Registro excluído com sucesso!', 'default', array('class' => 'flashOk'));
		}
		
		$this->redirect(array('action' => 'index'));
	}	
	
	public function editar($id) {
		
		$this->set('title_for_layout', 'Editar Usuário');
		
		if ($this->request->is('post')) {
			if ($this->Usuario->save($this->request->data)) {
				$this->Session->setFlash('Usuário alterado com sucesso!', 'default', array('class' => 'authSuccess'));
				$this->redirect('/usuarios/index');
			} else {
				$this->Session->setFlash('Erro!', 'default', array('class' => 'authError'));
			}
		} else {
			$this->Usuario->id = $id;
			$this->request->data = $this->Usuario->read();	
		}
		
		$this->set('grupos', $this->Usuario->carregar_grupo());
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
	
	public function home() {
		
	}

	public function index() {
		
		$this->set('title_for_layout', 'Usuários');
	}
	
	public function isAuthorized($user) {
		
		$usuario = SessionComponent::read('usuario');
		
		if ($usuario['Usuario']['grupo'] == 'A') {
			return true;
		} else if (in_array($this->action, array('logout'))) {
	        return true;
	    }
		
	    return false;
	}

	public function login() {
		
		if ($this->request->is('post')) {
			
			if ($this->Auth->login()) {
				
				if ($this->request->data['Usuario']['lembrar_senha'] == 1) {
					$this->Cookie->write('Usuario', array('username' => $this->request->data['Usuario']['username'], 'password' => $this->request->data['Usuario']['password']), false);
				} else {
					$this->Cookie->delete('Usuario');
				}

				$this->Session->write('usuario', $this->Usuario->read(array(), $this->Auth->user('id')));
				$this->Session->setFlash('Login efetuado com sucesso!', 'default', array('class' => 'authSuccess'));
				return $this->redirect('/usuarios/home');
				
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