<?php

	echo $this->Html->link('Quero me cadastrar', '/pages/cadastro') . ' | ' . $this->Html->link('Perdi minha senha', '/users/senha');

 	echo $this->Form->create('User', array('controller' => 'users', 'action' => 'login')); 
 	echo $this->Form->input('username', array('label' => 'Login'));
 	echo $this->Form->input('password', array('type' => 'password', 'label' => 'Senha'));
	echo $this->Form->end('Acessar');

	echo $this->Form->input('lembrar_senha', array('type' => 'checkbox', 'label' => 'Lembrar meu login e senha nos próximos acesso'));
