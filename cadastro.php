<?php
    require_once 'classes/usuarios.php';
    $usuario = new Usuario; //atribuição a classe 
    // print_r($_POST);
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
        <form method="post" action="cadastro.php">
            <h1>Area do Aluno</h1><br>
            <h3>Cadastro</h3><br>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" size="15" placeholder="Nome" require maxlength="10">
            <label for="nome">Sobrenome:</label>
            <input type="text" name="sobrenome" size="20" placeholder="Sobrenome" require maxlength="30">
            <label for="cpf">CPF:</label>
            <input type="text" name="cpf" placeholder="123.456.789-10" require maxlength="14"><br><br>
            <label for="email">e-mail:</label>
            <input type="email" name="email" size="40" placeholder="e-mail valido" require  maxlength="100">
            <label for="rg">RG:</label>
            <input type="text" name="rg" size="20" placeholder="12.345.678" maxlength="15"><br><br>
                <label>Sexo:</label>
                <select name="sexo" >
                    <option value="0">como se identifica</option>             
                    <option value="Masculino">Masculino</option>
                    <option value="Feminino">Feminino</option>
                    <option value="Outros">Outros</option>
                </select>
            <br><br>
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
                    <option value="Goiás">Goiás</option>
                    <option value="Mato Grosso">Mato Grosso</option>
                    <option value="Mato Grosso do Sul">Mato Grosso do Sul</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                </optgroup>
                <optgroup label="Nordeste">
                    <option value="Alagoas">Alagoas</option>
                    <option value="Bahia">Bahia</option>
                    <option value="Ceará">Ceará</option>
                    <option value="Maranhão">Maranhão</option>
                    <option value="Paraíba">Paraíba</option>
                    <option value="Pernambuco">Pernambuco</option>
                    <option value="Piauí">Piauí</option>
                    <option value="Rio Grande do Norte">Rio Grande do Norte</option>
                    <option value="Sergipe">Sergipe</option>
                </optgroup>
                <optgroup label="Norte">
                    <option value="Acre">Acre</option>
                    <option value="Amazonas">Amazonas</option>
                    <option value="Amapá">Amapá</option>
                    <option value="Para">Para</option>
                    <option value="Rondônia">Rondônia</option>
                    <option value="Roraima">Roraima</option>
                    <option value="Tocantins">Tocantins</option>
                </optgroup>
                <optgroup label="Sul">
                    <option value="Parana">Parana</option>
                    <option value="Santa Catarina">Santa Catarina</option>
                    <option value="Rio Grande do Sul">Rio Grande do Sul</option>
                </optgroup>
                <optgroup label="Sudeste">
                    <option value="São Paulo">São Paulo</option>
                    <option value="Rio de Janeiro">Rio de Janeiro</option>
                    <option value="Espirito Santo">Espirito Santo</option>
                    <option value="Minas Gerais">Minas Gerais</option>
                </optgroup>
            </select>
            <label for="cidade">Cidade:</label>
            <input type="text" name="cidade" placeholder="Cidade" maxlength="100"><br><br>
            <label for="cep">CEP:</label>
            <input type="text" name="cep" placeholder="35300-000" maxlength="10">
            <label for="bairro">Bairro</label>
            <input type="text" name="bairro" placeholder="Bairro" maxlength="100"><br><br>
            <label for="rua">Rua:</label>
            <input type="text" name="rua" size="30" placeholder="Logradouro" maxlength="250">
            <label for="nu">Número</label>
            <input type="text" name="numero" size="5" placeholder="Número"  maxlength="10"><br><br>
            <label for="comp">Complemento:</label>
            <input type="text" name="complemento" size="30" placeholder="Andar, Apartamento, Bloco" maxlength="100"><br><br>
            <div class="rodape">
            <button onclick="location.href='index.php'" type="button">
            Voltar</button>
                &nbsp;&nbsp;&nbsp;
                <button type="submit">Cadastrar</button>                 
                
            </div>  <br>                  

        </form>

    </div>

    <?php

        //Verificar se clicou no botão
        if(isset($_POST['nome']))
        {
            
            $usuario->nome = addslashes($_POST['nome']);
            $usuario->sobrenome = addslashes($_POST['sobrenome']);
            $usuario->cpf = addslashes($_POST['cpf']);
            $usuario->email = addslashes($_POST['email']);
            $usuario->rg = addslashes($_POST['rg']);
            $usuario->sexo = addslashes($_POST['sexo']);           
            $usuario->data_nascimento = addslashes($_POST['data_nascimento']);
            $usuario->senha = addslashes($_POST['senha']);
            $usuario->conf_senha = addslashes($_POST['conf_senha']);
            $usuario->estado = addslashes($_POST['estado']);
            $usuario->cidade = addslashes($_POST['cidade']);
            $usuario->cep = addslashes($_POST['cep']);
            $usuario->bairro = addslashes($_POST['bairro']);
            $usuario->numero = addslashes($_POST['numero']);
            $usuario->rua = addslashes($_POST['rua']);
            $usuario->complemento = addslashes($_POST['complemento']);


            // Verificar se esta preenchido


            //if(!empty($usuario->nome) && !empty($usuario->sobrenome) && !empty($usuario->cpf) && !empty($usuario->email) && !empty($usuario->rg) && !empty($usuario->sexo) && !empty($usuario->data_nascimento) && !empty($usuario->senha) && !empty($usuario->conf_senha) && !empty($usuario->estado) && !empty($usuario->cidade) && !empty($usuario->cep) && !empty($usuario->bairro) && !empty($usuario->rua) && !empty($usuario->numero) && !empty($usuario->complemento))
            if(1)
            {
                
                $usuario->conectar();
                if($usuario->msgErro == "")  // se esta tudo certo
                {
                    if($usuario->senha == $usuario->conf_senha) 
                    {
                        $retorno = $usuario->cadastrar();
                        
                        if($retorno)
                        {
                            ?>
                                <div id="msg-sucesso">
                                    Cadastrado com sucesso; Acesse para entrar!
                                </div>
                            <?php 
                        } else {
                            ?>
                                <div class="msg-erro">
                                    Email ja cadastrado!
                                </div>
                            <?php 
                        }                       
                    } else {
                        ?>
                            <div class="msg-erro">
                                Senha e confirmar senha não correspondem!
                            </div>
                        <?php 
                    }
                } else {
                    ?>
                        <div class="msg-erro">
                            <?php  echo "Erro: ".$usuario->msgErro; ?>
                        </div>
                    <?php 
                
                }                
            } else {
                ?>
                    <div class="msg-erro">
                        Preencha todo os campos!
                    </div>
                <?php 
            }

        }

    ?>

</body>

</html>