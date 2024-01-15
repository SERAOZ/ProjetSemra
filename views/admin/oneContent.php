<?php require (ROOT.'views/includes/head.php'); ?>
<!-- Inclusion de l'en-tête de la page -->

<body>
    
<?php require (ROOT.'views/includes/header.php'); ?> 
<!-- Inclusion de l'en-tête du site -->

<div class="container-fluid">
   
<div class=" mb-3">  
    <div class="mx-auto">
      <h5 class="my-3"><?php echo "Titre : ".$data['content']->title; ?> </h5>
        <!-- Affichage du titre du contenu -->
        <p class="my-3"><?php echo "Résumé : ".$data['content']->content_text; ?></p>
        <!-- Affichage du résumé du contenu -->
    </div>  
        <div class="mx-auto">
          <h5 class="my-3"><?php echo "Catégorie : ".$data['content']->name; ?></h5>
          <!-- Affichage de la catégorie du contenu -->
        </div>
    </div>
</div>

<?php require (ROOT.'views/includes/footer.php'); ?> 
<!-- Inclusion du pied de page -->
</body>
