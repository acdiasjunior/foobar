<?php

class ConfigurationsController extends AppController {

	public $name = 'Configurations';

	public function index() {
		
		$this->set('title_for_layout', 'Usuários');

		if ($this->request->is('post')) {
			if ($this->Configuration->save($this->request->data)) {
				$this->Session->setFlash('Dados alterados com sucesso!', 'default', array('class' => 'authSuccess'));
			} else {
				$this->Session->setFlash('Erro!', 'default', array('class' => 'authError'));
			}
		} else {
			$this->Configuration->id = 1; 
			$this->request->data = $this->Configuration->read();
		}		
	}
	
	public function isAuthorized($user) {
		
		$usuario = SessionComponent::read('usuario');
		
		if ($usuario['User']['grupo'] == 'A') {
			return true;
		}
		
	    return false;
	}	
}