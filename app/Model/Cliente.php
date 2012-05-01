<?php

class Cliente extends AppModel {
	
    public $name = 'Cliente';
    
    public $displayField = 'nome';
    
    public function carregar_categoria() {
    	return array(
    		'operadora' => 'OPERADORA', 
    		'agencia' => 'AGÊNCIA', 
    		'cliente' => 'CLIENTE', 
    		'outros' => 'OUTROS'
    	);
    }
    
    public function carregar_situacao() {
    	return array(
    		0 => 'Aguarando aprovação',
    		1 => 'Aprovado',
    		2 => 'Cancelado'
    	);
    }
    
    public function descricao_situacao($item) {
    	$itens = $this->carregar_situacao();
    	return $itens[$item];
    }
}