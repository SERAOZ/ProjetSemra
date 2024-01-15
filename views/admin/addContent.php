<?php require (ROOT.'views/includes/head.php');?>
<!-- Inclusion de l'en-tête du document -->
<body>
    <div class="container-fluid">
        <!-- Div principale avec une classe container-fluid -->
        <div class="col-md-12">
            <?php require (ROOT.'views/includes/header.php');?>
            <!-- Inclusion de l'en-tête du site -->
        </div> 
        <div class="row">
            <!-- Nouvelle ligne pour la mise en page -->
            <section class="col-sm-12 col-md-9 my-5">
                <!-- Section pour le contenu principal de la page -->
                <div class="container">
                    <!-- Div de container pour le contenu -->
                    <div class="row">
                        <!-- Nouvelle ligne pour la mise en page -->
                        <div class="col-lg-2"></div>
                        <!-- Colonne vide de 2 colonnes pour la mise en page -->
                        <div class="col-md-6">
                            <!-- Colonne de 6 colonnes pour le formulaire d'ajout de contenu -->
                            <h5>Ajout Contenu</h5>
                            <!-- Titre du formulaire -->
                            <form action="<?php echo WWW_ROOT;?>contents/addContent" method="post">
                                <!-- Formulaire avec action vers la page d'ajout de contenu -->
                                <fieldset>
                                    <!-- Fieldset pour regrouper les éléments du formulaire -->
                                    <div class="form-group">  
                                        <!-- Groupe de formulaire pour la sélection de catégorie -->
                                        <?php 
                                        echo ' <label for="category">Categorie</label>
                                        <select class="form-control" id="category" name="id_category">';
                                        foreach($data['categories'] as $category){
                                            echo '<option value="'.$category->id_category.'">'.$category->name.'</option>'; 
                                        }
                                        echo '</select>';
                                        ?>
                                        <!-- Menu déroulant pour sélectionner une catégorie -->
                                    </div>
                                    <div class="form-group">
                                        <!-- Groupe de formulaire pour le titre -->
                                        <label for="title">Titre</label>
                                        <!-- Étiquette du champ de formulaire -->
                                        <input type="text" class="form-control" id="title" name="title" required>
                                        <!-- Champ de formulaire de type texte pour le titre -->
                                    </div>
                                    <div class="form-group">
                                        <!-- Groupe de formulaire pour le texte du contenu -->
                                        <label for="content_text">Texte du contenu</label>
                                        <!-- Étiquette du champ de formulaire -->
                                        <textarea id="content_text" name="content_text" rows="3" required>                             
                                        </textarea>
                                        <!-- Champ de formulaire de type textarea pour le texte du contenu -->
                                    </div>
                                    <input type="submit" class="btn btn-primary" name="add" value="Ajouter">
                                    <!-- Bouton de soumission du formulaire -->
                                </fieldset>
                            </form>
                        </div>
                        <div class="col-lg-4"></div>
                        <!-- Colonne vide de 4 colonnes pour la mise en page -->
                    </div>
                </div>                
            </section>
        </div>
        <?php require ROOT . '/views/includes/footer.php';?>
        <!-- Inclusion du pied de page du site -->

