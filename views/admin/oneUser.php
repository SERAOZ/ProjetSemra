<?php require (ROOT.'views/includes/head.php'); ?>
<body>
    
<?php require (ROOT.'views/includes/header.php'); ?> 

<div class="container-fluid">
   
<div class="card mb-3">
  <h3 class="card-header">Membre</h3>
  <div class="card-body">
    <h5 class="card-title"><?php echo "Nom: ".$data['user']->username; ?> </h5>
    <h6 class="card-subtitle text-muted "> Rôle:  <?php if ($data['user']->is_admin == 1){echo "Administrateur ";}else {echo "Membre inscrit ";}?></h6>
  </div>  
  <div class="card-body">
    <h4><?php echo "Email: ".$data['user']->email; ?></h4>   
  </div>
  <div class="card-body">
  <?php echo '<td><a  href="'.WWW_ROOT .'users/formUser/'.$data['user']->user_id.'"> 
        Modifier</a> '?>  
  </div>
</div>
</div>


<?php require (ROOT.'views/includes/footer.php'); ?> 
</body>