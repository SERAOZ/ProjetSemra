<?php require (ROOT.'views/includes/head.php');?>
<!-- Inclusion de l'en-tête du document -->
<body>
    <div class="container-fluid">
        <!-- Div principale avec une classe container-fluid -->

        <div class="col-md-12">
            <?php require (ROOT.'views/includes/header.php');?>
            <!-- Inclusion de l'en-tête du site -->
        </div>

        <section class="col-sm-12 col-md-90 my-5">
            <!-- Section pour le contenu principal de la page -->
            <div class="container">
                <!-- Div de container pour le contenu -->

                <div class="row">
                    <!-- Nouvelle ligne pour la mise en page -->

                    <div class="col-md-90">
                        <!-- Colonne de 90 colonnes pour le formulaire de modification d'utilisateur -->
                        <form id="register_form">
                            <!-- Formulaire avec un identifiant "register_form" -->

                            <fieldset>
                                <!-- Fieldset pour regrouper les éléments du formulaire -->
                                <legend>MODIFICATION</legend>
                                <!-- Légende du formulaire -->

                                <span id="message"></span>
                                <!-- Emplacement pour afficher les messages de validation ou d'erreur -->

                                <div class="form-group">
                                    <!-- Groupe de formulaire pour le champ "Nom" -->
                                    <label for="username">Nom</label>
                                    <!-- Libellé du champ -->
                                    <input type="text" class="form-control form_data" id="username" name="username"  value="<?= $data['user']->username ?>" >
                                    <!-- Champ de formulaire de type texte pour le nom d'utilisateur avec une valeur par défaut -->
                                    <span class="iconic_one_formUser" id="username_iconic">
                                        <!-- Icône affichée à côté du champ -->
                                        <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg">
                                            <g fill="none" fill-rule="evenodd">
                                                <circle fill="#FF2D2D" cx="12" cy="12" r="12" />
                                                <rect fill="#FFF" x="11" y="6" width="2" height="9" rx="1" />
                                                <rect fill="#FFF" x="11" y="17" width="2" height="2" rx="1" />
                                            </g>
                                        </svg>
                                    </span>
                                    <span id="username_error" class="text-danger"></span>
                                    <!-- Message d'erreur affiché en cas d'erreur -->
                                </div>

                                <div class="form-group">
                                    <!-- Groupe de formulaire pour le champ "Adresse email" -->
                                    <label for="email">Adresse email</label>
                                    <!-- Libellé du champ -->
                                    <input type="text" class="form-control form_data" id="email" name="email" value="<?= $data['user']->email ?>" >
                                    <!-- Champ de formulaire de type texte pour l'adresse email avec une valeur par défaut -->
                                    <span id="email_error" class="text-danger"></span>
                                    <!-- Message d'erreur affiché en cas d'erreur -->
                                    <span class="iconic_two_formUser" id="email_iconic">
                                        <!-- Icône affichée à côté du champ -->
                                        <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg">
                                            <g fill="none" fill-rule="evenodd">
                                                <circle fill="#FF2D2D" cx="12" cy="12" r="12" />
                                                <rect fill="#FFF" x="11" y="6" width="2" height="9" rx="1" />
                                                <rect fill="#FFF" x="11" y="17" width="2" height="2" rx="1" />
                                            </g>
                                        </svg>
                                    </span>
                                </div>

                                <div class="form-group">
                                    <!-- Groupe de formulaire pour le champ "Password" -->
                                    <label for="password">Password</label>
                                    <!-- Libellé du champ -->
                                    <input type="password" class="form-control form_data" id="password" name="password" placeholder="Veuillez rappeler ou renouveler votre mot de passe" >
                                    <!-- Champ de formulaire de type mot de passe -->
                                    <span class="iconic_three_formUser" id="password_iconic">
                                        <!-- Icône affichée à côté du champ -->
                                        <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg">
                                            <g fill="none" fill-rule="evenodd">
                                                <circle fill="#FF2D2D" cx="12" cy="12" r="12" />
                                                <rect fill="#FFF" x="11" y="6" width="2" height="9" rx="1" />
                                                <rect fill="#FFF" x="11" y="17" width="2" height="2" rx="1" />
                                            </g>
                                        </svg>
                                    </span>
                                    <span id="password_error" class="text-danger"></span>
                                    <!-- Message d'erreur affiché en cas d'erreur -->
                                </div>

                                <div class="form-group">
                                    <!-- Groupe de formulaire pour le champ "Rôle" -->
                                    <label for="is_admin">Rôle
                                        <?php 
                                        if($data['user']->is_admin === 0) {echo ': Actuellement Utilisateur';}else{ echo ': Actuellement Administrateur';}
                                        ?>
                                    </label>
                                    <!-- Libellé du champ avec affichage du rôle actuel de l'utilisateur -->
                                    <?php 
                                    if($data['user']->is_admin === 1) {echo ' <select class="form-control form_data" id="is_admin" name="is_admin"> 
                                        <option value="0" >Utilisateur</option>
                                        <option value="1" >Administrateur</option>
                                    </select>';}else{echo '<input type="hidden" name="is_admin" class="form_data" value="0" />';}
                                    ?>
                                    <!-- Sélection du rôle actuel de l'utilisateur avec un champ de sélection déroulante -->
                                    <span class="iconic_four_formUser" id="is_admin_iconic">
                                        <!-- Icône affichée à côté du champ -->
                                        <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg">
                                            <g fill="none" fill-rule="evenodd">
                                                <circle fill="#FF2D2D" cx="12" cy="12" r="12" />
                                                <rect fill="#FFF" x="11" y="6" width="2" height="9" rx="1" />
                                                <rect fill="#FFF" x="11" y="17" width="2" height="2" rx="1" />
                                            </g>
                                        </svg>
                                    </span>
                                    <span id="is_admin_error" class="text-danger"></span>
                                    <!-- Message d'erreur affiché en cas d'erreur -->
                                </div>

                                <input type="hidden" name="user_id" class="form_data" value=" <?= $data['user']->user_id?>" />
                                <!-- Champ caché pour stocker l'identifiant de l'utilisateur -->

                                <button type="button" name="submit" id="submit" class="btn btn-primary" onclick="update_user(); return false;">Modifier</button>
                                <!-- Bouton de soumission du formulaire avec appel à la fonction JavaScript "update_user()" -->
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
<script src="<?php echo WWW_ROOT; ?>public/js/updateUser.js"></script>
<!-- Inclusion du script JavaScript "updateUser.js" -->
