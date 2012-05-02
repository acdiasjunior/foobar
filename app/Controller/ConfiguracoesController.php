<?php

class ConfiguracoesController extends AppController {

	public $name = 'Configuracoes';
	
	public function parametros_iniciais() {
		if ($this->Configuracao->find('count') == 0) {
			$configuracao['Configuracao'][0]['parametro'] = 'email_aprovador_operadora';
			$configuracao['Configuracao'][1]['parametro'] = 'email_aprovador_agencia';
			$configuracao['Configuracao'][2]['parametro'] = 'email_aprovador_cliente';
			$configuracao['Configuracao'][3]['parametro'] = 'email_aprovador_outros';
			$this->Configuracao->saveAll($configuracao['Configuracao']);
		}
	}
	
	public function excluir($id) {
		
		$this->Configuracao->delete($id);
		$this->redirect($this->referer());
	}
	
	public function incluir() {
		
		$this->Configuracao->save($this->request->data);
		$this->redirect($this->referer());
	}

	public function index() {
		
		$this->set('title_for_layout', 'Configurações');

		if ($this->request->is('post')) {
			if ($this->Configuracao->saveAll($this->request->data['Configuracao'])) {
				$this->Session->setFlash('Dados alterados com sucesso!', 'default', array('class' => 'authSuccess'));
			} else {
				$this->Session->setFlash('Erro!', 'default', array('class' => 'authError'));
			}
		} else {
			$this->parametros_iniciais();
		}

		$this->set('configuracoes', $this->Configuracao->find('all', array('order' => array('parametro'))));	
	}
	
	public function isAuthorized($user) {
		
		$usuario = SessionComponent::read('usuario');
		
		if ($usuario['Usuario']['grupo'] == 'A') {
			return true;
		}
		
	    return false;
	}	
}