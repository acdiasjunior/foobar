<?php

class ConfiguracoesController extends AppController {

	public $name = 'Configuracoes';

	public function index() {
		
		$this->set('title_for_layout', 'Configurações');

		if ($this->request->is('post')) {
			if ($this->Configuracao->save($this->request->data)) {
				$this->Session->setFlash('Dados alterados com sucesso!', 'default', array('class' => 'authSuccess'));
			} else {
				$this->Session->setFlash('Erro!', 'default', array('class' => 'authError'));
			}
		} else {
			$this->Configuracao->id = 1; 
			$this->request->data = $this->Configuracao->read();
		}		
	}
	
	public function isAuthorized($user) {
		
		$usuario = SessionComponent::read('usuario');
		
		if ($usuario['Usuario']['grupo'] == 'A') {
			return true;
		}
		
	    return false;
	}	
}