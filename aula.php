<?php
// Classe para conexão 
$pdo = new PDO('mysql:dbname=teste;host=localhost', 'root' ,'');

// Pegar a lista de usuarios 
// variavel sql  + a conexão + a query =  consulta 
$sql = $pdo->query('SELECT * FROM usuarios');


//  echo em contagem de linhas 
echo 'TOTAL:'.$sql->rowCount();

// pegar todos os dados de sql + associação para não repetir os dados 
$dados = $sql -> fetchAll(PDO::FETCH_ASSOC);

// visualiza os dados um abaixo do outro 
echo '<pre>';
// printa na tela os dados de  $dados 
print_r($dados);