<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {

	public $helpers = array('Html', 'Form', 'Session');

	public $components = array(
		'Session',
        'Auth' => array(
        	'authorize' => 'Controller',
			'authError' => 'Desculpe. Acesso não permitido!',
			'loginAction' => array('controller' => 'users', 'action' => 'login'),
			'loginRedirect' => array('controller' => 'users', 'action' => 'home'), // se alterar, permitir!
			'logoutRedirect' => array('controller' => 'users', 'action' => 'login'),
			'authenticate' => array(
            	'Form' => array(
                	'scope' => array('User.ativo' => 1)
            	)
        	),
        	'user' => array('grupo')
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