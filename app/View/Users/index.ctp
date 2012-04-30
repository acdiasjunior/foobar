<?php 
	$this->Html->script(array('flexigrid.pack'), false);
	$this->Html->css('flexigrid', null, array('inline' => false));
	
	include_once 'grid.ctp';
?>