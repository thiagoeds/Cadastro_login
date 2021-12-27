<?php

session_start();
if(!isset($_SESSION['id_usuario']))
{
    header("location: index.php");
    exit;
}

require_once 'classes/livros.php';
$livro = new Livro;

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

        <div class="usuarioLogado">
        
            <?php
                // if (!$_SESSION["loggedin"]) {
                //     include_once "index.php";
                // } else {
                //     include_once "acesso.php";
                // }
                // $usuarios = $usuario->usuarioLogado();
               
                // foreach ($usuarios as $key => $itemUsuario)
                // var_dump($itemUsuario); 
                {       

                ?>
                    <span></span>            
                <?php  

                }
            ?>

            <a href="index.php">Sair</a>

        </div>
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

    <section class="livro-itemAc">
        <?php


        $livros = $livro->busca_livros();
        foreach ($livros as $key => $item) {
       

        ?>
        <div class="livroAc">
            <div class="imagemAc">
                <a href="detalhe_livro.php?id_livro=<?php print_r($item['id_livro']) ?>">
                    <img src="<?= $item["capa"] ?>">
                </a>
            </div>
            <div class="infoAc">
                <div class="nomeAc">
                    <strong><?= $item["nome"] ?></strong>                    
                </div>
                <div class="bloco1Ac"> 
                        
                    <div class="subbloco1Ac">
                      
                        <strong>Autor:</strong>
                        <?php print_r($item["autor"]) ?>
                        <br>
                        <strong>Assunto</strong>
                        <?php print_r($item["assunto"]) ?>
                        <br>                        
                        
                    </div>

                    <div class="subbloco2Ac">

                        <strong>Editora:</strong>
                        <?php print_r($item["editora"]) ?>
                        <br>
                        <strong>Edicao:</strong>
                        <?php print_r($item["edicao"]) ?>
                        <br>
                        <strong>Ano:</strong>
                        <?php print_r($item["ano"]) ?>
                        <br>
                        <strong>Idioma:</strong>
                        <?php print_r($item["idioma"]) ?>   
                        
                    </div>
                </div>
            </div>

            <div class="rodapeImagemAc">
                <div>
                    <a href="detalhe_livro.php?id_livro=<?= $item['id_livro'] ?>">
                        <button class="btn-detalhesAc">Detalhes</button>
                    </a>
                </div>

                <div>
                    <button class="btn-disponibilidadeAc">Disponivel</button>
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