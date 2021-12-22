<?php
class DB
{
    protected $pdo;
    public $msgErro = "";

    public function conectar()
    {
        $nome = "cadastramento_login";  //Nome da tabela
        $host = "localhost";            // nome do dominio
        $usuario = "root";              // nome de usuário MySQL
        $senha = "";                    // senha MySQL

        try
        {
            $this->pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);  
            return true;
        } catch (PDOException $e) {
            $msgErro = $e->getMessage();
            return false;
        }
        
    }
}
