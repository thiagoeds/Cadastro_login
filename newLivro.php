<?php

    /* session_start();
    if(!isset($_SESSION['id_usuario']))
    {
        header("location: index.php");
        exit;
    } */

    require_once 'classes/livros.php';
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

        <section id="formulario">
            <form class="form-livro" action="newLivro.php" method="post">
                <label for="name">Nome:</label>
                <input type="text" name="nome" size="155">  <br>
                <label for="name">Autor:</label>
                <input type="text" name="autor" size="155">  <br>
                <label for="name">Editora:</label>
                <input type="text" name="editora" size="150"> <br>
                <label for="name">Categoria:</label>
                <input type="text" name="categoria" size="150">  <br>
                <label for="name">Idioma:</label>
                <input type="text" name="idioma" size="150"> <br> 
                <label for="name">Ano:</label>
                <input type="text" name="ano" size="155">  <br>
                <label for="name">Página:</label>
                <input type="text" name="pagina" size="150">  <br>
                <label for="name">Edição:</label>
                <input type="text" name="edicao" size="150"> <br>
                <label for="name">Assunto:</label>
                <input type="text" name="assunto" size="152"> <br>
                <label for="name">Sinopse:</label>
                <textarea class="borda" id="textarea" name="sinopse"></textarea> <br>
			
                <div class="botao">
                    <button onclick="location.href='acesso.php'" type="button">
                    Voltar</button>

                    &nbsp;&nbsp;&nbsp;

                    <button>Cadastrar</button>
                </div>                

            </form>
        </section>


        <?php




        //Verificar se clicou no botão
        if(isset($_POST['nome'])) 

            {
                $livro->nome = addslashes($_POST['nome']);
                $livro->autor = addslashes($_POST['autor']);
                $livro->editora = addslashes($_POST['editora']);
                $livro->categoria = addslashes($_POST['categoria']);
                $livro->idioma = addslashes($_POST['idioma']);           
                $livro->ano = addslashes($_POST['ano']);
                $livro->pagina = addslashes($_POST['pagina']);
                $livro->edicao = addslashes($_POST['edicao']);
                $livro->assunto = addslashes($_POST['assunto']);
                $livro->sinopse = addslashes($_POST['sinopse']);

                // Verificar se esta preenchido

                if(!empty($livro->nome) && !empty($livro->autor) && !empty($livro->editora) && !empty($livro->categoria) && !empty($livro->idioma) &&  !empty($livro->ano) &&  !empty($livro->pagina) && !empty($livro->edicao) && !empty($livro->assunto) && !empty($livro->sinopse))  
                
                {
                   $livro->conectar();
                    if($livro->msgErro == "")  // se esta tudo certo
                    {
                            $retorno = $livro->cadastrar();
                            
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
                    }
                }        
            }

        ?>

    </body>
</html>