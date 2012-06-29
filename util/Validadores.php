<?php

/**
 * Classe composta por diversos validadores para validação de dados do sistema
 *
 * @author Andenrson Faro
 */
class Validadores {
    
    /**
     * Validador encontrado no link: 
     * http://codigofonte.uol.com.br/codigo/php/validacao/validacao-de-cpf-com-php
     * @param type $cpf CPF a ser verificado
     * @return boolean Retorna true caso o CPF seja valido
     */
    public function validarCPF($cpf)
    {	// Verifiva se o número digitado contém todos os digitos
        $cpf = str_pad(ereg_replace('[^0-9]', '', $cpf), 11, '0', STR_PAD_LEFT);

            // Verifica se nenhuma das sequências abaixo foi digitada, caso seja, retorna falso
        if (strlen($cpf) != 11 || $cpf == '00000000000' || $cpf == '11111111111' 
                || $cpf == '22222222222' || $cpf == '33333333333' || $cpf == '44444444444' 
                || $cpf == '55555555555' || $cpf == '66666666666' || $cpf == '77777777777' 
                || $cpf == '88888888888' || $cpf == '99999999999')
            {
            return false;
        }
            else
            {   // Calcula os números para verificar se o CPF é verdadeiro
            for ($t = 9; $t < 11; $t++) {
                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf{$c} * (($t + 1) - $c);
                }

                $d = ((10 * $d) % 11) % 10;

                if ($cpf{$c} != $d) {
                    return false;
                }
            }

            return true;
        }
    }
        
    /**
     *validador para CNPJ encontrado no link:
     * http://www.vivaolinux.com.br/script/Validacao-de-CPF-e-CNPJ
     * @param type $cnpj CNPJ a ser validado
     * @return boolean retorna true se o cnpj eh valido
     */
    function validarCNPJ($cnpj) {
	
		if (strlen($cnpj) <> 14)
			return false; 

		$soma = 0;
		
		$soma += ($cnpj[0] * 5);
		$soma += ($cnpj[1] * 4);
		$soma += ($cnpj[2] * 3);
		$soma += ($cnpj[3] * 2);
		$soma += ($cnpj[4] * 9); 
		$soma += ($cnpj[5] * 8);
		$soma += ($cnpj[6] * 7);
		$soma += ($cnpj[7] * 6);
		$soma += ($cnpj[8] * 5);
		$soma += ($cnpj[9] * 4);
		$soma += ($cnpj[10] * 3);
		$soma += ($cnpj[11] * 2); 

		$d1 = $soma % 11; 
		$d1 = $d1 < 2 ? 0 : 11 - $d1; 

		$soma = 0;
		$soma += ($cnpj[0] * 6); 
		$soma += ($cnpj[1] * 5);
		$soma += ($cnpj[2] * 4);
		$soma += ($cnpj[3] * 3);
		$soma += ($cnpj[4] * 2);
		$soma += ($cnpj[5] * 9);
		$soma += ($cnpj[6] * 8);
		$soma += ($cnpj[7] * 7);
		$soma += ($cnpj[8] * 6);
		$soma += ($cnpj[9] * 5);
		$soma += ($cnpj[10] * 4);
		$soma += ($cnpj[11] * 3);
		$soma += ($cnpj[12] * 2); 
		
		
		$d2 = $soma % 11; 
		$d2 = $d2 < 2 ? 0 : 11 - $d2; 
		
		if ($cnpj[12] == $d1 && $cnpj[13] == $d2) {
			return true;
		}
		else {
			return false;
		}
	} 
}

?>
