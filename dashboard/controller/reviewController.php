<?php

class reviewController
{

    public function reviews()
    {

        $db = new DbBeer();
        $res = $db->getBeersByName();

        require("view/list_reviews.php");
    }

    public function loadReviews()
    {
        
        
        $db = new dbReview();
        $res = $db->getReviews($_POST['tipo'], $_POST['beer']);

        return $res;
    }

    public function review($id)
    {

        $db = new dbBeer();
        $beer = $db->getBeerById($id);

        require("view/add_review.php");
    }

    public function seeReview($id)
    {

        $db = new dbReview();
        $comment = $db->getReviewById($id);

        require("view/vista_review.php");
    }

    public function addReview($idBeer)
    {

        $db = new dbReview();

        $date = date("Y-m-d");


        $db->addReview($_SESSION['userId'], $idBeer, $_SESSION['rol'], $_POST['score'], $_POST['comment'], $date);


        if (isAdmin() || isEncargado()) {
            header("location: ../../../index.php/beers");
        } else if (isSocio()) {
            header("location: ../../../index.php/cervezas");
        }
        
    }

    function loadFilters() {

        $db = new DbBeer();
        $res = $db->getBeersByName();

        return $res;
    }

    public function deleteReview($id)
    {
        $db = new dbReview();
        $db->deleteReview($id);

        header("location: ../../index.php/reviews");
    }

    public function editReview($id) {

        $db = new DbReview();

        $db->editReview($id, $_POST['comment']);

        header("location: ../../../index.php/reviews");
    }
}
