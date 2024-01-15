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
                        <h2>Contenu</h2>
                        <?php echo '<a href="'.WWW_ROOT.'contents/addContent" class="btn btn-success my-5">Ajouter Contenu</a>';?>
                        <!-- Lien pour ajouter un nouveau contenu -->

                        <table class="table table-hover">
                            <thead>
                                <tr class="table-active">
                                <th scope="col">ID </th>
                                <th scope="col">Titre </th>
                                <th scope="col">Texte du Contenu</th>
                                <th scope="col">Date de Publication</th>
                                <th scope="col">Categorie</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php                       
                                foreach($data['contents'] as $content){
                                    echo "<tr>"; // Commence une nouvelle ligne pour chaque contenu
                                    echo "<td>".$content->id_content."</td>"; // Affiche l'ID du contenu
                                    echo "<td>".$content->title."</td>"; // Affiche le titre du contenu
                                    echo "<td>".$content->content_text."</td>"; // Affiche le texte du contenu
                                    echo "<td>".$content->publicationDate."</td>"; // Affiche la date de publication
                                    echo "<td>".$content->name."</td>"; // Affiche la catégorie du contenu

                                    echo '<td><a  href="'.WWW_ROOT .'contents/formContent/'.$content->id_content.'">
                                        Modifier</a>
                                        <!-- Lien pour modifier le contenu -->

                                        <a  href="'.WWW_ROOT .'contents/deleteContent/'.$content->id_content.'">
                                        Effacer</a>  
                                        <!-- Lien pour supprimer le contenu -->                                      
                                        </td>';
                                    echo "</tr>"; // Termine la ligne du contenu en cours
                                } 
                                ?>  
                            </tbody>
                        </table><br>                        
                    </div> 
                </div>              
            </section>
        </div>
