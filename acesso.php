<?php

    session_start();
    if(!isset($_SESSION['id_usuario']))
    {
        header("location: index.php");
        exit;
    }

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
            <li><a href="newLivro.php">Home</a></li>
            <li><a href="#">Sobre</a></li>
            <li><a href="#" class="active">Nosso Acervo</a></li>
            <li><a href="#">Descrição</a></li>
            <li><a href="#">Contato</a></li>
        </ul>
    </header>

  <!--   <section class="filtro">

        <div>
            <ul>
                <li>qualquer coisa</li>
                <li>qualquer coisa</li>
                <li>qualquer coisa</li>
                <li>qualquer coisa</li>
                <li>qualquer coisa</li>
                <li>qualquer coisa</li>
                <li>qualquer coisa</li>
                <li>qualquer coisa</li>
                <li>qualquer coisa</li>
                <li>qualquer coisa</li>
                <li>qualquer coisa</li>
                <li>qualquer coisa</li>
            </ul>
        </div>

    </section> -->

    <section class="livro-item"> 
        
        <div class="livro">
            <div class="imagem">
                <a href="">
                    <img src="./imagens/Quimica Geral.jpg" alt="Quimica Geral">
                </a>
            </div>
            <div class="info">
                <p class="nome">
                    <strong>Química Geral</strong>                    
                </p>
                <p class="bloco1">
                    <strong>Autor:</strong>
                    Maia, Daltamir Justino; Bianchi, J. C.
                    <br>
                    <strong>Editora:</strong>
                    Editora Pearson
                    <br>
                    <strong>Idioma:</strong>
                    Português
                </p>

                <p class="bloco2">
                    <strong>Edicao:</strong>
                    1ª
                    <br>
                    <strong>Ano:</strong>
                    --
                    <br>
                    <strong>Sinopse</strong>
                    --
                    <br>
                </p>
            </div>
        </div>
        
    </section> 



    <footer>

    </footer>
    
</body>
</html>