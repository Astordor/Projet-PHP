<!DOCTYPE html>
<html>

    <body>

        <!-- Head -->

        <?php include("head.php"); ?>

        <!-- Body -->

        <div id="body">
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
                        <th>Suppression</th>
                    </tr>
                    </thead>

                    <tbody> <!-- Corps du tableau -->
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <tr>
                                    <td><?php echo $row['mail']; ?></td>
                                    <td><?php echo $row['nom']; ?></td>
                                    <td><?php echo $row['prenom']; ?></td>
                                    <td><?php echo $row['fonction']; ?></td>
                                    <td><?php echo $row['contrat']; ?></td>
                                    <td><a href="menuadmin.php">Modifier</a></td>
                                    <td><a href="menuadmin.php">Supprimer</a></td>
                                </tr>
                                <?php
                            }
                        }
                        ?>

                    </tbody>
                </table>
        </div>

        <!-- Footer -->

<?php include("footeradmin.php"); ?>

    </body>
</html>
