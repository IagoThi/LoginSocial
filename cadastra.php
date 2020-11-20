<?php
require_once 'rb.php';


 R::setup( 'mysql:host=localhost;dbname=login','root', '' ); //for both mysql or mariaDB

$token =filter_input(INPUT_POST,'userID');
$nome=filter_input(INPUT_POST,'userName');
$email=filter_input(INPUT_POST,'userEmail',FILTER_SANITIZE_STRING);
$imagem=filter_input(INPUT_POST,'userImg');

$cadastro = R::dispense('pessoa');

$cadastro->teste=$token;
$cadastro->nome=$nome;
$cadastro->email=$email;


echo "<br>";
echo "<img src='$imagem'>";
echo "<br>";
echo "<br>";
echo $token."<br>";
echo "<br>";
echo $nome."<br>";
echo "<br>";
echo $email."<br>";


R::store( $cadastro );

?>