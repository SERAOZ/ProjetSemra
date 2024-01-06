<?php require (ROOT.'views/includes/head.php');?>
 <body>
    <div class="container-fluid">        
        <div class="col-md-12">
            <?php require (ROOT.'views/includes/header.php');?>
        </div> 
        <div class="row">            
            <section class="col-sm-12 col-md-9 my-5">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-2"></div>
                            <div class="col-md-6">
                                <h5>Ajout Contenu</h5>
                                <form action="<?php echo WWW_ROOT;?>contents/addContent" method="post">
                                <fieldset>
                                    <div class="form-group">
                                        <label for="title"> Titre</label>
                                        <input type="text" class="form-control" id="title" name="title" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="content_text">Texte du contenu</label>
                                        <textarea id="content_text" name="content_text" rows="3" cols="33" required>                             
                                        </textarea>
                                    </div>                                                       
                                        <input type="submit" class="btn btn-primary" name="add" value="Ajouter">
                                </fieldset>
                                </form>                        
                            </div> 
                        <div class="col-lg-4"></div>
                    </div>
                </div>                
            </section>
        </div>
<?php require ROOT . '/views/includes/footer.php';?>
