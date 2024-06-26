<!-- Excluir -->
<?php
require 'config.php';


$id = filter_input(INPUT_GET, 'id');
// verifica se o id é igual
if ($id) {
$sql=$pdo->prepare("DELETE FROM usuarios WHERE id= :id" );
$sql->bindValue(':id',$id);
$sql->execute();
}


header("Location:index.php");
exit;

?>