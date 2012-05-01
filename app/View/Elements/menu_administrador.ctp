<?php 
	echo $this->Html->link('Clientes', '/clientes/index');
	echo ' | ';
	echo $this->Html->link('Usuários', '/usuarios/index');
	echo ' | ';
	echo $this->Html->link('Configurações', '/configuracoes/index');
	echo ' | ';
	echo $this->Html->link('Logout', '/usuarios/logout');