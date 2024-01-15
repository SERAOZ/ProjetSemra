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
                            <!-- Colonne de 6 colonnes pour le formulaire de modification de catégorie -->
                            <h5>Modifier Category</h5>
                            <!-- Titre du formulaire -->

                            <form action="<?php echo WWW_ROOT;?>categories/updateCategory" method="Post">
                                <!-- Formulaire avec action vers la page de mise à jour de catégorie -->

                                <fieldset>
                                    <!-- Fieldset pour regrouper les éléments du formulaire -->
                                    <div class="form-group">
                                        <!-- Groupe de formulaire pour le champ "Nom" -->
                                        <label for="name">Nom</label>
                                        <!-- Étiquette du champ de formulaire -->
                                        <input type="text" class="form-control" id="name" name="name" value="<?= $data['category']->name ?>" required>
                                        <!-- Champ de formulaire de type texte pour le nom de la catégorie avec une valeur par défaut -->
                                    </div>
                                    <div class="form-group">
                                        <!-- Groupe de formulaire pour le champ "Description" -->
                                        <label for="description">Description</label>
                                        <!-- Étiquette du champ de formulaire -->
                                        <textarea id="description" name="description" rows="3" cols="33" required>                             
                                        <?php echo $data['category']->description;?>    
                                        </textarea>
                                        <!-- Champ de formulaire de type textarea pour la description de la catégorie avec une valeur par défaut -->
                                    </div> 
                                    <input type="hidden" name="id_category" value="<?= $data['category']->id_category?>" >
                                    <!-- Champ caché pour stocker l'identifiant de la catégorie -->
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
