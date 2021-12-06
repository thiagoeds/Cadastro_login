<?php
class DB
{
    protected $pdo;
    public $msgErro = "";

    public function conectar()
    {
        $nome = "cadastramento_login";
        $host = "localhost";
        $usuario = "root";
        $senha = "";

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
