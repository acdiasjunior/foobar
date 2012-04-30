<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class PagesController extends Controller {

	public $name = 'Pages';

	public $helpers = array('Html', 'Session', 'Form');

	public $uses = array();

	public function cadastro() {
		
		$this->set('title_for_layout', 'Quero me cadastrar');
		
		if ($this->request->is('post')) {
			
			$email = new CakeEmail('smtp');
			
			if (in_array($this->request->data['Pages']['categoria'], array('operadora', 'outros'))) {
				//$to = array('livia.tomazini@viacombrasil.com');
			} else {
				//$to = array('joao.fenerich@beviacom.com');
			}
			
			$to = 'pedrodias.info@gmail.com';
			
			$msg  = 'Categoria: ' . $this->request->data['Pages']['categoria'];
 			$msg .= '<br />Empresa: ' . $this->request->data['Pages']['empresa'];
 			$msg .= '<br />Nome: ' . $this->request->data['Pages']['nome'];
 			$msg .= '<br />Data Nascimento: ' . $this->request->data['Pages']['data_nascimento'];
 			$msg .= '<br />Email: ' . $this->request->data['Pages']['email'];
 			$msg .= '<br />Telefone: ' . $this->request->data['Pages']['telefone'];
 			$msg .= '<br />Senha: ' . $this->request->data['Pages']['senha'];
			
			if ($email->emailFormat('html')->from(array('contato@viacom.com' => 'Viacom'))->to($to)->subject('Cadastro')->send($msg)) {
				$email->viewVars(
					array(
						'nome' => $this->request->data['Pages']['nome'],
						'email' => $this->request->data['Pages']['email'],
						'senha' => $this->request->data['Pages']['senha']
					)
				);
				$email->template('resposta_cadastro', 'respostas')->emailFormat('html')->to($this->request->data['Pages']['email'])->from('contato@viacom.com')->send();
			} else {

			}
			
		} else {
			
		}
		
		$this->set('categorias', array('operadora' => 'OPERADORA', 'agencia' => 'AGÊNCIA', 'cliente' => 'CLIENTE', 'outros' => 'OUTROS'));
	}
	
	public function home() {
		
	}
}
