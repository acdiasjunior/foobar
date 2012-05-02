<?php $usuario = SessionComponent::read('usuario'); ?>

<div class="home_destque_programacao">
	Destaque Programação
</div>

<div class="home_destque_video">
	Destaque Vídeo
</div>

<div class="home_login">
<?php
	if (!$usuario) {
	 	include_once 'login.ctp';
	}
?>
</div>

<div style="clear:both;"></div>

<div class="home_logos">
	Logos
</div>