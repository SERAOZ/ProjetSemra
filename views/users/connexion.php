<?php
   require (ROOT.'views/includes/head.php');
?>
 <body>
 <script src="<?php echo WWW_ROOT; ?>public/js/script.js"></script>
 <div class="col-md-12">
            <?php
            require (ROOT.'views/includes/header.php');
            ?>
</div> 
<div class="login-container">   
        <h2 class="login-title">CONNEXION</h2>
        <form action="<?php echo WWW_ROOT;?>users/connexion" onsubmit=" event.preventDefault(); validate();" method="POST"> <!-- Formun işlendiği PHP dosyasını güncelleyin -->
            <div class="form-group">
                <label for="email" class="form-label">Email </label>
                <input type="text" id="email" name="email" class="form-input"> <!-- 'email' özelliğini güncelleyin -->
                <span class="iconic"
                ><svg width="24" height="24" xmlns="http://www.w3.org/2000/svg">
                <g fill="none" fill-rule="evenodd">
                  <circle fill="#FF7979" cx="12" cy="12" r="12" />
                  <rect fill="#FFF" x="11" y="6" width="2" height="9" rx="1" />
                  <rect fill="#FFF" x="11" y="17" width="2" height="2" rx="1" />
                </g></svg
            ></span>
            <div
              class="formData"
              data-error="Email cannot be empty or wrong format"
              data-error-visible="false"
            ></div>
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Password </label>
                <input type="password" id="password" name="password" class="form-input"> 
                <?php if(!empty($data['password']))echo '<p class="invalidFeedback">'.$data['password'].'</p>'; ?>
                <span class="iconic"
                ><svg width="24" height="24" xmlns="http://www.w3.org/2000/svg">
                <g fill="none" fill-rule="evenodd">
                  <circle fill="#FF7979" cx="12" cy="12" r="12" />
                  <rect fill="#FFF" x="11" y="6" width="2" height="9" rx="1" />
                  <rect fill="#FFF" x="11" y="17" width="2" height="2" rx="1" />
                </g></svg
            ></span>
            <div
              class="formData"
              data-error="Email cannot be empty or wrong format"
              data-error-visible="false"
            ></div>
            </div>
            <div class="form-group">
               
                <input type="submit" class="login-button" name="submit" value="Se connecter">
            </div>
        </form>
            <p>Vous n'avez pas de compte ? <a class="signup-link" href="<?php echo WWW_ROOT;?>users/register" style="color: red;">Sign up</a></p>
    </div>
