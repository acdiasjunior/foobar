<?php $usuario = SessionComponent::read('usuario'); ?>

<div class="home_destque_programacao">
	Destaque Programação
</div>

<div class="home_destque_video">
	Destaque Vídeo
</div>

<?php
	if (!$usuario) {
		echo '<div class="home_login">';
	 	include_once 'login.ctp';
		echo '</div>';
	}
?>

<div class="home_logos">
	Logos
</div>