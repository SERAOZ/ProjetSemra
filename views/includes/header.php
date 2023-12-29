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
                    echo '<li class="nav-item mr-3">
                        <a class="nav-link" href="'. WWW_ROOT.'users/register">Inscription</a></li>';
                        echo '<li class="nav-item">
                        <a class="nav-link" href="'. WWW_ROOT.'users/connexion">Connexion</a></li>';
                    ?>
                </li>
                </ul>
            </div>
        </div>
    </nav>
</header>