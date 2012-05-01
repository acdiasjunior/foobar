<?php

class Usuario extends AppModel {
	
    public $name = 'Usuario';
    
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

    	if (isset($this->data['Usuario']['password'])) {
        	$this->data['Usuario']['password'] = $this->encrypt($this->data['Usuario']['password']);
    	}

        parent::beforeSave($options);
    }
    
    public function carregar_grupo() {
    	return array(
    		'A' => 'Administrador', 
    		'C' => 'Cliente'
    	);
    }
    
    public function encrypt($password) {
    	return AuthComponent::password($password);
    }
}