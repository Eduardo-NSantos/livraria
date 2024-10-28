<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <main>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <section>
                <label for="email">Email: </label>
                <input type="email" name="email" id="email" required>
            </section>
            <section>
                <label for="senha">Senha: </label>
                <input type="password" name="senha" id="senha" required>
            </section>
            <section>
                <input type="submit" name="submit" value="login">
            </section>
        </form>
        <?php
            require "conexao.php";
            if(isset($_POST['submit'])){
                $email = anti_injection($conexao, $_POST['email']);
                $senha = anti_injection($conexao, $_POST['senha']);

                $sql = "select email, senha from users where email = '$email'";

                if($result = mysqli_query($conexao, $sql)){
                    $quantidade_registros = mysqli_num_rows($result);
                    $dados = mysqli_fetch_assoc($result);
                    $user_senha = $dados['senha'];

                    if($quantidade_registros == 1 && password_verify($senha, $user_senha)){
                        echo "ok";
                    }else{
                        echo "Email ou senha inválidos";
                    }
                }else{
                    echo "login ou senha não encontrados ou inválidos";
                }
            } 
        ?>
    </main>
</body>
</html>