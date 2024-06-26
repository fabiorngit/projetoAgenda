<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto CRUD</title>
    <link rel="stylesheet" href="./style.css" media="screen">
</head>

<body>
    <!-- -----------------------PHP------------------------------------ -->
    <?php
    // puxa os dados do $pdo
    require 'config.php';
    $lista = [];   //variavel com as consultas 

    // pega os dados da tabela usuarios
    $sql = $pdo->query("SELECT * FROM usuarios");

    // se tiver algum registro no banco ...
    if ($sql->rowCount() > 0) {
        // pega os dados filtrados e jogo no array lista 
        $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    ?>

    <!-- ------------------------HTML----------------------------------- -->

<div class="title">

AGENDA TELEFONICA
</div>



    <a class="btn" href="adicionar.php">ADICIONAR CONTATO</a>

    <table class="tableCSS"  border="0" width='100%'>
        <tr>
            <th>ID</th>
            <th>NOME</th>
            <th>EMAIL</th>
            <th>TELEFONE</th>
            <th>CELULAR</th>
            <th>AÇÔES</th>
        </tr>


        <!-- //percorre a lista com o nome de ususario cada item -->
        <?php foreach ($lista as $usuario) : ?>
            <tr>
                <td><?php echo $usuario['id']; ?></td>
                <td><?php echo $usuario['nome']; ?></td>
                <td><?php echo $usuario['email']; ?></td>
                <td><?php echo $usuario['telefone']; ?></td>
                <td><?php echo $usuario['celular']; ?></td>
                <td>
                    <a style="  background-color: black; color:orange; font-size:20px; text-decoration:none;" href="editar.php?id=<?= $usuario['id']; ?>">[ editar ]</a>
                    <a style="background-color: black; color:red; font-size: 20px; text-decoration: none;" href="excluir.php?id=<?= $usuario['id']; ?>" onclick="return confirm('Tem certeza que Deseja excluir ?')">[ excluir ]</a>


                </td>





            </tr>
        <?php endforeach; ?>
    </table>


</body>

</html>