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
    <title>Parallax | Vanilla Javascript </title>
</head>
<body>

    <header id="header">
        <a href="#" class="logo">Parallax</a>
        <ul>
            <li><a href="#" class="active">Home</a></li>
            <li><a href="#">Sobre</a></li>
            <li><a href="#">Descrição</a></li>
            <li><a href="#">Contato</a></li>
        </ul>
    </header>

    <section>
        <h2 id="texto"><span>Site de rolagem Parallax</span><br>Vanilla Javascript</h2>
        <img src="./imagens/bird1.png" alt="bird1" id="bird1">
        <img src="./imagens/bird2.png" alt="bird2" id="bird2">
        <img src="./imagens/forest.png" alt="floresta" id="floresta">
        <a href="#" id="btn">Explore</a>
        <img src="./imagens/rocks.png" alt="rochas" id="rochas">
        <img src="./imagens/water.png" alt="agua" id="agua">
    </section>

    <div class="parallax">
        
        <h2>
            Conheça essa tendência em web design
        </h2>
        <br>
        <p>
            Entre as tendências de webdesign que vêm se fortalecendo nos últimos tempos, está o parallax. Você, provavelmente, já navegou em um site que utilizava esse recurso e talvez até o tenha achado interessante. Mas, o que é parallax?
        </p>
        <br>
        <p>
            O parallax é uma técnica que cria a impressão de um ambiente 3D em uma tela 2D, utilizando movimento de tela. Funciona assim: as imagens são inseridas em camadas, os planos de fundo, e a medida que você navega pelo site, as imagens se movimentam mais lentamente do que a sua navegação.
        </p>
        <br>
        <p>
            Além de bonito e atrativo visualmente, o parallax pode ser, também, bastante funcional. Você pode usar as camadas de plano de fundo, o movimento e a impressão de 3D para dar informações e contribuir com a experiência do consumidor.
        </p>
    </div>

    <script>
        let texto = document.getElementById('texto');
        let bird1 = document.getElementById('bird1');
        let bird2 = document.getElementById('bird2');
        let floresta = document.getElementById('floresta');
        let btn = document.getElementById('btn');
        let rochas = document.getElementById('rochas');
        let agua = document.getElementById('agua');
        let header = document.getElementById('header');

        window.addEventListener('scroll', function() {
            let value = window.scrollY;

            texto.style.top = 50 + value * -0.5 + '%';
            bird1.style.top = value * -1.5 + 'px';
            bird1.style.left = value * 2 + 'px';
            bird2.style.top = value * -1.5 + 'px';
            bird2.style.right = value * 2 + 'px';
            btn.style.marginTop = value * 1.5 + 'px';
            rochas.style.top = value * -0.12 + 'px';
            floresta.style.top = value * 0.25 + 'px';
            header.style.top = value * -0.5 + 'px';
        })
    </script>

        
    
</body>
</html>