<?php

include_once 'lib/TransactionContext.php';
include_once 'gerenciador/imobiliario/GerenciadorBloco.php';
include_once 'gerenciador/imobiliario/GerenciadorApartamento.php';
include_once 'gerenciador/imobiliario/GerenciadorEmpreendimento.php';
include_once 'entidade/imobiliario/EntidadeApartamento.php';
include_once 'entidade/imobiliario/EntidadeBloco.php';
include_once 'entidade/imobiliario/EntidadeEmpreendimento.php';
include_once 'controller/PerfilA/PerfilAController.php';
class CadastrarEmpreendimentoController extends PerfilAController{

	public $javascript = array ('jquery', 'jquery.validate', 'sysimob-cadastro-empreendimento');

	public function setInfoContent() {
		$html =
		'<form class="left sysmobcontent form-horizontal" method="post">
			<label class="center label">EMPREENDIMENTOS</label>
			<fieldset class="well">
				<div class="control-group">
					<label class="control-label" for="emp_nome">Nome</label>
					<div class="controls">
						<input type="text" class="input-xxlarge" id="emp_nome" name="emp_nome">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="emp_descricao">Descrição</label>
					<div class="controls">
						<textarea class="input-xxlarge" id="emp_descricao" name="emp_descricao" rows="3"></textarea>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="emp_localizacao">Endereço</label>
					<div class="controls">
						<input type="text" class="input-xxlarge" id="emp_localizacao" name="emp_localizacao">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="emp_dtlancamento">Data de Lançamento</label>
					<div class="controls">
						<input type="text" class="input-small" id="emp_dtlancamento" name="emp_dtlancamento">
					</div>
				</div>
			</fieldset>
			<label class="center label">BLOCO</label>
			<fieldset class="well">
				<div class="control-group">
					<label class="control-label" for="blo_qtdbloco">Qtd. Bloco</label>
					<div class="controls">
						<input type="text" class="input-mini" id="blo_qtdbloco" name="blo_qtdbloco">
					</div>
				</div>
			</fieldset>
			<label class="center label">APARTAMENTO</label>
			<fieldset class="well">
				<div class="control-group">
					<label class="control-label" for="apa_qtdandar">Qtd. Andares do Bloco</label>
					<div class="controls">
						<input type="text" class="input-mini" id="apa_qtdandar" name="apa_qtdandar">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="apa_qtdapporandar">Qtd. Apartamento por Andar</label>
					<div class="controls">
						<input type="text" class="input-mini" id="apa_qtdapporandar" name="apa_qtdapporandar">
					</div>
				</div>
				<div class="center control-group" id="posicaoContent">
				</div>
			</fieldset>
			<div class="center">
				<input type="submit" class="btn-large btn-primary" name="btnSalvar" value="Salvar" />
				<button class="btn-large" name="btnCancelar">Cancelar</button>
			</div>
		</form>';
			
		return $html;
	}

	private function salvar() {
		if (isset($_POST["emp_nome"]) && $_POST["emp_nome"] != '' &&
			isset($_POST["emp_descricao"]) && $_POST["emp_descricao"] != '' &&
			isset($_POST["emp_localizacao"]) && $_POST["emp_localizacao"] != '' &&
			isset($_POST["emp_dtlancamento"]) && $_POST["emp_dtlancamento"] != '' &&
			isset($_POST["blo_qtdbloco"]) && $_POST["blo_qtdbloco"] != '' &&
			isset($_POST["apa_qtdapporandar"]) && $_POST["apa_qtdapporandar"] != '' &&
			isset($_POST["apa_qtdandar"]) && $_POST["apa_qtdandar"] != ''){

			try {
				$transacao = new TransactionContext();
				$transacao->begin();

				$entEmpreendimento = new EntidadeEmpreendimento();
				$entEmpreendimento->setEmpNome($_POST["emp_nome"]);
				$entEmpreendimento->setEmpDescricao($_POST["emp_descricao"]);
				$entEmpreendimento->setEmpLocalizacao($_POST["emp_localizacao"]);
				$entEmpreendimento->setEmpDtLancamento($_POST["emp_dtlancamento"]);
					
				$gerEmpreendimento = new GerenciadorEmpreendimento();
				$linhasInseridasEmp = $gerEmpreendimento->inserir($entEmpreendimento, $transacao->getConAtiva());
				$linha = $linhasInseridasEmp['0'];
				$emp_id = $linha['emp_id'];
				$qtdBloco = $_POST['blo_qtdbloco'];
					
				$gerBloco = new GerenciadorBloco();
				for ($i = 1; $i <= $qtdBloco; $i++ ) {
					$blo_id = $i;
					$entBloco = new EntidadeBloco();
					$entBloco->setEmpId($emp_id);
					$entBloco->setBloId($blo_id);
					$entBloco->setBloStatus('B');
					$gerBloco->inserir($entBloco, $transacao->getConAtiva());
				};
					
				$qtdApPorAndar = $_POST["apa_qtdapporandar"];
				$qtdAndar = $_POST["apa_qtdandar"];
					
				$gerApartamento = new GerenciadorApartamento();
				for ($i = 1; $i <= $qtdBloco; $i++){
					$blo_id = $i;
					for ($j = 1; $j <= $qtdAndar; $j++) {
						$apa_numero = Constante::$PADRAO_NUMERO_APARTAMENTO;
						$apa_numero = $apa_numero * $j;
						$entApartamento = new EntidadeApartamento();
						for ($k = 1; $k <= $qtdApPorAndar; $k++) {
							$apa_posicao = $_POST['apa_posicao_'.$i.$k];
							$apa_numero = $apa_numero + $k;
							$entApartamento->setApaNumero($apa_numero);
							$entApartamento->setBloId($blo_id);
							$entApartamento->setEmpId($emp_id);
							$entApartamento->setApaStatus('L');
							$entApartamento->setApaPosicao($apa_posicao);
							$gerApartamento->inserir($entApartamento, $transacao->getConAtiva());
							$apa_numero = $apa_numero - $k;
						}
					}
				}
				$transacao->commit();
			} catch (Exception $e) {
				$transacao->rollback();
				throw new Exception("Erro:\n".$err->getMessage());
			}
		} else {
			//var_dump($_POST);
			echo('
					<script type="text/javascript">
						alert("Formulário incompleto!!! Preencha todo o formulário!!!");
					</script>');
		}
	}

	public function processRequest() {		
		if (!is_null($this->usuario) && $this->usuario['per_codigo'] != 2) {
			session_unset();
			die('Você não pode acessar essa pagina!');
		} else {
			if (isset($_POST['btnSalvar']) && $_POST['btnSalvar'] == 'Salvar') {
				$this->salvar();
			}
		}
	}

	public function setTitle() {
		return '..:: AC Engenharia - Cadastrar Empreendimento ::..';
	}
}