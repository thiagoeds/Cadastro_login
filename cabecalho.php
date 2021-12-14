<?php

    // session_start();
    //     if (!isset($_SESSION['id_usuario'])) {
    //         header("location: index.php");
    //         exit;
    //     }

    // require_once 'classes/livros.php';
    // $livro = new Livro;

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
                <li><a href="acesso.php">Nosso Acervo</a></li>
                <li><a href="#" class="active">Descrição</a></li>
                <li><a href="#">Contato</a></li>
            </ul>

            <div>
        
                <?php

                    foreach ($resultado as $key => $itemUsuario)

                    {       

                    ?>
                    <label for=""><?= $itemUsuario["nome"] ?></label>                
                    <?php  
            
                    }
                ?>

                <a href="index.php">Sair</a>

            </div>
        </header>

    </body>
</html>