<?php
require_once 'rb.php';


 R::setup( 'mysql:host=localhost;dbname=login','root', '' ); //for both mysql or mariaDB

$token =filter_input(INPUT_POST,'userID');
$nome=filter_input(INPUT_POST,'userName');
$email=filter_input(INPUT_POST,'userEmail',FILTER_SANITIZE_STRING);

$cadastro = R::dispense('pessoa');

$cadastro->teste=$token;
$cadastro->nome=$nome;
$cadastro->email=$email;

echo $token;
echo $nome;
echo $email;


R::store( $cadastro );

?>