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
    
    // require_once 'classes/usuarios.php';
    // $usuario = new Usuario;

    // $id_usuario = $_POST["id_usuario"];

    // $resultado = $usuario->usuarioLogado($id_usuario);

    //var_dump($resultado);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style4.css">
    <title>Biblioteca Virtual</title>
</head>

<body>

        <?php

            require_once 'cabecalho.php';            

        ?>

    <section class="livro-item">
        <?php

            foreach ($resultado as $key => $item)
        
        {       

            ?>
            <div id="boxLivro">
                <div id="livro">
                    <div id="imagem">
                        <a href="">
                            <img src="./imagens/Quimica Geral.jpg" alt="Quimica Geral">
                        </a>
                    </div>
                    <div id="info">
    
                        <div class="bloco1"> 
    
                            <p class="nome">
                                <strong><?= $item["nome"] ?></strong>
                                
                            </p>
                        
                            <strong>Autor:</strong>
                            <?= $item["autor"] ?>
                            <br>
                            <strong>Editora:</strong>
                            <?= $item["editora"] ?>
                            <br>
                            <strong>Categoria:</strong>
                            <?= $item["categoria"] ?>
                            <br>
                            <strong>Idioma:</strong>
                            <?= $item["idioma"] ?>
                            <br> 
                            <strong>Ano:</strong>
                            <?= $item["ano"] ?>
                            <br>
                            <strong>Edicao:</strong>
                            <?= $item["edicao"] ?>
                            <br>
                            <strong>Paginas:</strong>
                            <?= $item["pagina"] ?>
                            <br>
                            <strong>Assunto</strong>
                            <?= $item["assunto"] ?>                                                
                            <br>
                            <strong>Sinopse:</strong>
                            <?= $item["sinopse"] ?>
                        </div>
    
                    </div>
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


