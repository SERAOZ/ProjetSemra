<?php
   require (ROOT.'views/includes/head.php');
?>
 <body>

    <div class="container-fluid">
        
        <div class="col-md-12">
            <?php
            require (ROOT.'views/includes/header.php');
            ?>
        
             <section class="col-sm-12 col-md-9 my-5">
                <div class="container">
                    
                    <div class="col-md-12">
                        <h5>Catégories</h5>
                        <a  href="'.WWW_ROOT .'categories/addCategory'">
                        Ajouter Catégorie</a>
                        <table class="table table-hover">
                            <thead>
                                <tr class="table-active">
                                <th scope="col">ID </th>
                                <th scope="col">Nom </th>
                                <th scope="col">Description</th>
                                <th scope="col">Action</th>    
                                </tr>
                            </thead>
                            <tbody>
                                <?php                       
                                foreach($data['categories'] as $category){
                                   
                                        echo "<tr>";//affiche en boucle les données de la table
                                        echo "<td>".$category->id_category."</td>";
                                        echo "<td>".$category->name."</td>";
                                        echo "<td>".$category->description."</td>";
                                                                            
                                        echo '<td><a  href="'.WWW_ROOT .'categories/formCategory/'.$category->$id_category.'">
                                        Modifier</a>
                                        <a  href="'.WWW_ROOT .'categories/deleteCategory/'.$category->$id_category.'">
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


        <?php
        require ROOT . '/views/includes/footer.php';
        ?>
