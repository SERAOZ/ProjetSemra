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
                        <form id="register_form">                            
                        <fieldset>
                        <legend>MODIFICATION</legend>
                                <span id="message"></span> 
                                    <div class="form-group">
                                        <label for="username">Nom</label>
                                        <input type="text" class="form-control form_data" id="username" name="username"  value="<?= $data['user']->username ?>" >
                                        <span class="iconic" id="username_iconic">
                                    <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg">
                                    <g fill="none" fill-rule="evenodd">
                                    <circle fill="#FF7979" cx="12" cy="12" r="12" />
                                    <rect fill="#FFF" x="11" y="6" width="2" height="9" rx="1" />
                                    <rect fill="#FFF" x="11" y="17" width="2" height="2" rx="1" />
                                    </g></svg></span>
                                    <span id="username_error" class="text-danger"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Adresse email</label>
                                        <input type="text" class="form-control form_data" id="email" name="email" value="<?= $data['user']->email ?>" >
                                        <span id="email_error" class="text-danger"></span>
                                        <span class="iconic" id="email_iconic">
                                        <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg">
                                    <g fill="none" fill-rule="evenodd">
                                    <circle fill="#FF7979" cx="12" cy="12" r="12" />
                                    <rect fill="#FFF" x="11" y="6" width="2" height="9" rx="1" />
                                    <rect fill="#FFF" x="11" y="17" width="2" height="2" rx="1" />
                                    </g></svg></span>
                                    <span id="email_error" class="text-danger"></span>    
                                    </div>                          
                                        
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control form_data" id="password" name="password" placeholder="Veuillez rappeler ou renouveler votre mot de passe" >
                                        <span class="iconic" id="password_iconic">
                                    <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg">
                                    <g fill="none" fill-rule="evenodd">
                                    <circle fill="#FF7979" cx="12" cy="12" r="12" />
                                    <rect fill="#FFF" x="11" y="6" width="2" height="9" rx="1" />
                                    <rect fill="#FFF" x="11" y="17" width="2" height="2" rx="1" />
                                    </g></svg></span>
                                   <span id="password_error" class="text-danger"></span>    
                                    </div>

                                    <div class="form-group">
                                        <label for="is_admin">Rôle</label>
                                        <input type="number" class="form-control form_data" id="is_admin" name="is_admin" value="<?= $data['user']->is_admin ?>" >
                                        <span class="iconic" id="is_admin_iconic">
                                    <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg">
                                    <g fill="none" fill-rule="evenodd">
                                    <circle fill="#FF7979" cx="12" cy="12" r="12" />
                                    <rect fill="#FFF" x="11" y="6" width="2" height="9" rx="1" />
                                    <rect fill="#FFF" x="11" y="17" width="2" height="2" rx="1" />
                                    </g></svg></span>
                                   <span id="is_admin_error" class="text-danger"></span>    
                                    </div> 
                                    <input type="hidden" name="user_id" class="form_data" value=" <?= $data['user']->user_id?>" />                                                                                
                                    <button type="button" name="submit" id="submit" class="btn btn-primary" onclick="update_user(); return false;">Modifier</button>
                            </fieldset>
                            </form>
                        </div>                                      
                    </div>                 
                </div>
            </section>
        </div>
<script src="<?php echo WWW_ROOT; ?>public/js/updateUser.js"></script>