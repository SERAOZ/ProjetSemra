<?php require (ROOT.'views/includes/head.php');?>
 <body>
    <div class="container-fluid">        
        <div class="col-md-12">
            <?php require (ROOT.'views/includes/header.php');?>        
             <section class="col-sm-12 col-md-9 my-5">
                <div class="container">                    
                    <div class="col-md-12 ">
                        <h2>Contenue</h2>
                        <?php echo '<a href="'.WWW_ROOT.'contents/addContent" class="btn btn-success my-5">Ajouter Categorie</a>';?>
                        <table class="table table-hover">
                            <thead>
                                <tr class="table-active">
                                <th scope="col">ID </th>
                                <th scope="col">Titre </th>
                                <th scope="col">Texte du Contenu</th>
                                <th scope="col">Date de Publication</th>    
                                </tr>
                            </thead>
                            <tbody>
                                <?php                       
                                foreach($data['contents'] as $content){
                                   
                                        echo "<tr>";//affiche en boucle les données de la table
                                        echo "<td>".$content->id_content."</td>";
                                        echo "<td>".$content->title."</td>";
                                        echo "<td>".$content->content_text."</td>";
                                        echo "<td>".$content->publicationDate."</td>";
                                                                            
                                        echo '<td><a  href="'.WWW_ROOT .'contents/formContent/'.$content->id_content.'">
                                        Modifier</a>
                                        
                                        <a  href="'.WWW_ROOT .'contents/deleteContent/'.$content->id_content.'">
                                        Effacer</a>                                        
                                        </td>';
                                        echo "</tr>";                                                                     
                                    } 
                                    ?>  
                            </tbody>
                        </table><br>                        
                    </div> 
                </div>              
            </section>
        </div>

