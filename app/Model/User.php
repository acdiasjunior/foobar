<?php

class User extends AppModel {
	
    public $name = 'User';
    
    public $displayField = 'nome';

	public $validate = array(
	    'username' => array(
	        'vazio' => array(
	            'rule' => 'notEmpty',
	            'required' => true,
        		'message' => 'Login deve ser informado!'
	        )
	    ),
	    'password' => array(
	        'vazio' => array(
	            'rule' => 'notEmpty',
	            'required' => true,
				'on' => 'create',
        		'message' => 'Senha deve ser informada!'
	        )
	    )
	);	

    public function beforeSave($options = array()) {

    	if (isset($this->data['User']['password'])) {
        	$this->data['User']['password'] = $this->encrypt($this->data['User']['password']);
    	}

        parent::beforeSave($options);
    }
    
    public function encrypt($password) {
    	return AuthComponent::password($password);
    }
}