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

    public function getReviews($tipo, $beer, $user)
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

            if ($user != "") {
                $sql2 = "SELECT id FROM users WHERE LOWER(nombre) LIKE '%$user%'";
                $res2 = $db->query($sql2);
                $user = $res2->fetch();
                $userId = $user['id'];

                $sqlUser = "AND id_user = '$userId'";
            } else {
                $sqlUser = '';
            }


            $sql = "SELECT r.id as idRev, id_user, nombre, tipo, score, comment, date FROM reviews r JOIN beers b on r.id_beer = b.id " . $sqlTipo . " " . $sqlBeer. " ". $sqlUser;
            $res = $db->query($sql);


            foreach ($res as $u) {
                $sql2 = "SELECT nombre FROM users WHERE id = " . $u['id_user'] . "";
                $res2 = $db->query($sql2);
                $user = $res2->fetch();


                $rev = new Review($u['idRev'], $u['id_user'], $u['nombre'], $u['tipo'], $u['score'], $u['comment'], $u['date']);

                $rev->setUser($user['nombre']);
                $revs[] = $rev;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        $db = NULL;


        return json_encode($revs);
    }

    public function deleteReview($id)
    {

        try {

            $con = new Conexion();
            $db = $con->getConexion();

            $sql = "DELETE FROM reviews WHERE id = '$id'";
            $res = $db->query($sql);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        $db = NULL;
    }

    public function getReviewById($id)
    {

        try {

            $con = new Conexion();
            $db = $con->getConexion();

            $sql = "SELECT * FROM reviews WHERE id = '$id'";
            $r = $db->query($sql);
            $u = $r->fetch();

            $comment = $u['comment'];
            $user = $u['id_user'];

            $res = [$comment, $user];
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        return $res;
    }

    public function editReview($id, $comment)
    {

        try {

            $con = new Conexion();
            $db = $con->getConexion();

            $sql = "UPDATE reviews SET comment = '$comment' WHERE id = '$id'";
            $r = $db->query($sql);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
