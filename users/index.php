<?php
    require "../conexao.php";

    $filtro = $_GET['filtro'] ?? 'titulo';
    $pesquisa = anti_injection($conexao, $_GET['busca'] ?? "");
    $sql = "select * from livros where $filtro like '%$pesquisa%'";
    $dados = mysqli_query($conexao, $sql);
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
        <form action="<?=$_SERVER['PHP_SELF']?>" method="get">
            <section>
                <label for="filtro">Pesquisar por</label>
                <select name="filtro" id="filtro">
                    <option value="titulo">Titulo do livro</option>
                    <option value="autor">Autor do livro</option>
                    <option value="genero">Gênero do livro</option>
                    <option value="editora">Editora do livro</option>
                </select>
            </section>
            <input type="search" name="busca" id="busca" value="<?=$pesquisa?>">
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