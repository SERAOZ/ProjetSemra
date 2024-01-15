<?php require (ROOT.'views/includes/head.php');?>
<body>
    <div class="container-fluid">
        <div class="col-md-12">
        <?php require (ROOT.'views/includes/header.php');?> 
        </div>                       
        <section class="col-sm-12 col-md-90 my-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-90">
                        <!-- Formulaire d'inscription -->
                        <form id="register_form">
                            <fieldset>
                                <legend>INSCRIPTION</legend>
                                <span id="message"></span> 
                                <div class="form-group">
                                    <label for="username">Nom</label>
                                    <input type="text" class="form-control form_data" id="username" name="username" >
                                    <!-- Icône et message d'erreur pour le nom -->
                                    <span class="iconic" id="username_iconic">
                                        <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg">
                                            <g fill="none" fill-rule="evenodd">
                                                <circle fill="#FF2D2D" cx="12" cy="12" r="12" />
                                                <rect fill="#FFF" x="11" y="6" width="2" height="9" rx="1" />
                                                <rect fill="#FFF" x="11" y="17" width="2" height="2" rx="1" />
                                            </g>
                                        </svg>
                                    </span>
                                    <span id="username_error" class="text-danger"></span>
                                </div>
                                <div class="form-group">
                                    <label for="email">Adresse email</label>
                                    <input type="text" class="form-control form_data" id="email" name="email" >
                                    <!-- Icône et message d'erreur pour l'adresse email -->
                                    <span id="email_error" class="text-danger"></span>
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
                                    <input type="password" class="form-control form_data" id="password" name="password" >
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
                                <!-- Bouton d'inscription -->
                                <button type="button" name="submit" id="submit" class="btn btn-primary" onclick="register_user(); return false;">S'inscrire</button>
                            </fieldset>
                        </form>
                    </div>                                      
                </div>                 
            </div>
        </section>
    </div>
    <!-- Inclusion du script JavaScript pour l'inscription -->
    <script src="<?php echo WWW_ROOT; ?>public/js/register.js"></script>
