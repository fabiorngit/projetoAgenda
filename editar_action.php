<!-- editaractionPHP -->

<?php
// puxa os dados do $pdo
require 'config.php';

// Obter e filtrar os dados enviado por POST com o inpur name =name 
$id = filter_input(INPUT_POST, 'id');
$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL); //valida se o email é valido
$telefone = filter_input(INPUT_POST, 'telefone');
$celular = filter_input(INPUT_POST, 'celular');

if ($id && $name && $email && ($telefone || $celular)) {
    $sql = $pdo->prepare("UPDATE usuarios SET nome= :name, email= :email, telefone= :telefone, celular= :celular WHERE id= :id");
    $sql->bindValue(':id', $id);
    $sql->bindValue(':name', $name);
    $sql->bindValue(':email', $email);
    $sql->bindValue(':telefone', $telefone);
    $sql->bindValue(':celular', $celular);
    $sql->execute();

    header("Location:index.php");
    exit;

} else {
    echo ("Location:index.php");
    exit;
}








?>