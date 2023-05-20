<?php
session_start();
require("utils/conexion.php");

require("controller/userController.php");
require("controller/beerController.php");

require("model/User.php");
require("model/dbUser.php");
require("model/Beer.php");
require("model/dbBeer.php");


$userController = new userController;
$beerController = new beerController;

//Ruta de la home
$home = "/ucb/dashboard/index.php/";
//Quito la home de la ruta de la barra de direcciones (ACCION)
$ruta = str_replace($home, "", $_SERVER["REQUEST_URI"]);

//Creo el array de ruta (filtrando los vacíos)
$array_ruta = array_filter(explode("/", $ruta));




//RUTAS
if (isset($array_ruta[0]) && $array_ruta[0] == "login" && empty($array_ruta[1])) {
    $userController->login();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "login" && $array_ruta[1] == "process") {
    $userController->process();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "home" && empty($array_ruta[1])) {
    $userController->home();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "users" && empty($array_ruta[1])) {
    //echo $controller->usuarios();
    $userController->users();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "loadUsers" && empty($array_ruta[1])) {
    //echo $controller->usuarios();
    echo $userController->loadUsers();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "users" && is_numeric($array_ruta[1]) && !empty($array_ruta[2]) && $array_ruta[2] == "process") {
    $userController->editUser($array_ruta[1]);
}  else if (isset($array_ruta[0]) && $array_ruta[0] == "users" && is_numeric($array_ruta[1])) {
    $userController->fichaUsuario($array_ruta[1]);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "userDelete" && is_numeric($array_ruta[1])) {
    $userController->deleteUser($array_ruta[1]);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "users" && $array_ruta[1] == "add" && !empty($array_ruta[2]) && $array_ruta[2] == "loadUsers") {
    echo $userController->cargaEncargadosNombre();
}  else if (isset($array_ruta[0]) && $array_ruta[0] == "users" && $array_ruta[1] == "add" && !empty($array_ruta[2]) && $array_ruta[2] == "process") {   
    $userController->addUserProcess();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "users" && $array_ruta[1] == "add") {
    $userController->addUser();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "beers" && empty($array_ruta[1])) {
    
    $beerController->beers();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "loadBeers" && empty($array_ruta[1])) {
    
    echo $beerController->loadBeers();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "beers" && is_numeric($array_ruta[1]) && !empty($array_ruta[2]) && $array_ruta[2] == "process") {
    $beerController->editBeer($array_ruta[1]);
}  else if (isset($array_ruta[0]) && $array_ruta[0] == "beers" && is_numeric($array_ruta[1])) {
    $beerController->fichaBeer($array_ruta[1]);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "beerDelete" && is_numeric($array_ruta[1])) {
    $beerController->deleteBeer($array_ruta[1]);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "beers" && $array_ruta[1] == "add" && !empty($array_ruta[2]) && $array_ruta[2] == "process") {   
    $beerController->addBeerProcess();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "beers" && $array_ruta[1] == "add") {
    $beerController->addBeer();
} 