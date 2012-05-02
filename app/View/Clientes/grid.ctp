<table id="clientes" style="display: none">
</table>

<script type="text/javascript">
    $("#clientes").flexigrid({
        url: '<?php echo $this->Html->url(array('controller' => $this->request->controller, 'action' => 'grid')); ?>',
        dataType: 'json',
        colModel : [
            {display: 'Id', 	name : 'id', width : 40, sortable : true, align: 'center', hide: true},
            {display: 'Nome', 	name : 'nome', width : 210, sortable : true, align: 'left'},
            {display: 'Situação', name : 'situacao', width : 210, sortable : true, align: 'left'}
        ],
        buttons : [
			{name: 'Aprovar', bclass: 'edit', onpress : actions},
			{name: 'Cancelar', bclass: 'delete', onpress : actions},
			{separator: true}
		],        
        searchitems : [
            {display: 'Nome', name : 'nome', isdefault: true}
        ],
        sortname: "nome",
        sortorder: "asc",
        usepager: true,
        useRp: true,
        rp: 10,
        rpOptions: [10,20,30,40,50],
        title: false,
        width: '100%',
        height: 270,
        singleSelect: true,
        errormsg:'Erro de conexão',
        pagestat:'Exibindo de {from} a {to} de um total de {total} registros.',
        pagetext:'Página',
        outof:'de',
        findtext:'Busca',
        procmsg:'Processando, por favor aguarde ...',
        nomsg:'Nenhum item'
    });

    $('#clientes').dblclick( function(){
        var id = $('.trSelected').find('td[abbr="id"]').text();
        if(id != '')
            $(location).attr('href','<?php echo $this->Html->url(array('controller' => $this->request->controller, 'action' => 'editar')); ?>/' + id);
    });    
    
    function actions(com, grid) {
		var id = $('.trSelected', grid).find('td[abbr="id"]').text();
        var nome = $('.trSelected', grid).find('td[abbr="nome"]').text();
        var situacao = $('.trSelected', grid).find('td[abbr="situacao"]').text();
        
        switch(com) {
			case "Aprovar":
				if (id != '') {
					aprovar(id, situacao);
				} else {
					alert('Selecione um cliente!');
				}
                break;

            case "Cancelar":
				if (id != '') {
					cancelar(id, situacao, nome);
				} else {
					alert('Selecione um cliente!');
				}
                break;                

		}
	}

	function aprovar(id, situacao_atual) {

        if (situacao_atual != 'Aprovado'){
			$(location).attr('href','<?php echo $this->Html->url(array('controller' => 'clientes', 'action' => 'aprovacao')); ?>/' + id);
        } else
        	alert('Este cliente já está aprovado!');
	}

	function cancelar(id, situacao_atual, nome) {

    	if (situacao_atual != 'Cancelado'){
            if(confirm('Deseja realmente cancelar?\n' + nome))
				$(location).attr('href','<?php echo $this->Html->url(array('controller' => $this->request->controller, 'action' => 'mudar_situacao')); ?>/' + id + '/2');
        } else
            alert('Este cliente já está cancelado!');
	}	

</script>