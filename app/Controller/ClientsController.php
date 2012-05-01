<?php

class ClientsController extends AppController {

	public $name = 'Clients';
	
	public function aprovacao($id = null) {
		
		$this->set('title_for_layout', 'Email Aprovação');
		
		if ($this->request->is('post')) {
			
			if ($this->request->data['Client']['acao'] == 1) {
				$email = new CakeEmail('smtp');
				$email->viewVars(
					array(
						'nome' => $this->request->data['Client']['nome'],
						'email' => $this->request->data['Client']['email'],
						'senha' => $this->request->data['Client']['senha']
					)
				);
				if ($email->template('resposta_aprovacao', 'respostas')->emailFormat('html')->to($this->request->data['Client']['email'])->from('contato@viacom.com')->send()) {
					$this->Session->setFlash('Email de aprovação enviado com sucesso!', 'default', array('class' => 'authSuccess'));
					$this->redirect('/clients/index');
				} else {
					$this->Session->setFlash('Erro!', 'default', array('class' => 'authError'));
				}
			}
		} else {
			$this->Client->id = $id;
			$this->request->data = $this->Client->read();
		}
		
	}

	public function edit($id) {
		
		$this->set('title_for_layout', 'Editar Usuário');
		
		if ($this->request->is('post')) {
			$enviar_email_aprovacao = false;
			if ($this->request->data['Client']['situacao'] != 1 && $this->request->data['Client']['situacao_alterado'] == 1) {
				$enviar_email_aprovacao = true;
			}
			$this->request->data['Client']['situacao'] = $this->request->data['Client']['situacao_alterado'];
			if ($this->Client->save($this->request->data)) {
				$this->Session->setFlash('Cliente alterado com sucesso!', 'default', array('class' => 'authSuccess'));
				if ($enviar_email_aprovacao) {
					$this->redirect("/clients/aprovacao/$id");
				} else {
					$this->redirect('/clients/index');
				}
			} else {
				$this->Session->setFlash('Erro!', 'default', array('class' => 'authError'));
			}
		} else {
			$this->Client->id = $id;
			$this->request->data = $this->Client->read();	
		}
		
		$this->set('categorias', $this->Client->carregar_categoria());
		$this->set('situacoes', $this->Client->carregar_situacao());
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
					$this->Client->descricao_situacao($registro[$this->modelClass]['situacao'])
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
}