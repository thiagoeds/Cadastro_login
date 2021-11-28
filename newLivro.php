<?php

    session_start();
    if(!isset($_SESSION['id_usuario']))
    {
        header("location: index.php");
        exit;
    }

    require_once 'classes/biblioteca.php';
    $livro = new Livro; //atribuição a classe 


?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/style3.css">
        <title>Biblioteca Virtual</title>
    </head>
    <body>

        <header id="header">
            <a href="#" class="logo">Biblioteca Virtual</a>
            <ul>
                <li><a href="#" class="active">Home</a></li>
                <li><a href="#">Sobre</a></li>
                <li><a href="acesso.php">Nosso Acervo</a></li>
                <li><a href="#">Descrição</a></li>
                <li><a href="#">Contato</a></li>
            </ul>
        </header>

        <section>
            <form class="form-livro" action="newLivro.php" method="post">
                <label for="name">Nome:</label>
                <input type="text" name="nome" size="40"> &nbsp;&nbsp;&nbsp;
                <label for="name">Autor:</label>
                <input type="text" name="autor" size="40"> &nbsp;&nbsp;&nbsp;
                <label for="name">Editora:</label>
                <input type="text" name="editora" size="20"> <br><br>
                <label for="name">Categoria:</label>
                <input type="text" name="categoria" size="60"> &nbsp;&nbsp;&nbsp;
                <label for="name">Idioma:</label>
                <input type="text" name="idioma" size="40"> <br><br> 
                <label for="name">Ano:</label>
                <input type="text" name="ano" size="20"> &nbsp;&nbsp;&nbsp;
                <label for="name">Página:</label>
                <input type="text" name="pagina" size="15"> &nbsp;&nbsp;&nbsp;
                <label for="name">Edição:</label>
                <input type="text" name="edicao" size="15"> <br><br>
                <label for="name">Assunto:</label>
                <input type="text" name="assunto" size="100"> <br><br>
                <label for="name">Sinopse:</label>
                <textarea name="sinopse"></textarea> <br><br>
			
                <div>
                    <button onclick="location.href='acesso.php'" type="button">
                    Voltar</button>

                    &nbsp;&nbsp;&nbsp;

                    <button type="submit">Cadastrar</button>
                </div>                

            </form>
        </section>


        <?php

        //Verificar se clicou no botão
        if(isset($_POST['nome'])) 

            {
                $this->$nome = addslashes($_POST['nome']);
                $this->$autor = addslashes($_POST['autor']);
                $this->$editora = addslashes($_POST['editora']);
                $this->$categoria = addslashes($_POST['categoria']);
                $this->$idioma = addslashes($_POST['idioma']);           
                $this->$ano = addslashes($_POST['ano']);
                $this->$pagina = addslashes($_POST['pagina']);
                $this->$edicao = addslashes($_POST['edicao']);
                $this->$assunto = addslashes($_POST['assunto']);
                $this->$sinopse = addslashes($_POST['sinopse']);

                // Verificar se esta preenchido

                if(!empty($nome) && !empty($autor) && !empty($editora) && !empty($categoria) && !empty($idioma) &&  !empty($ano) &&  !empty($pagina) && !empty($edicao) && !empty($assunto) && !empty($sinopse))  
                
                {
                   /*  $usuario->conectar();
                    if($usuario->msgErro == "")  // se esta tudo certo
                    {
                        if($senha == $conf_senha) 
                        { */
                            $retorno = $usuario->cadastrar();
                            
                            if($retorno)
                            {
                                ?>
                                    <div id="msg-sucesso">
                                        Livro cadastrado com sucesso!
                                    </div>
                                <?php 
                            } else {
                                ?>
                                    <div class="msg-erro">
                                        Livro ja cadastrado!
                                    </div>
                                <?php 
                            }                       
                       /*  }  
                    } */
                }        
            }

        ?>

    </body>
</html>