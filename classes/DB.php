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


    // // Conecte-se ao servidor e selecione um banco de dados.
    // mysql_connect("$host", "$username", "$password") or die("cannot connect");
    // mysql_select_db("$db_name") or die("cannot select DB");

    // // Nome de usuário e senha enviados do formulário
    // $username = $_POST['username'];
    // $password = $_POST['password'];

    // // Para proteger a injeção de MySQL (mais detalhes sobre a injeção de MySQL)
    // $username = stripslashes($username);
    // $password = stripslashes($password);
    // $username = mysql_real_escape_string($username);
    // $password = mysql_real_escape_string($password);
    // $sql = "SELECT * FROM $tbl_name WHERE username='$username' and password='$password'";
    // $result = mysql_query($sql);

    // // Mysql_num_row está contando as linhas da tabela
    // $count=mysql_num_rows($result);

    // // Se o resultado corresponder a $ username e $ password, a linha da tabela deve ser uma linha
    // if($count == 1){
    //     session_start();
    //     $_SESSION['loggedin'] = true;
    //     $_SESSION['username'] = $username;
    // }

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
