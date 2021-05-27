<!DOCTYPE html>
<html>

    <body>

        <!-- Head -->

        <?php include("head.php"); ?>

        <!-- Body -->

        <div id="body">
            <form method="post" action="suppression.php">
                <a href="ajoutersalarie.php">Ajouter un salarié</a>    
                <?php
                $connect = mysqli_connect("127.0.0.1", "root", "", "test");
                $sql = "SELECT * FROM informations";
                $result = $connect->query($sql);
                ?>            
                <table>
                    <thead> <!-- En-tête du tableau -->
                    <table border="1" style="line-height:25px;">
                        <tr>
                            <th>Adresse mail</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Fonction</th>
                            <th>Type contrat</th>
                            <th>Modification</th>
                            <th>Consultation des commentaires</th>
                            <th>Suppression</th>
                        </tr>
                        </thead>

                        <tbody> <!-- Corps du tableau -->
                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    if ($row['admin'] != 1) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row['mail']; ?></td>
                                            <td><?php echo $row['nom']; ?></td>
                                            <td><?php echo $row['prenom']; ?></td>
                                            <td><?php echo $row['fonction']; ?></td>
                                            <td><?php echo $row['contrat']; ?></td>
                                            <td><a href="modifieruser.php?value=<?php echo $row['mail'] ?>">Modifier</a></td>
                                            <td><a href="consultationcommentaires.php?value=<?php echo $row['mail'] ?>">Consulter</a></td>
                                            <td><input type="checkbox" name="case[]" value=<?php echo $row['mail']; ?> /></td>
                                        </tr>
                                        <?php
                                    }
                                }
                            }
                            ?>                    
                        </tbody>
                    </table>                   
                    </div>

                    <!-- Footer -->
                    </br><input type="submit" value="Supprimer"/></br></br>
                    <?php include("footeradmin.php"); ?>

                    </body>
                    </html>                  
