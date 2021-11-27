<?php

Class Livros 
{
    private $pdo;
    public $msgErro = "";
    
    public $nome;
    public $categoria;
    public $autor;
    public $ano;
    public $assunto;
    public $sinopse;

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

    public function cadastrar()
    {
    
        //verificar se já existe o livro cadastrado

        $sql = $this->pdo->prepare("SELECT id_livro FROM livros WHERE nome = :nome");
        $sql->bindValue(":nome", $nome);
        $sql->execute();

        if($sql->rowCount() > 0) {

            return false; //ja esta cadastrado

        } else {

            //caso não, cadastrar

            $sql = $this->pdo->prepare("INSERT INTO livros (nome, categoria, autor, ano, assunto, sinopse) VALUES (:nome, :categoria, :autor, :ano, :assunto, :sinopse )");
            $sql->bindValue(":nome", $this->$nome);
            $sql->bindValue(":categoria", $this->$categoria);
            $sql->bindValue(":autor", $this->$autor);
            $sql->bindValue(":ano", $this->$ano);
            $sql->bindValue(":assunto", $this->$assunto);
            $sql->bindValue(":sinopse", $this->$sinopse);

            $sql->execute();
            return true;
        }

    }

}


?>