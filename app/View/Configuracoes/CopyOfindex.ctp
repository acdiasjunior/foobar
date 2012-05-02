 <?php 
 
 	$this->Html->css(array('tabela'), null, array('inline' => false));
 
 	echo $this->Form->create('Configuracao', array('type' => 'post'));
 	
 	echo '<table class="simples" width="100%"><tr><th>Ações</th><th>Parâmetro</th><th>Valor</th></tr><tbody>';
 	foreach($configuracoes as $key => $configuracao) {
 		echo '<tr>';
 		echo '<td>' . $this->Html->link($this->Html->image("ico_delete.png"), "/configuracoes/excluir/{$configuracao['Configuracao']['id']}", array('escape' => false), 'Confirma?') . '</td>';
 		echo '<td>' . $configuracao['Configuracao']['parametro'] . $this->Form->input('id', array('name' => 'data[Configuracao][' . $key . '][id]', 'type' => 'hidden', 'value' => $configuracao['Configuracao']['id'])) . '</td>';
 		echo '<td>' . $this->Form->input('email', array('name' => 'data[Configuracao][' . $key . '][valor]', 'value' => $configuracao['Configuracao']['valor'], 'label' => false, 'maxlength' => 200)) . '</td>';
 		echo '</tr>';
 	}
 	echo '</tbody></table>';
 	 
	echo $this->Form->button('Salvar', array('type' => 'submit'));
	echo $this->Form->end();
?>

<fieldset>	
	
	<legend>Incluir</legend>
	
	<?php 
		echo $this->Form->create('Configuracao', array('type' => 'post', 'action' => 'incluir'));
		echo $this->Form->input('parametro', array('label' => 'Parâmetro', 'maxlength' => 200));	
		echo $this->Form->input('valor', array('label' => 'Valor', 'maxlength' => 200));
		echo $this->Form->button('Salvar', array('type' => 'submit'));
		echo $this->Form->end();
	?>
	
</fieldset>	