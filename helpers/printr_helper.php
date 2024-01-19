<?php
// Cette fonction permet d'afficher de manière lisible le contenu d'une variable ou 
//d'un objet avec un nom en tant qu'étiquette.
function printr($object, $name = '') {
    // Affiche le nom (ou l'étiquette) suivi de ':' pour identifier la variable ou l'objet.
    print('\'' . $name . '\' : ');

    // Vérifie si l'objet est un tableau (array).
    if (is_array($object)) {
        // Si c'est un tableau, utilise print_r pour afficher le contenu du tableau de manière lisible.
        print('<pre>');
        print_r($object);
        print('</pre>');
    } else {
        // Si ce n'est pas un tableau (par exemple, un objet), utilise var_dump pour afficher des informations détaillées.
        var_dump($object);
    }
}
?>
