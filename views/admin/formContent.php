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
                            <!-- Colonne de 6 colonnes pour le formulaire de modification de contenu -->
                            <h5>Modifier Contenu</h5>
                            <!-- Titre du formulaire -->

                            <form action="<?php echo WWW_ROOT;?>contents/updateContent" method="Post">
                                <!-- Formulaire avec action vers la page de mise à jour de contenu -->

                                <fieldset>
                                    <!-- Fieldset pour regrouper les éléments du formulaire -->

                                    <div class="form-group">  
                                        <!-- Groupe de formulaire pour le champ "Catégorie" -->
                                        <?php 
                                        echo ' <label for="category">Catégorie</label>
                                        <select class="form-control" id="category" name="id_category">';
                                        echo '<option value="'.$data["content"]->id_category.'">'.$data["content"]->name.'</option>';
                                        foreach($data['categories'] as $category){
                                            echo '<option value="'.$category->id_category.'">'.$category->name.'</option>'; 
                                        }
                                        echo '</select>';
                                        ?>
                                    </div>

                                    <div class="form-group">
                                        <!-- Groupe de formulaire pour le champ "Titre" -->
                                        <label for="title"> Titre</label>
                                        <input type="text" class="form-control" id="title" name="title" value="<?= $data['content']->title ?>" required>
                                        <!-- Champ de formulaire de type texte pour le titre du contenu avec une valeur par défaut -->
                                    </div>

                                    <div class="form-group">
                                        <!-- Groupe de formulaire pour le champ "Texte du contenu" -->
                                        <label for="content_text">Texte du contenu</label>
                                        <textarea id="content_text" name="content_text" rows="3" cols="33" required>                             
                                        <?php echo $data['content']->content_text;?>    
                                        </textarea>
                                        <!-- Champ de formulaire de type textarea pour le texte du contenu avec une valeur par défaut -->
                                    </div>

                                    <input type="hidden" name="id_content" value="<?= $data['content']->id_content?>" >
                                    <!-- Champ caché pour stocker l'identifiant du contenu -->

                                    <input type="submit" class="btn btn-primary" name="edit" value="Ajouter">
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
