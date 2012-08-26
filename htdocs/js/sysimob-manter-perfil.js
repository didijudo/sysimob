$('document').ready(function(){
	$('#formulario').hide(); // colocar a div formulario como hide logo no inicio
	
	$('#btnNovo').click(function(){
		showTelaNovo('Salvar','Cancelar');
	});
});


// FUNÇÕES
function salvar(){
	var param = new Object();
	param['per_descricao'] = $('#per_descricao').val();
	param['per_flativo'] = $('#per_flativo').val();
	
	$.post($('#url').val(), {acao:'1',param:param}, function(data){
		alert(data.mensagem);
	},'json');
	
	location.reload();	
	
	limparCampos('#per_descricao');
}


function alterar(){
	var param = new Object();
	param['per_codigo'] = $('#per_codigo').val();
	param['per_descricao'] = $('#per_descricao').val();
	param['per_flativo'] = $('#per_flativo').val();
	
	$.post($('#url').val(), {acao:'2',param:param}, function(data){
		alert(data.mensagem);
	},'json');
	
	closeTela();
	
	location.reload();
}

function excluir(linha,object){
	var idLinha = '#'+linha;	

	if (confirm('Deseja realmente excluir este registro???')) {		
		$(idLinha).remove();
		
		$.post($('#url').val(), {acao:'3',param:object}, function(data){			
			alert(data.mensagem);
		},'json');
	}
}

function cancelar(){	
	closeTela();
}

function limparCampos(campoFocus){
	$('#per_codigo').val('');
	$('#per_descricao').val('');
	$('#per_flativo').val('');
	
	if (campoFocus != '') {
		$(campoFocus).focus();
	}
}

function showTelaNovo(btnSalvar, btnCancelar){
	showTela(btnSalvar,btnCancelar);
}

function showTelaAlterar(btnAlterar,btnCancelar, dados){
	showTela(btnAlterar,btnCancelar);
	
	$('#per_codigo').val(dados.per_codigo);
	$('#per_descricao').val(dados.per_descricao);
	$('#per_flativo').val(dados.per_flativo);
}

function showTela(){
	telaCadastro();
	
	$('#buttons').html('');
	for (i=0;i<arguments.length;i++) {
		if ( i == 0 ) {
			$('#buttons').append('<input type="button" class="btn-large btn-primary" name="btn'+arguments[i]+'" value="'+arguments[i]+'" onclick="'+arguments[i].toLowerCase()+'()" />');
		} else {
			$('#buttons').append('<input type="button" class="btn-large" name="btn'+arguments[i]+'" value="'+arguments[i]+'" onclick="'+arguments[i].toLowerCase()+'()" />');
		}
	}
	
	$('#per_codigo').val('');
}

function closeTela(){
	$('#formulario').fadeOut('slow',function(){
		$('#formulario').html('');
		$('#formulario').hide();
	});	
}


// INTERFACES

function telaCadastro(){
	if (!$('#formulario').is(':visible')){
		$('#formulario').html('');
		
		$('#formulario').hide();
		
		$('#formulario').append(''+
						'<fieldset>'+
							'<div id="formulario">' +
								'<input type="hidden" id="per_codigo" name="per_codigo" value="">'+
								'<div class="control-group">'+
									'<label class="control-label" for="per_descricao">Descrição</label>'+
									'<div class="controls">'+
										'<input type="text" class="input-xlarge" id="per_descricao" placeholder="Informe a descrição do perfi ..." name="per_descricao">'+
									'</div>'+
								'</div>'+
								'<div class="control-group">'+
									'<label class="control-label" for="per_flativo">Status</label>'+
									'<div class="controls">'+
										'<select id="per_flativo" name="per_flativo">'+
											'<option value="1">Ativo</option>'+
											'<option value="0">Inativo</option>'+
										'</select>' + 
									'</div>'+
								'</div>'+
							'</div>'+
						'</fieldset>'+
						'<div class="center" id="buttons">'+
						'</div>');
		
		$('#formulario').fadeIn('slow');		
	}

}