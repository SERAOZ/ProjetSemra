<?php
   require (ROOT.'views/includes/head.php');
?>
 <body>

    <div class="container-fluid">
        
        <div class="col-md-12">
            <?php
            require (ROOT.'views/includes/header.php');
            ?>
        </div>                               
            <section class="col-sm-12 col-md-90 my-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-90">
                            <form action="<?php echo WWW_ROOT;?>users/register" method="post">
                            <fieldset>
                            <legend>INSCRIPTION</legend>

                            <div class="form-group mt-30">
                                <label for="nom">Nom</label>
                                <input type="text" class="form-control" id="nom" name="username" >
                            </div>

                            <div class="form-group">
                                <label for="email">Adresse email </label>
                                <input type="email" class="form-control" id="email" name="email" >
                            </div>
                            <?php if(!empty($data['emailError'])) echo '<p class="invalidFeedback">'.$data['emailError'].'</p>'; ?>
                            
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" >
                            </div>
                            <?php if(!empty($data['password']))echo '<p class="invalidFeedback">'.$data['password'].'</p>'; ?>
                            
                            <input type="submit" class="btn btn-primary" name="inscrire" value="S'inscrire">
                            </fieldset>
                            </form>
                        </div>                                      
                    </div>                 
                </div>
            </section>
        </div>
      