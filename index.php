<?php 

require_once("config.php");


//Um usuario somente
// $root = new Usuario();

// $root->loadById(3);

// echo $root;


//Lista de usuarios

// $lista = Usuario::getList();

// var_dump($lista);


//Pesquisa pelo login

// $search = Usuario::search("u");

// echo json_encode($search);


// Carrega um usuario pelo login e senha
$usuario = new Usuario();

$usuario->login("userTeste", "123456789");

echo $usuario;
 ?>