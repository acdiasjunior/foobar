<?php 
	echo $this->Html->link('Clientes', '/clients/index');
	echo ' | ';
	echo $this->Html->link('Usuários', '/users/index');
	echo ' | ';
	echo $this->Html->link('Configurações', '/configurations/index');
	echo ' | ';
	echo $this->Html->link('Logout', '/users/logout');