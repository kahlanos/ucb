<?php

class reviewController
{

    public function review($id)
    {

        $db = new dbBeer();
        $beer = $db->getBeerById($id);

        require("view/add_review.php");
    }

    public function addReview($idBeer)
    {

        $db = new dbReview();

        $date = date("Y-m-d");


        $db->addReview($_SESSION['userId'], $idBeer, $_SESSION['rol'], $_POST['score'], $_POST['comment'], $date);


        header("location: ../../../index.php/beers");
    }
}
