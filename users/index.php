<?php 
    require "sessao.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livraria</title>
    <style>
        table{
            border-collapse: collapse;
        }
        th, td{
            border: 1px solid black;
            padding: 5px;
        }
    </style>
</head>
<body>
    <h1>Livraria Online</h1>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="get">
        <input type="search" name="busca" id="busca">
        <input type="submit" value="pesquisar">
    </form>

    <table>
        <tr>
            <th>Título</th>
            <th>Autor</th>
            <th>Gênero</th>
            <th>Editora</th>
        </tr>
        <tr>
            <th>O pequeno príncipe</th>
            <td>Antoine de Saint-Exupéry</td>
            <td>Fábula</td>
            <td>HarperCollins Brasil</td>
        </tr>
    </table>
</body>
</html>