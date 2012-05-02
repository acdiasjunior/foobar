<?php

class ClientesController extends AppController {

	public $name = 'Clientes';
	
	public function aprovacao($id = null) {
		
		$this->set('title_for_layout', 'Email Aprovação');
		
		if ($this->request->is('post')) {
			
			if ($this->request->data['Cliente']['acao'] == 1) {
				$email = new CakeEmail('smtp');
				$email->viewVars(
					array(
						'nome' => $this->request->data['Cliente']['nome'],
						'email' => $this->request->data['Cliente']['email'],
						'senha' => $this->request->data['Cliente']['senha']
					)
				);
				if ($email->template('resposta_aprovacao', 'respostas')->emailFormat('html')->subject('Cadastro Aprovado')->to($this->request->data['Cliente']['email'])->from('contato@viacom.com')->send()) {
					$this->Session->setFlash('Email de aprovação enviado com sucesso!', 'default', array('class' => 'authSuccess'));
					$this->redirect('/clientes/index');
				} else {
					$this->Session->setFlash('Erro!', 'default', array('class' => 'authError'));
				}
			}
			
			$this->Cliente->mudar_situacao($id, '1');
			$this->redirect('/clientes/index');
		} else {
			$this->Cliente->id = $id;
			$this->request->data = $this->Cliente->read();
		}
		
	}

	public function editar($id) {
		
		$this->set('title_for_layout', 'Editar Cliente');
		
		if ($this->request->is('post')) {
			if ($this->Cliente->save($this->request->data)) {
				$this->Session->setFlash('Cliente alterado com sucesso!', 'default', array('class' => 'authSuccess'));
				$this->redirect('/clientes/index');
			} else {
				$this->Session->setFlash('Erro!', 'default', array('class' => 'authError'));
			}
		} else {
			$this->Cliente->id = $id;
			$this->request->data = $this->Cliente->read();	
		}
		
		$this->set('categorias', $this->Cliente->carregar_categoria());
		$this->set('situacoes', $this->Cliente->carregar_situacao());
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
					$this->Cliente->descricao_situacao($registro[$this->modelClass]['situacao'])
				)
			);
		}

		return json_encode($data);
	}	

	public function index() {
		
		$this->set('title_for_layout', 'Clientes');
	}
	
	public function isAuthorized($user) {
		
		$usuario = SessionComponent::read('usuario');
		
		if ($usuario['Usuario']['grupo'] == 'A') {
			return true;
		} 
		
	    return false;
	}
	
	public function mudar_situacao($id, $situacao) {
		
		$this->Cliente->mudar_situacao($id, $situacao);
		$this->redirect($this->referer());
	}
}