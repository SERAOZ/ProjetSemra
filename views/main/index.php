<?php require (ROOT.'views/includes/head.php'); ?>
<body>
    
<?php require (ROOT.'views/includes/header.php'); ?> 

<div class="container-fluid">
    <h1>DEVELOPPEMENT WEB</h1>

    <?php
    
    if($data['contents'] != ""){
      foreach($data['contents'] as $content){
                        echo '
                        <div class="row">
                            <div class="col-md-4 mt-3 w-100>
                                <p class="lead mt-5">CATEGORIE : '.$content->name.'</p>
                                <h4 mt-5>'.$content->title.'</h4><br>
                                
                            </div>
                            <div class="col-md-4  w-100">
                                <h4 class="mt-5">'.$content->content_text.'</h4>
                                <br />
                                <h6>Date de publication'.$content->publicationDate.'</h6>
                                 
                                <a class="btn btn-outline-warning"  href="'.WWW_ROOT.'contents/oneContent/'.$content->id_content.'">Voir</a> 
                            </div>
                        </div>';
                        echo '
                        <div class="card mb-3">
                        <h3 class="card-header">Membre</h3>
                        <div class="card-body">
                          <h5 class="card-title"><?php echo "Nom: "'.$data['user']->username. ' </h5> ' ?>
                          <h6 class="card-subtitle text-muted "> Rôle: <?php if ($data['user']->is_admin == 1){echo "Administrateur ";}else {echo "Membre inscrit ";}?></h6>
                        </div>  
                        <div class="card-body">
                          <h4><?php echo "Email: ".$data['user']->email; ?></h4>   
                        </div>
                        <div class="card-body">
                        <?php echo '<td><a  href="'.WWW_ROOT .'users/formUser/'.$data['user']->user_id.'"> 
                              Modifier</a> '?>  
                        </div>
                      </div> 
                    }  
    }else{
       echo 'il n\'y a pas encore de contenu à publier';
    }
 ?>

</div>

<?php require (ROOT.'views/includes/footer.php'); ?> 
</body>