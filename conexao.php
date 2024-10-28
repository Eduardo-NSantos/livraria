<?php
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "livraria";

    $conexao = mysqli_connect($server, $user, $pass, $db);

    function anti_injection($conexao, $texto){
        $texto = mysqli_real_escape_string($conexao, $texto);
        $texto = htmlspecialchars($texto);

        return $texto;
    }
?>