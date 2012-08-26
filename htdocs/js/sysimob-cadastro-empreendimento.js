/* 
 * Classe para validação dos dados informados antes do mesmo ser submetido
 * @Autor Anderson Faro
 */

$('document').ready(function() {
					$('#CadastrarEmpreendimento').validate({
										rules : {
											nmEmpreendimento : {
												required : true,
												minlength : 2,
												maxlength : 50
											},
											dsEmpreendimento : {
												maxlength : 300
											},
											dsEndereco : {
												required : true,
												minlength : 2,
												maxlength : 150
											}
										},
										messages : {
											nmEmpreendimento : {
												required : "<h5>Campo de preenchimento obrigatorio.</h5>",
												minlength : "<h5>Campo precisa de no minimo 2 caracteres.</h5>",
												maxlength : "<h5>Campo com tamanho maximo de 50 caracteres.</h5>"
											},
											dsEmpreendimento : {
												maxlength : "<h5>Campo com tamanho maximo de 300 caracteres.</h5>"
											},
											dsEndereco : {
												required : "<h5>Campo de preenchimento obrigatorio.</h5>",
												minlength : "<h5>Campo precisa de no minimo 2 caracteres.</h5>",
												maxlength : "<h5>Campo com tamanho maximo de 150 caracteres.</h5>"
											}
										}
					});

					$('#posicaoContent').html('');

					$('#apa_qtdapporandar').blur(function() {
						preencherPosicao();
					});

					$('#blo_qtdbloco').blur(function() {
						if ($('#apa_qtdapporandar').val() != '') {
							preencherPosicao();
						}
					});
				});

function preencherPosicao() {
	var qtdBloco = $('#blo_qtdbloco').val();
	var qtdApPorAndar = $('#apa_qtdapporandar').val();

	$('#posicaoContent').html('');

	for (i = 1; i <= qtdBloco; i++) {
		$('#posicaoContent').append('<label class="center label">BLOCO ' + i + ' - PRIMEIRO ANDAR</label>');
		for (j = 1; j <= qtdApPorAndar; j++) {
			$('#posicaoContent').append('<label class="control-label" for="apa_posicao_' + i + j + '">Apartamento 10' + j + '</label>');
			$('#posicaoContent').append('<div class="controls">' +  
										'	<select id="apa_posicao_' + i + j + '" name="apa_posicao_' + i + j + '">' +
										'		<option>NO</option>' + '		<option>N</option>' +
										'		<option>NE</option>' + '		<option>L</option>' +
										'		<option>SE</option>' + '		<option>S</option>' +
										'		<option>SO</option>' + '		<option>O</option>' +
										'	</select>' + 
										'</div>');
		}
	}
};