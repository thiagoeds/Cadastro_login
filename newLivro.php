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
           
            <div class="box-form">
                <form class="form-livro" action="newLivro.php" method="post">
                    
                    <div class="form">
                        <div class="formLabel" >
                            <label for="name" >Nome:</label> <br>
                            <label for="name" >Autor:</label>  <br>
                            <label for="name" >Editora:</label>  <br>
                            <label for="name" >Categoria:</label>  <br>
                            <label for="name" >Idioma:</label>  <br>
                            <label for="name" >Ano:</label>  <br>
                            <label for="name" >Página:</label>  <br>
                            <label for="name" >Edição:</label>  <br>
                            <label for="name" >Assunto:</label>  <br>
                            <label for="name" >Link da capa livro:</label>                 
                        </div>

                        <div class="formInput">
                            <input type="text" name="nome" maxlength="80">  <br>
                            <input type="text" name="autor" maxlength="30">  <br>
                            <input type="text" name="editora" maxlength="30"> <br>
                            <input type="text" name="categoria" maxlength="50">  <br>
                            <input type="text" name="idioma" maxlength="50"> <br>   
                            <input type="text" name="ano">  <br>                    
                            <input type="text" name="pagina">  <br>                   
                            <input type="text" name="edicao"> <br>                    
                            <input type="text" name="assunto" maxlength="255"> <br>                    
                            <input type="text" name="capa" maxlength="255">    
                        </div>
                        
                    </div>

                    <div class="sinopse">                       
                            <label class="LabelSinopse" for="name">Sinopse:</label>
                            <textarea class="borda" id="textarea" type="text" name="sinopse"></textarea>
                    </div>
                
                    <div class="botao">
                        <button onclick="location.href='acesso.php'" type="button">
                        Voltar</button>

                        &nbsp;&nbsp;&nbsp;

                        <button class="btn_focus">Cadastrar</button>
                    </div>
            
                </form>
            </div>

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
                $livro->capa = addslashes($_POST['capa']);
                $livro->sinopse = addslashes($_POST['sinopse']);

                // Verificar se esta preenchido 

                if(!empty($livro->nome) && !empty($livro->autor) && !empty($livro->editora) && !empty($livro->categoria) && !empty($livro->idioma) &&  !empty($livro->ano) &&  !empty($livro->pagina) && !empty($livro->edicao) && !empty($livro->assunto) && !empty($livro->capa) && !empty($livro->sinopse))  
                
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