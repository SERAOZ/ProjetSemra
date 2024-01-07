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
                                <h5>Modifier Category</h5>
                                <form action="<?php echo WWW_ROOT;?>categories/updateCategory" method="Post">
                                <fieldset>
                                    <div class="form-group">
                                        <label for="name">Nom</label>
                                        <input type="text" class="form-control" id="name" name="name" value="<?= $data['category']->name ?>" required>
                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea id="description" name="description" rows="3" cols="33" required>                             
                                        <?php echo $data['category']->description;?>    
                                    </textarea>
                                    </div> 
                                    <input type="hidden" name="id_category" value="<?= $data['category']->id_category?>" >                                                      
                                        <input type="submit" class="btn btn-primary" name="edit" value="Ajouter">
                                </fieldset>
                                </form>                        
                            </div> 
                        <div class="col-lg-4"></div>
                    </div>
                </div>                
            </section>
        </div>
<?php require ROOT . '/views/includes/footer.php';?>
