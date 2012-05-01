 <?php 
 	echo $this->Form->create('Configuracao', array('type' => 'post')); 
 	echo $this->Form->input('id', array('type' => 'hidden', 'value' => 1));
 	echo $this->Form->input('aprovador_operadora', array('label' => 'Emails Aprovadores - Categoria Operadora', 'maxlength' => 200));
 	echo $this->Form->input('aprovador_outros', array('label' => 'Emails Aprovadores - Categoria Outros', 'maxlength' => 200));
 	echo $this->Form->input('aprovador_agencia', array('label' => 'Emails Aprovadores - Categoria Agência', 'maxlength' => 200));
 	echo $this->Form->input('aprovador_cliente', array('label' => 'Emails Aprovadores - Categoria Cliente', 'maxlength' => 200));
	echo $this->Form->button('Salvar', array('type' => 'submit'));
	echo $this->Form->end();