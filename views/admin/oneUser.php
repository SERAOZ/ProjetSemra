<?php require (ROOT.'views/includes/head.php'); ?>
<!-- Inclusion de l'en-tête de la page -->
<body>    
  <?php require (ROOT.'views/includes/header.php'); ?> 
    <!-- Inclusion de l'en-tête du site -->

<div class="container-fluid">   
  <div class="card mb-3">
    <!-- Crée une carte (card) -->
    <h3 class="card-header">Membre</h3>
      <!-- En-tête de la carte -->
      <div class="card-body">
      <!-- Corps de la carte -->
      <h5 class="card-title"><?php echo "Nom: ".$data['user']->username; ?> </h5>
      <!-- Affiche le nom de l'utilisateur -->
      <h6 class="card-subtitle text-muted "> Rôle:  <?php if ($data['user']->is_admin == 1){echo "Administrateur ";}else {echo "Membre inscrit ";}?></h6>
      <!-- Affiche le rôle de l'utilisateur (Administrateur ou Membre inscrit) en fonction de la valeur de is_admin -->
  </div>  
      <div class="card-body">
        <h4><?php echo "Email: ".$data['user']->email; ?></h4>   
        <!-- Affiche l'adresse e-mail de l'utilisateur -->
      </div>
          <div class="card-body">
            <?php echo '<td><a  href="'.WWW_ROOT .'users/formUser/'.$data['user']->user_id.'"> 
            Modifier</a> '?>  
            <!-- Affiche un lien pour modifier l'utilisateur (redirige vers la page de modification de l'utilisateur) -->
          </div>
  </div>
</div>
<?php require (ROOT.'views/includes/footer.php'); ?> 
<!-- Inclusion du pied de page -->
</body>
