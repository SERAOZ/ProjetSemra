<?php require (ROOT.'views/includes/head.php');?>
<!-- Inclusion de l'en-tête de la page -->

<body>
    <div class="container-fluid">        
        <div class="col-md-12">
            <?php require (ROOT.'views/includes/header.php');?>        
            <!-- Inclusion de l'en-tête du site -->

            <section class="col-sm-12 col-md-9 my-5">
                <div class="container">                    
                    <div class="col-md-12 ">
                        <h2>Catégories</h2>
                        <?php echo '<a href="'.WWW_ROOT.'categories/addCategory" class="btn btn-success my-5">Ajouter Catégorie</a>';?>
                        <!-- Lien pour ajouter une nouvelle catégorie -->

                        <table class="table table-hover">
                            <thead>
                                <tr class="table-active">
                                <th scope="col">ID</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Description</th>
                                <th scope="col">Action</th>    
                                </tr>
                            </thead>
                            <tbody>
                                <?php                       
                                foreach($data['categories'] as $category){
                                    echo "<tr>"; // Commence une nouvelle ligne pour chaque catégorie
                                    echo "<td>".$category->id_category."</td>"; // Affiche l'ID de la catégorie
                                    echo "<td>".$category->name."</td>"; // Affiche le nom de la catégorie
                                    echo "<td>".$category->description."</td>"; // Affiche la description de la catégorie

                                    echo '<td><a  href="'.WWW_ROOT .'categories/formCategory/'.$category->id_category.'">
                                        Modifier</a>
                                        <!-- Lien pour modifier la catégorie -->

                                        <a  href="'.WWW_ROOT .'categories/deleteCategory/'.$category->id_category.'">
                                        Effacer</a>  
                                        <!-- Lien pour supprimer la catégorie -->                                      
                                        </td>';
                                    echo "</tr>"; // Termine la ligne de la catégorie en cours
                                } 
                                ?>  
                            </tbody>
                        </table><br>                        
                    </div> 
                </div>              
            </section>
        </div>
