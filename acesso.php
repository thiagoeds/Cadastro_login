<?php

session_start(); // Inicialização da sessão
if (!isset($_SESSION['id_usuario'])) {
    header("location: index.php");
    exit;
}
// $_SESSION['nome'] = $_POST['nome']; // Armazenandona sessão

require_once 'classes/livros.php';
$livro = new Livro;

require_once 'classes/usuarios.php';
$usuario = new Usuario;

// $id_usuario = $_POST["id_usuario"];

$resultado = $usuario->usuarioLogado($id_usuario);

// var_dump($resultado);

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

                $usuarios = $usuario->usuarioLogado();
               
                foreach ($usuarios as $key => $itemUsuario)
                // var_dump($itemUsuario); 
                {       

                ?>
                    <span><?= $itemUsuario["nome"] ?></span>            
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

    <section class="livro-item">
        <?php


        $livros = $livro->busca_livros();
        foreach ($livros as $key => $item) {
       

        ?>
        <div class="livro">
            <div class="imagem">
                <a href="detalhe_livro.php?id_livro=<?php print_r($item['id_livro']) ?>">
                    <img src="./imagens/Quimica Geral.jpg" alt="Quimica Geral">
                </a>
            </div>
            <div class="info">
                <div class="nome">
                    <strong><?= $item["nome"] ?></strong>                    
                </div>
                <div class="bloco1"> 
                        
                    <div class="subbloco1">
                      
                        <strong>Autor:</strong>
                        <?php print_r($item["autor"]) ?>
                        <br>
                        <strong>Assunto</strong>
                        <?php print_r($item["assunto"]) ?>
                        <br>                        
                        
                    </div>

                    <!-- <div class="subbloco2"> -->

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
                        
                    <!-- </div> -->
                </div>
            </div>

            <div class="rodapeImagem">
                <a href="detalhe_livro.php?id_livro=<?= $item['id_livro'] ?>">
                    <button>Detalhes</button>
                </a>
                 
                <button>Disponivel</button>
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