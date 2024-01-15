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
                            <!-- Colonne de 6 colonnes pour le formulaire d'ajout de catégorie -->
                            <h5>Ajout Category</h5>
                            <!-- Titre du formulaire -->
                            <form action="<?php echo WWW_ROOT;?>categories/addCategory" method="post">
                                <!-- Formulaire avec action vers la page d'ajout de catégorie -->
                                <fieldset>
                                    <!-- Fieldset pour regrouper les éléments du formulaire -->
                                    <div class="form-group">
                                        <!-- Groupe de formulaire pour le nom -->
                                        <label for="name"> Nom</label>
                                        <!-- Étiquette du champ de formulaire -->
                                        <input type="text" class="form-control" id="name" name="name" required>
                                        <!-- Champ de formulaire de type texte pour le nom -->
                                    </div>
                                    <div class="form-group">
                                        <!-- Groupe de formulaire pour la description -->
                                        <label for="description">Description</label>
                                        <!-- Étiquette du champ de formulaire -->
                                        <textarea id="description" name="description" rows="3" cols="33" required>                             
                                        </textarea>
                                        <!-- Champ de formulaire de type textarea pour la description -->
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

