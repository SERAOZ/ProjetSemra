<?php

//helper session qui se chargera à la racine dans l'index
session_start();
// Fonction qui vérifie si un utilisateur est connecté en utilisant la session.
function isLoggedIn() {
    // Vérifie si la clé 'user_id' existe dans la session.
    if (isset($_SESSION['user_id'])) {
        // Si 'user_id' existe, retourne vrai (l'utilisateur est connecté).
        return true;
    } else {
        // Sinon, retourne faux (l'utilisateur n'est pas connecté).
        return false;
    }
}

