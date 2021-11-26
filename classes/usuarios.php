<?php

Class Usuario 
{
    private $pdo;
    public $msgErro = "";
    
    public $nome;
    public $cpf;
    public $email;
    public $rg;
    public $sexo;
    public $data_nascimento;
    public $senha;
    public $estado;
    public $cidade;
    public $cep;
    public $bairro;
    public $rua;
    public $numero;
    public $complemento;

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
    
        //verificar se já existe o email cadastrado

        $sql = $this->pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :email");
        $sql->bindValue(":email", $email);
        $sql->execute();

        if($sql->rowCount() > 0) {

            return false; //ja esta cadastrado

        } else {

            //caso não, cadastrar

            $sql = $this->pdo->prepare("INSERT INTO usuarios (nome, cpf, email, rg, sexo, data_nascimento, senha, estado, cidade, cep, bairro, rua, numero, complemento) VALUES (:nome, :cpf, :email, :rg, :sexo, :data_nascimento, :senha, :estado, :cidade, :cep, :bairro, :rua, :numero, :complemento )");
            $sql->bindValue(":nome", $this->$nome);
            $sql->bindValue(":cpf", $this->$cpf);
            $sql->bindValue(":email", $this->$email);
            $sql->bindValue(":rg", $this->$rg);
            $sql->bindValue(":sexo", $this->$sexo);
            $sql->bindValue(":data_nascimento", $this->$data_nascimento);
            $sql->bindValue(":senha", md5($this->$senha));
            $sql->bindValue(":estado", $this->$estado);
            $sql->bindValue(":cidade", $this->$cidade);
            $sql->bindValue(":cep", $this->$cep);
            $sql->bindValue(":bairro", $this->$bairro);
            $sql->bindValue(":rua", $this->$rua);
            $sql->bindValue(":numero", $this->$numero);
            $sql->bindValue(":complemento", $this->$complemento);

            $sql->execute();
            return true;
        }

    }

    public function logar($email, $senha)
    {
      
  if($this->conectar()){

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