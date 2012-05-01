<?php

	echo $this->Html->link('Quero me cadastrar', '/pages/cadastro') . ' | ' . $this->Html->link('Perdi minha senha', '/users/senha');
 	echo $this->Form->create('User', array('controller' => 'users', 'action' => 'login')); 
 	echo $this->Form->input('username', array('label' => 'Login', 'value' => $user['username']));
 	echo $this->Form->input('password', array('type' => 'password', 'label' => 'Senha', 'value' => $user['password']));
 	echo $this->Form->input('lembrar_senha', array('type' => 'checkbox', 'checked' => ($user['username']?'checked' : ''), 'label' => 'Lembrar meu login e senha nos próximos acesso'));
	echo $this->Form->end('Acessar');

	
