<?php 
	$usuario = SessionComponent::read('usuario');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

	<?php echo $this->Html->charset(); ?>
	
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('sistema');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->Html->script(array('jquery-1.7.1.min'));
		echo $this->fetch('script');
		
		
	?>
	
</head>

<body>

	<div id="container">
	
		<div id="menu_canais">
			<?php echo $this->element('menu_canais'); ?> 
		</div>
		
		<div id="menu_superior">
			<?php echo $this->element('menu_superior'); ?> 
		</div>
		
		<div id="menu_usuario">
			<?php
				if ($usuario) {
					$menu = ($usuario['User']['grupo'] == 'A') ? 'menu_administrador' : 'menu_clientes'; 
			 		echo $this->element($menu);
				} 
			 ?> 
		</div>
		
		<div id="conteudo">
			<?php 
				echo $this->Session->flash();
				echo $this->fetch('content'); 
			?>
		</div>

	</div>
	
	<div id="rodape">
		Políticas de uso
	</div>	
	
</body>

</html>
