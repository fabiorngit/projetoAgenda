<?php
// puxa os dados do $pdo
require 'config.php';

// Obter e filtrar os dados enviado por POST com o inpur name =name 
$name = filter_input(INPUT_POST,'name');
$email= filter_input(INPUT_POST,'email', FILTER_VALIDATE_EMAIL); //valida se o email é valido
$telefone =filter_input(INPUT_POST,'telefone');
$celular =filter_input(INPUT_POST,'celular');



if ($name && $email && ($telefone || $celular)){

// verifica se os dados  ja existe na tabela usuarios do banco
$sql = $pdo -> prepare("SELECT * FROM usuarios WHERE email = :email OR telefone = :telefone OR celular = :celular");
$sql->bindValue(':email',$email);
$sql->bindValue(':telefone', $telefone);
$sql->bindValue(':celular', $celular);
$sql->execute();


if($sql ->rowCount() === 0) {   //se o retorno da consulta for 0

// Metodo de Montagem -> MODO PROTEGIDO e MONTAGEM DO TEMPLATE --segurança
$sql =$pdo-> prepare ("INSERT INTO  usuarios (nome, email, telefone, celular) VALUES (:name, :email, :telefone, :celular)");

// Metodo de sql bindValue associa ao valor passado exemp 'string   -montando a query
$sql->bindValue(':name', $name);
$sql->bindValue(':email',$email);
$sql->bindValue(':telefone',$telefone);
$sql->bindValue(':celular',$celular);
//envia toda a query
$sql->execute();

// voltar para pagina Principal
header("Location:index.php");
    
}else{
    echo 
    "<script>alert('Preencher todos os campos Corretamente!'); window.location.href='adicionar.php';</script>";
    exit;
}

}else{
    echo 
    "<script>alert('Preencher todos os campos Corretamente!'); window.location.href='adicionar.php';</script>";
    exit;

}






?>