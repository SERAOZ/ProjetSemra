<header>
<nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="<?php echo WWW_ROOT; ?>public/img/womenInData.jpg" alt="Web Logo">                
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item hidden-on-small-screen">
                        <a class="nav-link" href="<?php echo WWW_ROOT; ?>">Home</a>
                    </li>
                        <li class="nav-item hidden-on-small-screen">
                    <?php
                    //printr ( $_SESSION , $name = 'session' );
                    if(isset($_SESSION['is_admin']) && $_SESSION['is_admin']== 1){                        
                        
                        echo '<li class="nav-item">';
                        echo '<a href="'.WWW_ROOT.'pages/gestion" class="nav-link">Gestion</a></li>';
                        echo '<li class="nav-item">';
                        echo '<a href="'.WWW_ROOT.'users/logout" class="nav-link">Déconnexion</a></li>';
                        echo '<li class="nav-item ms-5 ps-5"><span class="nav-link">'.$_SESSION['username'].', vous êtes connecté(e) comme Administrateur.</span></li>';  
                    }else if(isset($_SESSION['user_id']) && $_SESSION['is_admin']== 0){
                        echo '<li class="nav-item">';
                        echo '<a href="'.WWW_ROOT.'users/oneUser/'.$_SESSION['user_id'].'" class="nav-link">Profil</a></li>';
                        echo '<a href="'.WWW_ROOT.'users/logout" class="nav-link">Déconnexion</a></li>';
                        echo '<li class="nav-item ms-5 ps-5"><span class="nav-link">'.$_SESSION['username'].', vous êtes connecté(e) comme membre.</span></li>';   
                    }else{
                        echo '<li class="nav-item mr-3">
                        <a class="nav-link" href="'. WWW_ROOT.'users/register">Inscription</a></li>';
                        echo '<li class="nav-item">
                        <a class="nav-link" href="'. WWW_ROOT.'users/connexion">Connexion</a></li>';
                    }
                    
                    ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>