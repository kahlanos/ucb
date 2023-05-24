<?php

function isAdmin() {   
    if (isset($_SESSION["user"]) && $_SESSION["user"] === 'admin' && $_SESSION["rol"] == 0) {
        return true;
    } else {
        return false;
    }
}

function isEncargado() {   
    if (isset($_SESSION["user"]) && $_SESSION["user"] === 'encargado' && $_SESSION["rol"] == 1) {
        return true;
    } else {
        return false;
    }
}

function isSocio() {   
    if (isset($_SESSION["user"]) && $_SESSION["user"] === 'socio' && $_SESSION["rol"] == 2) {
        return true;
    } else {
        return false;
    }
}
