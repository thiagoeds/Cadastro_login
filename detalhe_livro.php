<?php

    // session_start();
    //     if (!isset($_SESSION['id_usuario'])) {
    //         header("location: index.php");
    //         exit;
    //     }

    require_once 'classes/livros.php';
    $livro = new Livro;

    $id_livro = $_GET["id_livro"];

    $resultado = $livro->busca_livro_porId($id_livro);
    

    //var_dump($resultado);

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

        <?php

            require_once 'cabecalho.php';

        ?>

    <section class="livro-item">
        <?php

            //foreach ($livro as $key => $resultado)
            //var_dump($resultado);
            //foreach ($livros as $key => $item)
        
        {       

        ?>
        <div class="livro">
            <div class="imagem">
                <a href="">
                    <img src="./imagens/Quimica Geral.jpg" alt="Quimica Geral">
                </a>
            </div>
            <div class="info">
                <p class="nome">
                    <strong>Nome:</strong>
                    <?= $resultado["nome"] ?>
                </p>
                <p class="bloco1">
                    <strong>Autor:</strong>
                    <?= $resultado["autor"] ?>
                    <br>
                    <strong>Assunto</strong>
                    <?= $resultado["assunto"] ?>
                    <br>
                    <strong>Editora:</strong>
                    <?= $resultado["editora"] ?>
                    <br>                    
                </p>

                <p class="bloco2">
                    <strong>Edicao:</strong>
                    <?= $resultado["edicao"] ?>
                    <br>
                    <strong>Ano:</strong>
                    <?= $resultado["ano"] ?>
                    <br>
                    <strong>Idioma:</strong>
                    <?= $resultado["idioma"] ?>
                </p>
            </div>
        </div>

        <?php  
       
        }
        ?>

    </section>



    <footer>

    </footer>

</body>

</html>


