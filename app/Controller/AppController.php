<?php

App::uses('Controller', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class AppController extends Controller {

	public $helpers = array('Html', 'Form', 'Session');

	public $components = array(
		'Cookie',
		'Session',
        'Auth' => array(
        	'authorize' => 'Controller',
			'authError' => 'Desculpe. Acesso não permitido!',
			'loginAction' => array('controller' => 'usuarios', 'action' => 'login'),
			'loginRedirect' => array('controller' => 'usuarios', 'action' => 'home'), // se alterar, permitir!
			'logoutRedirect' => array('controller' => 'pages', 'action' => 'home'),
			'authenticate' => array(
            	'Form' => array(
                	'scope' => array('Usuario.ativo' => 1),
					'userModel' => 'Usuario'
            	)
        	),
        	'usuario' => array('grupo')
		)		
	);
	
	public function beforeFilter() {
		
		Security::setHash('sha256');
		parent::beforeFilter();
	}

    public function isAuthorized($user = null) {
    	
    	return true;
    	
    }        	
}