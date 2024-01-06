<?php
//helper session qui se chargera à la racine dans l'index
    session_start();

    function isLoggedIn() {
        if (isset($_SESSION['user_id'])) {
            return true;
        } else {
            return false;
        }
    }