<?php

Class Usuario 
{
    private $pdo;
    public $msgErro = "";

    public function conectar($nome, $host, $usuario, $senha)
    {
        try
        {
            $this->pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);  
            return true;
        } catch (PDOException $e) {
            $msgErro = $e->getMessage();
            return false;
        }
        
    }

    public function cadastrar($nome, $cpf, $email, $rg, $sexo, $data_nascimento, $senha, $estado, $cidade, $cep, $bairro, $rua, $numero, $complemento)
    {
    
        //verificar se já existe o email cadastrado

        $sql = $this->pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :email");
        $sql->bindValue(":email", $email);
        $sql->execute();

        if($sql->rowCount() > 0) {

            return false; //ja esta cadastrado

        } else {

            //caso não, cadastrar

            $sql = $this->pdo->prepare("INSERT INTO usuarios (nome, cpf, email, rg, sexo, data_nascimento, senha, estado, cidade, cep, bairro, rua, numero, complemento) VALUES (:nome, :cpf, :email, :rg, :sexo, :data_nascimento, :senha, :estado, :cidade, :cep, :bairro, :rua, :numero, :complemento )");
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":cpf", $cpf);
            $sql->bindValue(":email", $email);
            $sql->bindValue(":rg", $rg);
            $sql->bindValue(":sexo", $sexo);
            $sql->bindValue(":data_nascimento", $data_nascimento);
            $sql->bindValue(":senha", md5($senha));
            $sql->bindValue(":estado", $estado);
            $sql->bindValue(":cidade", $cidade);
            $sql->bindValue(":cep", $cep);
            $sql->bindValue(":bairro", $bairro);
            $sql->bindValue(":rua", $rua);
            $sql->bindValue(":numero", $numero);
            $sql->bindValue(":complemento", $complemento);

            $sql->execute();
            return true;
        }

    }

    public function logar($email, $senha)
    {
      
  if($this->conectar("cadastramento_login","localhost","root","")){

        //verificar se o email e senha estão cadastrados, se sim
        $sql = $this->pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :email AND senha = :senha");
        $sql->bindValue(":email", $email);
        $sql->bindValue(":senha", md5($senha));
        $sql->execute();
        if($sql->rowCount() > 0) 
        {   
             
            //entrar no sistema (sessão)
            $dados = $sql->fetch();
            session_start();
            $_SESSION['id_usuario'] = $dados['id_usuario'];
            return true; //usuario encontrado com sucesso

        } else {
            return false; //não foi possivel logar
        }       
    }
    }
}


?>