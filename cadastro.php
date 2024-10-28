<?php
    require "conexao.php";
    
    if(isset($_POST['submit'])){
        $nome = anti_injection($conexao, $_POST['nome']);
        $senha = anti_injection($conexao, password_hash($_POST['senha'], PASSWORD_DEFAULT));
        $email = anti_injection($conexao, $_POST['email']);
        $nascimento = anti_injection($conexao, $_POST['nascimento']);
        $sexo = anti_injection($conexao, $_POST['sexo']);

        $sql = "insert into users values(default, '$nome', '$senha', '$email', '$nascimento', '$sexo', default)";

        mysqli_query($conexao, $sql);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <main>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <section>
                <label for="nome">Nome: </label>
                <input type="text" name="nome" id="nome" required maxlength="55">
            </section>
            <section>
                <label for="senha">Senha: </label>
                <input type="password" name="senha" id="senha">
            </section>
            <section>
                <label for="email">Email: </label>
                <input type="email" name="email" id="email" required maxlength="65">
            </section>
            <section>
                <label for="nascimento">Data de nascimento: </label>
                <input type="date" name="nascimento" id="nascimento" required>
            </section>
            <section>
                <label for="sexo">sexo: </label>
                <select name="sexo" id="sexo" required>
                    <option value="M">Masculino</option>
                    <option value="F">Feminino</option>
                </select>
            </section>
            <section>
                <input type="submit" name="submit" value="Cadastrar-se">
            </section>
        </form>
    </main>
</body>
</html>