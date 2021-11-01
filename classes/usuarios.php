<?php

Class Usuario 
{
    private $pdo;
    public $msgErro = "";

    public function conectar($nome, $host, $usuario, $senha)
    {
        global $pdo;
        global $msgErro;
        try
        {
            $pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);  
        } catch (PDOException $e) {
            $msgErro = $e->getMessage();
        }
        
    }

    public function cadastrar($nome, $cpf, $email, $rg, $masculino, $feminino, $outros, $data_nascimento, $senha, $estado, $cidade, $cep, $bairro, $rua, $complemento)
    {
        global $pdo;

        //verificar se já existe o email cadastrado

        $sql = $pdo-> prepare("SELECT id_usuario FROM usuarios WHERE email = :e");
        $sql->bindValue(":e", $email);
        $sql->execute();

        if($sql->rowCounter() > 0) {

            return false; //ja esta cadastrado

        } else {

            //caso não, cadastrar

            $sql = $pdo->prepare("INSERT INTO usuarios (nome, cpf, email, rg, masculino, feminino, outros, data_nascimento, senha, estado, cidade, cep, bairro, rua, complemento) VALUES (:n, :c, :e, :rg, :m, :f, :o :d, :s, :es, :ci, :c, :b, :r, :co )");
            $sql->bindValue(":n", $nome);
            $sql->bindValue(":c", $cpf);
            $sql->bindValue(":e", $email);
            $sql->bindValue(":rg", $rg);
            $sql->bindValue(":m", $masculino);
            $sql->bindValue(":f", $feminino);
            $sql->bindValue(":o", $outros);
            $sql->bindValue(":d", $data_nascimento);
            $sql->bindValue(":s", md5($senha));
            $sql->bindValue(":es", $estado);
            $sql->bindValue(":ci", $cidade);
            $sql->bindValue(":c", $cep);
            $sql->bindValue(":b", $bairro);
            $sql->bindValue(":r", $rua);
            $sql->bindValue(":co", $complemento);

            $sql->execute();
            return true;
        }

    }

    public function logar($email, $senha)
    {
        global $pdo;

        //verificar se o email e senha estão cadastrados, se sim
        $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e AND senha = :s");
        $sql->bindValue(":e", $email);
        $sql->bindValue(":s", md5($senha));
        $sql->execute();
        if($sql->rowCounter() > 0) 
        {        
            //entrar no sistema (sessão)
            $dado = $sql->fetch();
            session_start();
            $_SESSION['id_usuario'] = $dado['id_usuario'];
            return true; //cadastrado com sucesso

        } else {
            return false; //não foi possivel logar
        }       
    }
}


?>