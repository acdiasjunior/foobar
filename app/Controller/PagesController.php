<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class PagesController extends Controller {

	public $name = 'Pages';

	public $helpers = array('Html', 'Session', 'Form');
	
	public $components = array('Cookie','Session');

	public $uses = array();

	public function cadastro() {
		
		$this->set('title_for_layout', 'Quero me cadastrar');
		
		$this->loadModel('Cliente');
		
		if ($this->request->is('post')) {
			
			$this->loadModel('Configuracao');
			
			$parametro = 'email_aprovador_' . $this->request->data['Pages']['categoria'];
			
			$email_aprovador = $this->Configuracao->field('valor', array('parametro' => $parametro));
			
			if (!$email_aprovador) {
				$this->Session->setFlash('Email de aprovador não encontrado nas configurações!', 'default', array('class' => 'authError'));
				$this->redirect($this->referer());
			}
			
			$email = new CakeEmail('smtp');
			
			$to = $email_aprovador;
			
			$msg  = 'Categoria: ' . 			$cliente['Cliente']['categoria'] 		= $this->request->data['Pages']['categoria'];
			$msg .= '<br />Empresa: ' . 		$cliente['Cliente']['empresa'] 			= $this->request->data['Pages']['empresa'];
			$msg .= '<br />Nome: ' . 			$cliente['Cliente']['nome'] 			= $this->request->data['Pages']['nome'];
			$msg .= '<br />Data Nascimento: ' . $cliente['Cliente']['data_nascimento'] 	= $this->request->data['Pages']['data_nascimento'];
			$msg .= '<br />Email: ' . 			$cliente['Cliente']['email'] 			= $this->request->data['Pages']['email'];
			$msg .= '<br />Telefone: ' . 		$cliente['Cliente']['telefone'] 		= $this->request->data['Pages']['telefone'];
			$msg .= '<br />Senha: ' . 			$cliente['Cliente']['senha'] 			= $this->request->data['Pages']['senha'];
			
			$cliente['Cliente']['situacao'] = 0; // Aguardando aprovação

			if ($email->emailFormat('html')->subject('Solicitação de Cadastro')->from(array('contato@viacom.com' => 'Viacom'))->to($to)->subject('Cadastro')->send($msg)) {
				$email->viewVars(
					array(
						'nome' => $this->request->data['Pages']['nome'],
						'email' => $this->request->data['Pages']['email'],
						'senha' => $this->request->data['Pages']['senha']
					)
				);
				$email->template('resposta_cadastro', 'respostas')->emailFormat('html')->subject('Solicitação de Cadastro')->to($this->request->data['Pages']['email'])->from('contato@viacom.com')->send();
				
				$status = 'Cadastro enviado com sucesso!<br />O seu acesso será liberado após uma breve análise das informações recebidas.<br />Aguarde e-mail de confirmação.';
				
				$this->Cliente->save($cliente, array('callbacks' => false, 'validade' => false));
				
			} else {
				$status = 'Não foi possível enviar o email. Tente novamente em alguns segundos.';
			}
			
		} else {
			$status = '';
		}
		
		$this->set('categorias', $this->Cliente->carregar_categoria());
		$this->set('status', $status);
	}
	
	public function home() {
		
		$this->set ('cookie_usuario', $this->Cookie->read('Usuario'));
		
	}
}
