<?php
   require (ROOT.'views/includes/head.php');
?>
 <body>

    <div class="container-fluid">
        
        <div class="col-md-12">
            <?php
            require (ROOT.'views/includes/header.php');
            ?>
        
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
                                   
                                        echo "<tr>";//affiche en boucle les données de la table
                                        echo "<td>".$user->user_id."</td>";
                                        echo "<td>".$user->username."</td>";
                                        echo "<td>".$user->email."</td>";
                                        echo "<td>".$user->is_admin."</td>";
                                                                            
                                        echo '<td><a  href="'.WWW_ROOT .'users/formUser/'.$user->user_id.'">
                                        Modifier</a>
                                        <a  href="'.WWW_ROOT .'users/deleteUser/'.$user->user_id.'">
                                        Effacer</a>                                        
                                        </td>';
                                        echo "</tr>";                                                                     
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