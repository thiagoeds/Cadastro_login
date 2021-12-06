<?php

require_once 'classes/DB.php';
Class Livro extends DB
{
   
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

    //acessar a tabela (executar sql)
    //pegar o resultado da consulta (do sql)
    //juntar em um array o resultado
    //retornar o array

    public function busca_livros() {

        $this->conectar();
        $sql = $this->pdo->query("SELECT * FROM livros");
        $sql = $sql->fetchAll();
        return $sql;

    }

    public function cadastrar()
    {
   
        //verificar se já existe o livro cadastrado

        $sql = $this->pdo->prepare("SELECT id_livro FROM livros WHERE nome = :nome");
        $sql->bindValue(":nome", $this->nome);
        $sql->execute();

        if($sql->rowCount() > 0) {

            return false; //ja esta cadastrado

        } else {

            //caso não, cadastrar

            $sql = $this->pdo->prepare("INSERT INTO livros (nome, autor, editora, categoria, idioma, ano, pagina, edicao, assunto, sinopse) VALUES (:nome, :autor, :editora, :categoria, :idioma, :ano, :pagina, :edicao, :assunto, :sinopse)");

            $sql->bindValue(":nome", $this->nome);
            $sql->bindValue(":autor", $this->autor);
            $sql->bindValue(":editora", $this->editora);
            $sql->bindValue(":categoria", $this->categoria);
            $sql->bindValue(":idioma", $this->idioma);
            $sql->bindValue(":ano", $this->ano);
            $sql->bindValue(":pagina", $this->pagina);
            $sql->bindValue(":edicao", $this->edicao);
            $sql->bindValue(":assunto", $this->assunto);
            $sql->bindValue(":sinopse", $this->sinopse);

            if(!$sql->execute()){
                var_dump($sql->errorInfo());
            }
            return true;
        }

    }

}


?>