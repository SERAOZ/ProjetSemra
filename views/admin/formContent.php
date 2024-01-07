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
                                <h5>Modifier Contenu</h5>
                                <form action="<?php echo WWW_ROOT;?>contents/updateContent" method="Post">
                                <fieldset>
                                <div class="form-group">  
                                <?php 
                                echo ' <label for="category">Categorie</label>
                                <select class="form-control" id="category" name="id_category">';
                                echo '<option value="'.$data["content"]->id_category.'">'.$data["content"]->name.'</option>';
                                foreach($data['categories'] as $category){
                                    echo '<option value="'.$category->id_category.'">'.$category->name.'</option>'; 
                                }
                                echo '</select>';
                                ?>
                            </div>
                                    <div class="form-group">
                                        <label for="title"> Titre</label>
                                        <input type="text" class="form-control" id="title" name="title" value="<?= $data['content']->title ?>"required>
                                    </div>
                                    <div class="form-group">
                                        <label for="content_text">Texte du contenu</label>
                                        <textarea id="content_text" name="content_text" rows="3" cols="33" required>                             
                                        <?php echo $data['content']->content_text;?>    
                                    </textarea>
                                    </div>
                                        <input type="hidden" name="id_content" value="<?= $data['content']->id_content?>" >                                                       
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
