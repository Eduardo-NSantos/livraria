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
                <input type="email" name="email" id="email">
            </section>
            <section>
                <label for="senha">Senha: </label>
                <input type="password" name="senha" id="senha">
            </section>
            <section>
                <input type="submit" name="submit" value="login">
            </section>
        </form>
        <?php
            require "conexao.php";
            if(isset($_POST['submit'])){
                $email = $_POST['email'];
                $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
            } 
        ?>
    </main>
</body>
</html>