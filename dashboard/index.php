<?php
session_start();
require("utils/conexion.php");
require("utils/control.php");

require("controller/userController.php");
require("controller/beerController.php");
require("controller/deliveryController.php");
require("controller/reviewController.php");
require("controller/newsController.php");

require("model/User.php");
require("model/dbUser.php");
require("model/Beer.php");
require("model/dbBeer.php");
require("model/dbDelivery.php");
require("model/Delivery.php");
require("model/dbReview.php");
require("model/Review.php");
require("model/dbNews.php");
require("model/News.php");


$userController = new userController;
$beerController = new beerController;
$deliveryController = new deliveryController;
$reviewController = new reviewController;
$newsController = new newsController;

//Ruta de la home
$home = "/ucb/dashboard/index.php/";
//Quito la home de la ruta de la barra de direcciones (ACCION)
$ruta = str_replace($home, "", $_SERVER["REQUEST_URI"]);

//Creo el array de ruta (filtrando los vacíos)
$array_ruta = array_filter(explode("/", $ruta));




//RUTAS
if (isset($array_ruta[0]) && $array_ruta[0] == "login" && empty($array_ruta[1])) {
    $userController->login();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "logout" && empty($array_ruta[1])) {
    $userController->logout();
}  else if (isset($array_ruta[0]) && $array_ruta[0] == "login" && $array_ruta[1] == "process") {
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
} else if (isset($array_ruta[0]) && $array_ruta[0] == "beers" && is_numeric($array_ruta[1]) && !empty($array_ruta[2]) && $array_ruta[2] == "descarga") {
    $beerController->descargaPdf($array_ruta[1]);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "beers" && is_numeric($array_ruta[1])) {
    $beerController->fichaBeer($array_ruta[1]);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "beerDelete" && is_numeric($array_ruta[1])) {
    $beerController->deleteBeer($array_ruta[1]);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "beers" && $array_ruta[1] == "add" && !empty($array_ruta[2]) && $array_ruta[2] == "process") {   
    $beerController->addBeerProcess();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "beers" && $array_ruta[1] == "add") {
    $beerController->addBeer();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "review" && is_numeric($array_ruta[1]) && !empty($array_ruta[2]) && $array_ruta[2] == "process") {
    $reviewController->addReview($array_ruta[1]);
}  else if (isset($array_ruta[0]) && $array_ruta[0] == "review" && is_numeric($array_ruta[1])) {
    $reviewController->review($array_ruta[1]);
// } else if (isset($array_ruta[0]) && $array_ruta[0] == "reviews" && $array_ruta[1] == "loadFilters") {
    
//     echo $reviewController->loadFilters();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "reviews" && empty($array_ruta[1])) {
    
    $reviewController->reviews();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "loadReviews" && empty($array_ruta[1])) {
    
    echo $reviewController->loadReviews();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "deliveries" && empty($array_ruta[1])) {
    
    $deliveryController->deliveries();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "loadDeliveries" && empty($array_ruta[1])) {
    
    echo $deliveryController->loadDeliveries();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "generateDeliveries") {
    
    $deliveryController->generaEntregas();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "cambiaEstado") {
    
    $deliveryController->cambiaEstado();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "deliveryDelete" && is_numeric($array_ruta[1])) {
    $deliveryController->deleteDelivery($array_ruta[1]);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "news" && empty($array_ruta[1])) {
    
    $newsController->news();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "loadNews" && empty($array_ruta[1])) {
    
    echo $newsController->loadNews();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "news" && is_numeric($array_ruta[1]) && !empty($array_ruta[2]) && $array_ruta[2] == "process") {
    $newsController->editNews($array_ruta[1]);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "news" && is_numeric($array_ruta[1])) {
    $newsController->fichaNews($array_ruta[1]);
} else if (isset($array_ruta[0]) && $array_ruta[0] == "newsDelete" && is_numeric($array_ruta[1])) {
    $newsController->deleteNews($array_ruta[1]);
}  else if (isset($array_ruta[0]) && $array_ruta[0] == "news" && $array_ruta[1] == "add" && !empty($array_ruta[2]) && $array_ruta[2] == "process") {   
    $newsController->addNewsProcess();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "news" && $array_ruta[1] == "add") {
    $newsController->addNews();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "cervezas" && empty($array_ruta[1])) {
    
    $beerController->cervezas();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "loadBeers" && empty($array_ruta[1])) {
    
    echo $beerController->loadBeers();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "cervezas" && is_numeric($array_ruta[1])) {
    $beerController->vistaBeer($array_ruta[1]);
}