<table id="usuarios" style="display: none">
</table>

<script type="text/javascript">
    $("#usuarios").flexigrid({
        url: '<?php echo $this->Html->url(array('controller' => $this->request->controller, 'action' => 'grid')); ?>',
        dataType: 'json',
        colModel : [
            {display: 'Id', 	name : 'id', width : 40, sortable : true, align: 'center', hide: true},
            {display: 'Nome', 	name : 'nome', width : 210, sortable : true, align: 'left'},
            {display: 'Login', 	name : 'username', width : 210, sortable : true, align: 'left'}
        ],
        buttons : [
			{name: 'Incluir', bclass: 'add', onpress : actions},
			{name: 'Excluir', bclass: 'delete', onpress : actions},
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

    $('#usuarios').dblclick( function(){
        var id = $('.trSelected').find('td[abbr="id"]').text();
        if(id != '')
            $(location).attr('href','<?php echo $this->Html->url(array('controller' => $this->request->controller, 'action' => 'editar')); ?>/' + id);
    });    
    
    function actions(com, grid) {
		var id = $('.trSelected', grid).find('td[abbr="id"]').text();
        var nome = $('.trSelected', grid).find('td[abbr="username"]').text();
        switch(com) {
			case "Incluir":
                $(location).attr('href','<?php echo $this->Html->url(array('controller' => $this->request->controller, 'action' => 'incluir')); ?>');
                break;
            case "Excluir":
                if(id != ''){
                    if(confirm('Deseja realmente excluir?\n' + nome))
                        $(location).attr('href','<?php echo $this->Html->url(array('controller' => $this->request->controller, 'action' => 'delete')); ?>/' + id);
                }else
                    alert('Selecione um registro primeiro!');
                break;
		}
	}    

</script>