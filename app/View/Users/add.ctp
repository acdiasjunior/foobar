 <?php 
 	echo $this->Form->create('User', array('type' => 'post')); 
 	echo $this->Form->input('id', array('type' => 'hidden'));
 	echo $this->Form->input('username', array('class' => 'edit25', 'label' => 'Login', 'maxlength' => 30));
 	echo $this->Form->input('password', array('type' => 'password'));
 	echo $this->Form->input('grupo', array('type' => 'select', 'label' => 'Grupo', 'options' => $grupos));
 	echo $this->Form->input('ativo', array('type' => 'checkbox', 'checked' => 'checked'));
	echo $this->Form->button('Salvar', array('type' => 'submit'));
	echo $this->Form->end();