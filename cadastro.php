<?php
    require_once 'classes/usuarios.php';
    $u = new Usuario;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style2.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>Formulario Cadastro</title>
</head>
<body>

    <div class="form">
        <form method="post" action="index.php">
            <h1>Area do Aluno</h1><br>
            <h3>Cadastro</h3><br>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" size="40" placeholder="Nome Completo" require maxlength="50">
            <label for="cpf">CPF:</label>
            <input type="text" name="cpf" placeholder="123.456.789-10" require maxlength="14"><br><br>
            <label for="email">e-mail:</label>
            <input type="text" name="email" size="40" placeholder="e-mail valido" require  maxlength="100">
            <label for="rg">RG:</label>
            <input type="text" name="rg" size="40" placeholder="12.345.678" maxlength="15"><br><br>
                <div class="sexo">
                    <label for="sexo">Sexo:</label> &nbsp;
                    <label for="mas">Masculino</label>&nbsp;
                    <input type="radio" name="masculino" id="op1">&nbsp;
                    <label for="fem">Feminino</label>&nbsp;
                    <input type="radio" name="feminino" id="op1">&nbsp;
                    <label for="outro">Outros</label>&nbsp;
                    <input type="radio" name="outros" id="op1">
                </div>
            <br>
            <label for="data">Data de Nascimento:</label>
            <input type="date" name="data_nascimento" id="op1"> <br><br>
            <label for="password">Senha:</label>
            <input type="password" name="senha" placeholder="" maxlength="15">
            <label for="password">Confirmar Senha:</label>
            <input type="password" name="conf_senha" placeholder="" maxlength="15"> <br><br>
            <h3>Endereço</h3><br>
            <label for="uf">Estado:</label>
            <select name="estado" id="uf">
                <option value="0">Escolha sua Região</option>
                <optgroup label="Centro-Oeste">
                    <option value="1">Goiás</option>
                    <option value="2">Mato Grosso</option>
                    <option value="3">Mato Grosso do Sul</option>
                    <option value="4">Distrito Federal</option>
                </optgroup>
                <optgroup label="Nordeste">
                    <option value="5">Alagoas</option>
                    <option value="6">Bahia</option>
                    <option value="7">Ceará</option>
                    <option value="8">Maranhão</option>
                    <option value="9">Paraíba</option>
                    <option value="10">Pernambuco</option>
                    <option value="11">Piauí</option>
                    <option value="12">Rio Grande do Norte</option>
                    <option value="13">Sergipe</option>
                </optgroup>
                <optgroup label="Norte">
                    <option value="14">Acre</option>
                    <option value="15">Amazonas</option>
                    <option value="16">Amapá</option>
                    <option value="17">Para</option>
                    <option value="18">Rondônia</option>
                    <option value="19">Roraima</option>
                    <option value="20">Tocantins</option>
                </optgroup>
                <optgroup label="Sul">
                    <option value="21">Parana</option>
                    <option value="22">Santa Catarina</option>
                    <option value="23">Rio Grande do Sul</option>
                </optgroup>
                <optgroup label="Sudeste">
                    <option value="24">São Paulo</option>
                    <option value="25">Rio de Janeiro</option>
                    <option value="26">Espirito Santo</option>
                    <option value="27">Minas Gerais</option>
                </optgroup>
            </select>
            <label for="cidade">Cidade:</label>
            <input type="text" placeholder="Cidade" maxlength="100"><br><br>
            <label for="cep">CEP:</label>
            <input type="text" placeholder="35300-000" maxlength="10">
            <label for="bairro">Bairro</label>
            <input type="text" placeholder="Bairro" maxlength="100"><br><br>
            <label for="rua">Rua:</label>
            <input type="text" size="30" placeholder="Logradouro" maxlength="250">
            <label for="nu">Número</label>
            <input type="text" size="5" placeholder="Número"  maxlength="10"><br><br>
            <label for="comp">Complemento:</label>
            <input type="text" size="30" placeholder="Andar, Apartamento, Bloco" maxlength="100"><br><br>
            <div class="rodape">
                <a class="voltar" href="index.php">
                    <input type="submit" value="Voltar">
                </a>
                <a class="enviar" href="#">
                    <input type="button" value="Cadastrar">
                </a>
            </div>  <br>                  

        </form>

    </div>

    <?php

        //Verificar se clicou no botão
        if(isset($_POST['nome']))
        {
            $nome = addslashes($_POST['nome']);
            $cpf = addslashes($_POST['cpf']);
            $email = addslashes($_POST['email']);
            $rg = addslashes($_POST['rg']);
            $masculino = addslashes($_POST['masculino']);
            $feminino = addslashes($_POST['feminino']);
            $outros = addslashes($_POST['outros']);
            $data_nascimento = addslashes($_POST['data_nascimento']);
            $senha = addslashes($_POST['senha']);
            $conf_senha = addslashes($_POST['conf_senha']);
            $estado = addslashes($_POST['estado']);
            $cidade = addslashes($_POST['cidade']);
            $cep = addslashes($_POST['cep']);
            $bairro = addslashes($_POST['bairro']);
            $rua = addslashes($_POST['rua']);
            $complemento = addslashes($_POST['complemento']);
            // Verificar se esra preenchido

            if(!empty($nome) && !empty($cpf) && !empty($email) && !empty($rg) && !empty($masculino) && !empty($feminino) && !empty($outros) && !empty($data_nascimento) && !empty($senha) && !empty($conf_senha) && !empty($estado) && !empty($cidade) && !empty($cep) && !empty($bairro) && !empty($rua) && !empty($complemento))

            {
                $u->conectar("cadastramento_login","localhost","root","");
                if($u->msgErro == "")  // se esta tudo certo
                {
                    if($senha == $conf_senha) 
                    {
                        if($u->cadastrar($nome,$cpf,$email,$rg,$masculino,$feminino,$outros,$data_nascimento,$senha,$estado,$cidade,$cep,$bairro,$rua,$complemento))
                        {
                            echo"Cadastrado com sucesso; Acesse paraentrar!";
                        } else {
                            echo "Email ja cadastrado!";
                        }                       
                    } else {
                        echo "Senha e confirmar senha não correspondem!";
                    }
                } else {
                    echo "Erro: ".$u->msgErro;
                }                
            } else {
                echo "Preencha todo os campos!";
            }

        }

    ?>

</body>

</html>