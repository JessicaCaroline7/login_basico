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
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/47a5f71d76.js"></script>
</head>

<body>
    
        <div class="container">
            <div class="title">
                Login
            </div>
            <form method="POST">
                <div class="campos">
                    <input type="email" placeholder="Email" class="input" name="email">
                    <i class="far fa-envelope"></i>
                </div>
                <div class="campos">
                    <input type="password" placeholder="Password" class="input" name="senha">
                    <i class="fas fa-lock"></i>
                </div>
                <div class="cadastre">
                    <a href="Cadastrar.php"><strong>Cadastre-se</strong></a>
                </div>
                <div class="btn">
                <input type="submit" value="ACESSAR">
                </div>

            </form>
        </div>

    <?php
    
    if(isset($_POST['email']))
    {
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);

        if(!empty($email) && !empty($senha))
        {
            $u->conectar("projeto_login","localhost","root","");
            if($u->msgErro == "")
            {
                if($u->logar($email, $senha))
                {
                    header("location:AreaPrivada.php");
                }
                else
                {
                    ?>
                    <div class="msg-erro">
                        E-mail e/ou senha estão incorretos
                    </div>
                    <?php
                }
            }
            else
            {
                ?>
                <div class="msg-erro">
                     <?php echo "ERRO ".$u->msgErro; ?>
                </div>
                <?php
            }
        }
        else
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