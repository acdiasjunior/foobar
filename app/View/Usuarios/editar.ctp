 <?php 
 	echo $this->Form->create('Usuario', array('type' => 'post')); 
 	echo $this->Form->input('id', array('type' => 'hidden'));
 	echo $this->Form->input('grupo', array('type' => 'select', 'label' => 'Grupo', 'options' => $grupos));
 	echo $this->Form->input('username', array('label' => 'Login', 'maxlength' => 30));
 	echo $this->Form->input('nome', array('label' => 'Nome', 'maxlength' => 50));
 	echo $this->Form->input('email', array( 'label' => 'Email', 'maxlength' => 200));
 	echo $this->Form->input('departamento', array( 'label' => 'Departamento', 'maxlength' => 200));
 	echo $this->Form->input('telefone', array( 'label' => 'Telefone', 'maxlength' => 200));
 	//echo $this->Form->input('password', array('type' => 'password'));
 	echo $this->Form->input('ativo', array('type' => 'checkbox', 'checked' => 'checked'));
	echo $this->Form->button('Salvar', array('type' => 'submit'));
	echo $this->Form->end();