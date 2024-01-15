<?php require (ROOT.'views/includes/head.php'); ?>
<body>
    
<?php require (ROOT.'views/includes/header.php'); ?> 

<div class="container-fluid w-75 mx-auto">
    <!-- Titre principal de la page -->
    <h1>DEVELOPPEMENT WEB</h1>
    
    <!-- Une rangée (row) pour afficher les contenus -->
    <div class="row d-flex justify-content-md-evenly flex-wrap">
        <?php
        // Vérification si des contenus sont disponibles
        if($data['contents'] != ""){
            foreach($data['contents'] as $content){
                // Affichage d'une carte Bootstrap pour chaque contenu
                echo '
                <div class="card border-primary my-3 mx-3" style="max-width: 20rem;">
                    <div class="card-header">'.$content->title.'</div>
                    <div class="card-body">
                        <h4 class="card-title">Categorie: '.$content->name.'</h4>
                        <p class="card-text">'.$content->content_text.'</p>
                    </div>
                    <div class="card-footer text-muted">'.$content->publicationDate.'</div>
                    <div class="card-footer">
                        <a class="btn btn-primary" href="'.WWW_ROOT .'contents/oneContent/'.$content->id_content.'">Voir</a>
                    </div>
                </div>';
            }  
        }else{
            // Message si aucun contenu n'est disponible
            echo 'il n\'y a pas encore de contenu à publier';
        }
        ?>
    </div>
</div>

<?php require (ROOT.'views/includes/footer.php');?> 
</body>
