<?php

require_once 'class/Usuario.php';
$u = new Usuario;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastre-se</title>
    <script src="https://kit.fontawesome.com/47a5f71d76.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>

    <div class="container">
        <div class="title">
            Cadastrar
        </div>
        <form method="POST">
            <div class="campos">
                <input type="text" placeholder="Nome" class="input" name="nome">
                <i class="fas fa-user"></i>
            </div>
            <div class="campos">
                <input type="text" placeholder="telefone" class="input" name="telefone">
                <i class="fas fa-phone-alt"></i>
            </div>
            <div class="campos">
                <input type="email" placeholder="Email" class="input" name="email">
                <i class="far fa-envelope"></i>
            </div>
            <div class="campos">
                <input type="password" placeholder="Senha" class="input" name="senha">
                <i class="fas fa-lock"></i>
            </div>
            <div class="campos">
                <input type="password" placeholder="Confirme a senha" class="input" name="confSenha">
                <i class="fas fa-lock"></i>
            </div>
            <div class="login">
                <a href="index.php"> Ja tem conta ? Acesse aqui</a>
            </div>
            <div class="btn">
            <input type="submit" value="Cadastrar">
            </div>

        </form>
    </div>
    <?php

    if (isset($_POST['nome']))
    {
        $nome = addslashes($_POST['nome']);
        $telefone = addslashes($_POST['telefone']);
        $email= addslashes($_POST['email']);
        $senha= addslashes($_POST['senha']);
        $confirmarSenha= addslashes($_POST['confSenha']);

        if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarSenha))
        {
            $u->conectar("projeto_login","localhost","root","");
            if($u->msgErro == "")
            {
                if($senha == $confirmarSenha)
                {
                    if( $u->cadastrar($nome,$telefone,$email,$senha))
                    {
                        ?>
                        <div id="msg-sucesso">
                            Usuário cadastrado com sucesso 
                        </div>                 
                        <?php
                    }
                    else
                    {
                        ?>
                        <div class="msg-erro">
                            E-mail ja cadastrado
                        </div>                 
                        <?php
                    }
                }
                else
                 {
                    ?>
                    <div class="msg-erro">
                     	Senhas diferentes
                    </div>                 
                    <?php
                ;
                 }
             }
             else
            {

                ?>
                <div class="msg-erro">
                 <?php echo "Erro: ".$u->msgErro; ?>
                </div>                 
                <?php
            
            }
        }else
        {

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