<?php

class UsersController extends AppController {

	public $name = 'Users';

	public function index() {
		
		$this->set('title_for_layout', 'Usuários');
	}

	public function login() {
		
		$this->set('title_for_layout', '');

		if ($this->request->is('post')) {
			
			if ($this->Auth->login()) {

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