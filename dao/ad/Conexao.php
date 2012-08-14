<?php

/**
 * Classe para gerneciar a conexao com o postgreSQL
 *
 * @author Anderson Faro
 */
class Conexao {

    private $host = "localhost";
    private $user = "postgres";
    private $pwd = "diegorabelodefranca";
    private $dbname = "desenvolvimento";
    private $con = null;

    function __construct(){} 

    private function abrir(){
        try {
            $this->con = pg_connect("host=$this->host user=$this->user "
                    ."password=$this->pwd dbname=$this->dbname");
            return $this->con;
        } catch (Exception $err) {
            throw new Exception("Erro:\n".$err->getMessage());
        }
    }
    
    public function fechar(){
        try {
            @pg_close($this->con);
        } catch (Exception $err) {
            throw new Exception("Erro:\n".$err->getMessage());
        }
    }
    
    public function situacao() {
        if(@pg_connection_status($this->con) == PGSQL_CONNECTION_OK){
            echo "<h3>O sistema não está conectado à  [$this->dbname] em [$this->host].</h3>";
            exit;
        } else {
            echo "<h3>O sistema está conectado à  [$this->dbname] em [$this->host].</h3>";
        }
    }
    
    public function getConexao() {
        if ($this->con) {			
            return $this->con;
        } else {
            return $this->abrir();
        }
    }

}
?>
