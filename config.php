<?php
// Classe para conexão 
// $pdo = new PDO('mysql:dbname=teste;host=localhost', 'root' ,'');

$db_name ='teste';
$db_host='localhost';
$db_user='root';
$db_pass='';


$pdo = new PDO('mysql:dbname='.$db_name.';host='.$db_host,$db_user,$db_pass);
