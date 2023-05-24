<?php

class dbReview
{

    public function addReview($user, $beer, $tipo, $score, $comment, $date)
    {

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

    public function getReviews($tipo, $beer)
    {

        try {

            $revs = [];

            $con = new Conexion();
            $db = $con->getConexion();

            if ($tipo == "admins") {
                $sqlTipo = "WHERE (tipo = 0 OR tipo = 1)";
            } else if ($tipo == "socios") {
                $sqlTipo = "WHERE tipo = 2";
            } else {
                $sqlTipo = "WHERE (tipo = 0 OR tipo = 1 OR tipo = 2)";
            }

            if ($beer != "") {
                $sqlBeer = "AND nombre LIKE '$beer'";
            } else {
                $sqlBeer = "";
            }

            $sql = "SELECT * FROM reviews r JOIN beers b on r.id_beer = b.id " . $sqlTipo . " " . $sqlBeer;
            $res = $db->query($sql);


            foreach ($res as $u) {
                $sql2 = "SELECT nombre FROM users WHERE id = " . $u['id_user'] . "";
                $res2 = $db->query($sql2);
                $user = $res2->fetch();

                $rev = new Review($u['id'], $u['id_user'], $u['nombre'], $u['tipo'], $u['score'], $u['comment'], $u['date']);

                $rev->setUser($user['nombre']);
                $revs[] = $rev;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        $db = NULL;


        return json_encode($revs);
    }
}
