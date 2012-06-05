<?php

/**
 * Classe para fazer as operacões padrão 
 *
 * @author Anderson Faro
 */
include_once 'Conexao.php';
class OperacaoBase {
    
    //private $clConexao = null;
    //private $conexao = null;
    
    function __construct() {
        echo "Testando OperacaoBase";
        //$this->conexao = new Conexao();
        //$this->conexao   = $this->clConexao->getConexao();
    }
    
    /*function __destruct() {
        $this->conexao->fechar();
    }*/
    
    /**
     *Montar operação insert
     * @param type $tbl tabela da operacao
     * @param type $entidade entidade com os campos da operacao
     * @param type $sch schema da tabela
     * @return type query montada
     */
    private function montarInsert($tbl, $entidade, $sch = "public") {
        $insertInto   = "INSERT INTO ".$sch.".".$tbl." ( ";
        $insertValues = " VALUES ( ";
        foreach ($entidade as $key => $value) {
            if (substr($key, 0, 1) != "_") {
                $insertInto   = $insertInto."$key".", ";
                $insertValues = $insertValues."$"."$key".", ";
            } else {
                $insertInto   = $insertInto.substr($key, 1).", ";
                $insertValues = $insertValues."$".substr($key, 1).", ";
            }
        }
        
        $insertInto    = $this->substituirUltimaOccor($insertInto, ",", " ) ");
        $insertValues  = $this->substituirUltimaOccor($insertValues, ",", " ) ");
        return $insertInto.$insertValues;
    }
    
    /**
     *Montar operação update
     * @param type $tbl tabela da operacao
     * @param type $entidade entidade com os campos da operacao
     * @param type $sch schema da tabela
     * @return type query montada
     */
    private function montarUpdate($tbl, $entidade, $sch = "public") {
        $update = "UPDATE ".$sch.".".$tbl." SET ";
        $where  = " WHERE ";
        foreach ($entidade as $key => $value) {
            if (substr($key, 0, 1) != "_") {
                $update = $update."$key"." = "."$"."$key".", ";            
            } else {
                $where = $where.substr($key, 1)." = ".substr($key, 1)." and ";
            }
        }        
        
        $update = $this->substituirUltimaOccor($update, ",", " ");
        $where  = $this->substituirUltimaOccor($where, "and", " ");
        return $update.$where;
    }
    
    /**
     * Metodo para montar as operacoes de Consulta e Delete
     * @param type $tbl tabela da operacao
     * @param type $entidade Entidade referente a operacao
     * @param type $sch Schema da tabela
     * @param type $tipo C - Consulta | D - Delete
     * @return type Retorna a query montada
     */
    private function montarSelectDelete($tbl, $entidade, $sch = "public", $tipo = "C") {
        if ($tipo == "C")
            $query = "SELECT * FROM ".$sch.".".$tbl;
        else
            $query = "DELETE FROM ".$sch.".".$tbl;
        
        $where = " ";
        foreach ($entidade as $key => $value) {
            if (substr($key, 0, 1) == "_") {
                $where = $where.substr($key, 1)." = ".substr($key, 1)." and ";
            }
        }
        
        $where = $this->substituirUltimaOccor($where, "and", " ");
        return $query.$where;
    }
    
    /**
     * Substitui a ultima ocorrencia do valor passado pelo novo
     * @param type $string valor que sera procurada
     * @param type $inicial valor antigo
     * @param type $sub valor novo
     * @return type Valor atualizado
     */
    private function substituirUltimaOccor($string, $inicial, $sub) {
        $pos    = strripos($string, $inicial);
        $string = substr($string, 0, $pos);
        return $string.$sub;
    }
    
    /**
     * Metodo para montar os parametros da operacao
     * @param type $entidade Entidade que ira construir a operacao
     * @param type $tipo type T - Insert / Update | C - Consulta | D - Delete     
     */
    private function montarParametro($entidade, $tipo = "T") {
        $param = array();
        foreach ($entidade as $key => $value) {
            if ($tipo == "T") {
                if (substr($key, 0, 1) != "_") {
                    $param["$".$key] = $value;
                } else {
                    $param["$".substr($key, 1)] = $value;                
                }
            } elseif (substr($key, 0, 1) == "_") {
                $param["$".substr($key, 1)] = $value;                
            }
        }
        
        return $param;
    }
    
    public function inserir($tabela, $pEntidade, $schema = "public") {
        try {
            $conexao = new Conexao();
            $conAtiva   = $conexao->getConexao();
            $query = $this->montarInsert($tabela, $pEntidade, $schema);
            $param =  $this->montarParametro($pEntidade);
            pg_execute($conAtiva, $query, array($param));  
            $conexao->fechar();
        } catch (Exception $err) {
            throw new Exception("Erro:\n".$err->getMessage());
        }
    }
    
    public function atualizarKey($tabela, $pEntidade, $schema = "public") {
        try {
            $conexao = new Conexao();
            $conAtiva   = $conexao->getConexao();
            $query = $this->montarUpdate($tabela, $pEntidade, $schema);
            $param =  $this->montarParametro($pEntidade);
            pg_execute($conAtiva, $query, array($param)); 
            $this->conexao->fechar();
        } catch (Exception $err) {
            throw new Exception("Erro:\n".$err->getMessage());
        }
    }
    
    public function consultarKey($tabela, $pEntidade, $schema = "public") {
        try {
            $conexao = new Conexao();
            $conAtvida    = $conexao->getConexao();
            $query  = $this->montarSelectDelete($tabela, $pEntidade, $schema);
            $param  = $this->montarParametro($pEntidade, "C");            
            $result = pg_query_params($conAtvida, $query, array($param));
            $this->conexao->fechar();
            return $result;
        } catch (Exception $err) {
            throw new Exception("Erro:\n".$err->getMessage());
        }
    }
    
    public function deleteKey($tabela, $pEntidade, $schema = "public") {
        try {
            $conexao = new Conexao();
            $conAtiva    = $conexao->getConexao();
            $query  = $this->montarSelectDelete($tabela, $pEntidade, $schema, "D");
            $param  = $this->montarParametro($pEntidade, "D");            
            //$result = pg_query_params($con, $query, array($param));
            pg_execute($conAtiva, $query, array($param)); 
            $this->conexao->fechar();
            //return $result;
        } catch (Exception $err) {
            throw new Exception("Erro:\n".$err->getMessage());
        }
    }
}

?>
