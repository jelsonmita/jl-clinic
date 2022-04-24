<?php
    require_once 'classes/users.php';
    $u = new User

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/login.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <title>Cadastro</title>
</head>
<body id="body">
    <header id="header">
 
      </header>
    <div class="main-container">
        <h1 id="title">Criar conta</h1>
        <form method="post" id="register-form">
            <div class="txt-field">
                <input type="text" required name="name" autofocus>
                <label>Nome</label>
            </div>

            <div class="txt-field">
                <input type="text" required name="sobrenome" autofocus>
                <label>Sobrenome</label>
            </div>

            <div class="txt-field">
                <input type="email" required name="email">
                <label>Email</label>
            </div>
            
            <div class="txt-field">
                <input type="date" id="data_nascimento" required name="data_nascimento">
                <label hidden>Data de nascimento</label>
            </div>

            <div class="txt-field">
                <input type="password" required name="password">
                <label>Password</label>
            </div>

            <div class="txt-field">
                <input type="password" required name="conf_password">
                <label for="conf_password">Confirmar Password</label>
            </div>

            <div class="txt-field">
                <input type="text" required name="morada">
                <label>Morada</label>
            </div>
        
            <div class="container1">
                <input type="checkbox" id="accept" required name="accept">
                <label for="accept" id="accept-label">Eu li e aceito os <a href="#">termos de uso</a></label>
            </div>

            <div class="container1">
                <input type="submit" disabled id="btn" value="Registar">
            </div>
            <div class="container1">
                Já tem conta? <a href="login.html">Iniciar sessão</a>
            </div>
        </form>
    </div>

    <a href="index.html">Voltar para página inical</a>

    
    <script src="assets/js/script.js"></script>
    <p class="error-validation template"></p>
    <script src="assets/js/main.js"></script>
    <script>
        $(document).ready(function() {
            $('.container1 input[type="checkbox"]').click(function(){
                if($(this).prop('checked')) {
                    $('.container1 input[type="submit"]').prop('disabled', false);
                }
                else{
                    $('.container1 input[type="submit"]').prop('disabled', true);
                }
            });
            
/*            $('.container1 label#accept-label').click(function() {
                $('container1 input[type="checkbox"]').prop('checked', true);
            }); */
        });
    </script>

    <?php
    if(isset($_POST['name']))
    {
        $name = addslashes$_POST['name'];
        $sobrenome = addslashes$_POST['sobrenome'];
        $email = addslashes$_POST['email'];
        $password = addslashes$_POST['password'];
        $data_nascimento = addslashes$_POST['data_nascimento'];
        $conf_password = addslashes$_POST['conf_password'];
        $morada = addslashes$_POST['morada'];

        //Verificar campos vazios
        if(!empty($name) && !empty($sobrenome) && !empty($email) && !empty($password) && !empty($data_nascimento) && !empty($bil$conf_passwordhete) && !empty($morada))
        {
            $u->conectar("Login_project","localhost","root","");
            if($u->msErro == "")
            {
                if($password == $conf_password)
                {
                    if($u->cadastrar($name, $sobrenome, $email, $password, $data_nascimento, $$conf_password, $morada))
                    {
                        ?>
                        <div id="msg-sucesso">
                            Cadastrado com sucesso!
                        </div>
                        <?php
                    }
                    else{
                        ?>
                        <div class="msg-erro">
                            Email já cadastrado
                        </div>
                        <?php
                    }
                }
                else{
                    ?>
                    <div class="msg-erro">
                        Password e Confirmar Password não correspondem!
                    </div>
                    <?php
                }

            }else{
                ?>
                <div class="msg-erro">
                    <?php echo "Erro: ".$u->msgErro;?>
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