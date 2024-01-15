<?php require (ROOT.'views/includes/head.php'); ?>
<body>
    <div class="container-fluid">
        <?php require (ROOT.'views/includes/header.php');?>
        <div class="row">
            <section class="col-sm-12 col-md-90 my-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-60">
                            <!-- Formulaire de connexion -->
                            <form id="connect_form">
                                <fieldset>
                                    <legend>CONNEXION</legend>
                                    <span id="message"></span>
                                    <div class="form-group" >
                                        <label for="email">Adresse email </label>
                                        <input type="text" class="form-control form_data" id="email" name="email">
                                        <!-- Icône et message d'erreur pour l'email -->
                                        <span class="iconic" id="email_iconic">
                                            <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg">
                                                <g fill="none" fill-rule="evenodd">
                                                    <circle fill="#FF2D2D" cx="12" cy="12" r="12" />
                                                    <rect fill="#FFF" x="11" y="6" width="2" height="9" rx="1" />
                                                    <rect fill="#FFF" x="11" y="17" width="2" height="2" rx="1" />
                                                </g>
                                            </svg>
                                        </span>
                                        <span id="email_error" class="text-danger"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control form_data" id="password" name="password">
                                        <!-- Icône et message d'erreur pour le mot de passe -->
                                        <span class="iconic" id="password_iconic">
                                            <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg">
                                                <g fill="none" fill-rule="evenodd">
                                                    <circle fill="#FF2D2D" cx="12" cy="12" r="12" />
                                                    <rect fill="#FFF" x="11" y="6" width="2" height="9" rx="1" />
                                                    <rect fill="#FFF" x="11" y="17" width="2" height="2" rx="1" />
                                                </g>
                                            </svg>
                                        </span>
                                        <span id="password_error" class="text-danger"></span>
                                    </div>
                                    <!-- Bouton de connexion -->
                                    <button type="button" name="submit" id="submit" class="btn btn-primary" onclick="save_data(); return false;">Se connecter</button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- Inclusion du script JavaScript pour la connexion -->
        <script src="<?php echo WWW_ROOT; ?>public/js/connexion.js"></script>
        <?php require ROOT . '/views/includes/footer.php';?>
