 <?php 
 
 	echo $this->Form->create('Cliente', array('type' => 'post')); 
 	echo $this->Form->input('id', array('type' => 'hidden'));
 	echo $this->Form->input('categoria', array('type' => 'select', 'label' => 'Categoria', 'options' => $categorias));
 	echo $this->Form->input('empresa', array('label' => 'Empresa', 'maxlength' => 100));
 	echo $this->Form->input('nome', array('label' => 'Nome', 'maxlength' => 100));
 	echo $this->Form->input('data_nascimento', array('label' => 'Dt Nasc', 'type' => 'text'));
 	echo $this->Form->input('email', array('label' => 'Email', 'maxlength' => 200));
 	echo $this->Form->input('telefone', array('label' => 'Telefone'));
 	echo $this->Form->input('senha', array('label' => 'Senha', 'maxlength' => 50));
 	echo $this->Form->input('situacao', array('type' => 'hidden'));
 	echo $this->Form->input('situacao_alterado', array('type' => 'select', 'label' => 'Status', 'options' => $situacoes, 'value' => $this->request->data['Cliente']['situacao']));
	echo $this->Form->button('Salvar', array('type' => 'submit'));
	echo $this->Form->end();