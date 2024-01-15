<?php require (ROOT.'views/includes/head.php'); ?>
<!-- Inclusion de l'en-tête de la page -->

<body>    
    <!-- Corps de la page -->
    <?php require (ROOT.'views/includes/header.php'); ?>    
    <!-- Inclusion de l'en-tête du site -->

    <?php echo '<a href="'.WWW_ROOT.'categories/listCategory" class="nav-link">Catégories</a></li>'; ?> 
    <!-- Lien vers la page "listCategory" avec le texte "Catégories" -->
    <br>
    <?php echo '<a href="'.WWW_ROOT.'contents/listContent" class="nav-link">Contenus</a></li>'; ?>
    <!-- Lien vers la page "listContent" avec le texte "Contenus" -->
    <br>
    <?php echo '<a href="'.WWW_ROOT.'users/listUser" class="nav-link">Utilisateurs</a></li>'; ?>
    <!-- Lien vers la page "listUser" avec le texte "Utilisateurs" -->
</body>
