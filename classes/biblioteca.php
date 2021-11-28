<?php

Class Livro 
{
    private $pdo;
    public $msgErro = "";
    
    public $nome;
    public $autor;
    public $editora;
    public $categoria;
    public $idioma;    
    public $ano;
    public $pagina;
    public $edicao;
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

            $sql = $this->pdo->prepare("INSERT INTO livros (nome, autor, editora, categoria, idioma, ano, pagina, edicao, assunto, sinopse) VALUES (:nome, :autor, :editora, :categoria, :idioma, :ano, :pagina, :edicao, :assunto, :sinopse)");

            $sql->bindValue(":nome", $this->$nome);
            $sql->bindValue(":autor", $this->$autor);
            $sql->bindValue(":editora", $this->$editora);
            $sql->bindValue(":categoria", $this->$categoria);
            $sql->bindValue(":idioma", $this->$idioma);
            $sql->bindValue(":ano", $this->$ano);
            $sql->bindValue(":ano", $this->$pagina);
            $sql->bindValue(":edicao", $this->$edicao);
            $sql->bindValue(":assunto", $this->$assunto);
            $sql->bindValue(":sinopse", $this->$sinopse);

            $sql->execute();
            return true;
        }

    }

}


?>