<?php

/**
 * Classe para gerneciar a conexao com o postgreSQL
 *
 * @author Anderson Faro
 */
class Conexao {

    private $host = "localhost";
    private $user = "postgres";
    private $pwd = "123456";
    private $dbname = "SysImob";
    private $con = null;

    function __construct(){} 

    private static function abrir(){
        try {
            $this->con = @pg_connect("host=$this->host user=$this->user "
                    ."password=$this->pwd dbname=$this->dbname");
        } catch (Exception $err) {
            throw new Exception("Erro:\n".$err->getMessage());
        }
    }
    
    public static function fechar(){
        try {
            @pg_close($this->con);
        } catch (Exception $err) {
            throw new Exception("Erro:\n".$err->getMessage());
        }
    }
    
    public static function situacao() {
        if(pg_connection_status($this->con) === PGSQL_CONNECTION_OK){
            echo "<h3>O sistema não está conectado à  [$this->dbname] em [$this->host].</h3>";
            exit;
        } else {
            echo "<h3>O sistema está conectado à  [$this->dbname] em [$this->host].</h3>";
        }
    }
    
    public static function getConexao() {
        if (pg_connection_status($this->con) === PGSQL_CONNECTION_OK) {
            return $this->con;
        } else {
            return $this->abrir();
        }
    }

}
?>
