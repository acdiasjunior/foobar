Quer ter acesso a todo o conteúdo do portal Viacom? Solicite seu login preenchendo os campos abaixo. 
<?php

 	echo $this->Form->create('Pages'); 
 	echo $this->Form->input('categoria', array('label' => 'Categoria', 'type' => 'select', 'options' => $categorias));
 	echo $this->Form->input('empresa', array('type' => 'text', 'label' => 'Empresa'));
 	echo $this->Form->input('nome', array('type' => 'text', 'label' => 'Nome'));
 	echo $this->Form->input('data_nascimento', array('type' => 'text', 'label' => 'Data Nascimento'));
 	echo $this->Form->input('email', array('type' => 'text', 'label' => 'Email'));
 	echo $this->Form->input('telefone', array('type' => 'text', 'label' => 'Telefone'));
 	echo $this->Form->input('senha', array('type' => 'password', 'label' => 'Senha'));
 	echo $this->Form->input('confirma_senha', array('type' => 'password', 'label' => 'Confirmar senha'));
	echo $this->Form->end('Enviar cadastro');	