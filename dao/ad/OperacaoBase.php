<?php

/**
 * Classe para fazer as operacões padrão 
 *
 * @author Anderson Faro
 */
class OperacaoBase {
    
    //private $clConexao = null;
    private $conexao = null;
    
    function __construct() {
        $this->conexao = new Conexao();
        //$this->conexao   = $this->clConexao->getConexao();
    }
    
    function __destruct() {
        $this->conexao->fechar();
    }
    
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
    
    private function montarSelect($tbl, $entidade, $sch = "public") {
        $select = "SELECT * FROM ".$sch.".".$tbl;
        $where = " ";
        foreach ($entidade as $key => $value) {
            if (substr($key, 0, 1) == "_") {
                $where = $where.substr($key, 1)." = ".substr($key, 1)." and ";
            }
        }
        
        $where = $this->substituirUltimaOccor($where, "and", " ");
        return $select.$where;
    }
    
    private function substituirUltimaOccor($string, $inicial, $sub) {
        $pos    = strripos($string, $inicial);
        $string = substr($string, 0, $pos);
        return $string.$sub;
    }
    
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
            $con   = $this->conexao->getConexao();
            $query = $this->montarInsert($tabela, $pEntidade, $schema);
            $param =  $this->montarParametro($pEntidade);
            pg_execute($con, $query, array($param));  
            $this->conexao->fechar();
        } catch (Exception $err) {
            throw new Exception("Erro:\n".$err->getMessage());
        }
    }
    
    public function atualizarKey($tabela, $pEntidade, $schema = "public") {
        try {
            $con   = $this->conexao->getConexao();
            $query = $this->montarUpdate($tabela, $pEntidade, $schema);
            $param =  $this->montarParametro($pEntidade);
            pg_execute($con, $query, array($param)); 
            $this->conexao->fechar();
        } catch (Exception $err) {
            throw new Exception("Erro:\n".$err->getMessage());
        }
    }
    
    public function consultarKey($tabela, $pEntidade, $schema = "public") {
        try {
            $con    = $this->conexao->getConexao();
            $query  = $this->montarSelect($tabela, $pEntidade, $schema);
            $param  = $this->montarParametro($pEntidade, "C");            
            $result = pg_query_params($con, $query, array($param));
            $this->conexao->fechar();
            return $result;
        } catch (Exception $err) {
            throw new Exception("Erro:\n".$err->getMessage());
        }
    }
}

?>
