<?php

class dbReview {

    public function addReview($user, $beer, $tipo, $score, $comment, $date) {

        try {

            $con = new Conexion();
            $db = $con->getConexion();

            $sql = "INSERT into reviews (id_user, id_beer, tipo, score, comment, date) values('$user', '$beer', '$tipo', '$score', '$comment', '$date')";
            $db->query($sql);


        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        $db = NULL;
      

    }

    public function getReviews()
    {

        try {

            $revs = [];

            $con = new Conexion();
            $db = $con->getConexion();

            $sql = "SELECT * FROM reviews LIMIT 12";
            $res = $db->query($sql);

            foreach ($res as $u) {
                $rev = new Review($u['id'], $u['id_user'], $u['id_beer'], $u['tipo'], $u['score'], $u['comment'], $u['date']);

                $revs[] = $rev;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        $db = NULL;


        return json_encode($revs);
    }

    
}