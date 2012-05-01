 <?php 
 	echo $this->Form->create('Client', array('type' => 'post')); 
 	echo $this->Form->input('empresa', array('label' => 'Empresa', 'maxlength' => 100));
 	echo $this->Form->input('nome', array('label' => 'Nome', 'maxlength' => 100));
 	echo $this->Form->input('email', array('label' => 'Email', 'maxlength' => 200));
 	echo $this->Form->input('telefone', array('label' => 'Telefone'));
 	echo $this->Form->radio('acao', array('1' => 'Enviar Email Aprovacao', '2' => 'Apenas concluir'), array('legend' => 'Ação', 'separator' => '<br />'));
	echo $this->Form->button('Finalizar', array('type' => 'submit'));
	echo $this->Form->end();