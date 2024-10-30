<?php
    require "../conexao.php";
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
    <main>
        <nav>
            <a href="#">pesquisar por autor</a><br>
            <a href="#">Pesquisar por gênero</a><br>
            <a href="#">Pesquisar por editora</a><br>
        </nav>

        <form action="<?=$_SERVER['PHP_SELF']?>" method="get">
            <input type="search" name="busca" id="busca" placeholder="Titulo do livro">
            <input type="submit" value="pesquisar">
        </form>
        <table>
            <tr>
                <th>Título</th>
                <th>Autor</th>
                <th>Gênero</th>
                <th>Editora</th>
            </tr>
        
            <?php
                $pesquisa = anti_injection($conexao, $_GET['busca'] ?? "");
                $sql = "select * from livros where titulo like '%$pesquisa%'";
                $dados = mysqli_query($conexao, $sql);
        
                if(mysqli_num_rows($dados) >= 1){
                    while($itens = mysqli_fetch_assoc($dados)){
                        $titulo = $itens['titulo'];
                        $autor = $itens['autor'];
                        $genero = $itens['genero'];
                        $editora = $itens['editora'];
                        echo "<tr>";
                            echo "<th>$titulo</th>";
                            echo "<td>$autor</td>";
                            echo "<td>$genero</td>";
                            echo "<td>$editora</td>";
                        echo "</tr>";
                    }
                }else{
                    echo "<tr>";
                        echo "<th colspan='4'>Nenhum livro com esse título foi encontrado na base de dados, verifique a escrita e tente novamente</th>";
                    echo "</tr>";
                }
            ?>
        </table>
    </main>
</body>
</html>