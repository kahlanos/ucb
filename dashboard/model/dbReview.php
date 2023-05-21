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

    
}