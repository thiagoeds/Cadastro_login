<?php

	require_once 'classes/usuarios.php';
	$usuario = new Usuario;
	//echo $_GET['id'];

?>

<!DOCTYPE html>
<html lang="pt-br">

	<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css">
	<title>login</title>
	</head>

	<body>		
		
		<div>
			<form class="box" action="index.php" method="post">
				<h1>Login</h1>
				<input type="email" required name="email" placeholder="E-mail">
				<input type="password" required name="senha" placeholder="Senha">

				<button>Login</button>
				
				<br/>
				<p>Ainda não é inscrito? 
					<a id="cadastrar" href="cadastro.php">cadastre-se aqui!</a>
				</p>
			</form>
		</div>

		<?php

			if(isset($_POST['email']) && isset($_POST['senha']))
			{				
				$email = addslashes($_POST['email']);
				$senha = addslashes($_POST['senha']);
            
				if(!empty($email) && !empty($senha))
				{
					$usuario->conectar();

					if($usuario->msgErro == "") 
					{
						if($usuario->logar($email, $senha))
						{

							header("Location: ./acesso.php");

						} else {

							?>
								<div class="msg-erro">
									Email e/ou Senha esta incorreto!
								</div>
							<?php

						}
					} else {

						?>
						<div class="msg-erro">
							echo "Erro: ".$usuario->msgErro;
						</div>
					<?php 

						

					}
					

				} else {

					?>
						<div class="msg-erro">
							Preencha todos os campos!
						</div>
					<?php 

				}


			}	
		?>

	</body>

</html>