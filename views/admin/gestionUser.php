<?php
   require (ROOT.'views/includes/head.php');
?>
<!-- Inclusion de l'en-tête de la page -->

<body>
    <div class="container-fluid">
        <div class="col-md-12">
            <?php
            require (ROOT.'views/includes/header.php');
            ?>
            <!-- Inclusion de l'en-tête du site -->

            <section class="col-sm-12 col-md-9 my-5">
                <div class="container">
                    <div class="col-md-12">
                        <h5>Membres inscrits</h5>
                        
                        <table class="table table-hover">
                            <thead>
                                <tr class="table-active">
                                <th scope="col">ID </th>
                                <th scope="col">Nom </th>
                                <th scope="col">Email</th>
                                <th scope="col">Rôle</th>
                                <th scope="col">Action</th>    
                                </tr>
                            </thead>
                            <tbody>
                                <?php                       
                                foreach($data['users'] as $user){
                                    echo "<tr>"; // Commence une nouvelle ligne pour chaque membre
                                    echo "<td>".$user->user_id."</td>"; // Affiche l'ID du membre
                                    echo "<td>".$user->username."</td>"; // Affiche le nom du membre
                                    echo "<td>".$user->email."</td>"; // Affiche l'email du membre
                                    echo "<td>".$user->is_admin."</td>"; // Affiche le rôle du membre

                                    echo '<td><a  href="'.WWW_ROOT .'users/formUser/'.$user->user_id.'">
                                        Modifier</a> 
                                        <!-- Lien pour modifier le membre -->

                                        <a  href="'.WWW_ROOT .'users/deleteUser/'.$user->user_id.'">
                                        Effacer</a>
                                        <!-- Lien pour supprimer le membre -->                                       
                                        </td>';
                                    echo "</tr>"; // Termine la ligne du membre en cours
                                } 
                                ?>  
                            </tbody>
                        </table><br>                        
                    </div> 
                </div>
            </section>
        </div>
        <?php
        require ROOT . '/views/includes/footer.php';
        ?>
        <!-- Inclusion du pied de page -->

