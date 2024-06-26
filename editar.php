<!-- editar -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <link rel="stylesheet" href="./style.css" media="screen" >
    
</head>
<body>

<?php
require'config.php';

$info = [];

$id= filter_input(INPUT_GET,'id');
// verifica se o id é igual
if($id){
$sql= $pdo->prepare("SELECT * FROM usuarios WHERE id =:id");
$sql->bindValue(':id',$id);
$sql->execute();

if($sql->rowCount() > 0){
$info = $sql->fetch(PDO::FETCH_ASSOC);    //pega o primeiro item


}else{
    header("Location:index.php");
    exit;
}

}else{
    header("Location:index.php");
    exit;
}
?>



<h1>EDITAR CONTATO</h1>

<form class="form" method="POST"  action="editar_action.php">
<!-- Pegar o ID do IDEm com o input hidden -->
<input type="hidden" name="id" value="<?=$info['id'];?>">

<label >Nome:<br>
<input type="text" name="name" value="<?=$info['nome'];?>">
</label><br><br>

<label >Email:<br>
<input type="text" name="email" value="<?=$info['email'];?>">
</label><br><br>

<label >Telefone:<br>
<input type="text" name="telefone" value="<?=$info['telefone'];?>">
</label><br><br>

<label >Celular:<br>
<input type="text" name="celular" value="<?=$info['celular'];?>">
</label><br><br>

<input class="btnEnviar" type="submit" value="Salvar">






</form>
    
</body>
</html>