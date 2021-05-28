<?php session_start();
if($_SESSION['login']!='directeur@esme.fr'){
    header("Location: accessdenied.php");
}?>
<!DOCTYPE html>
<html>

    <body>

        <!-- Head -->

        <?php include("head.php"); ?>

        <!-- Body -->

        <div id="body">            
            <form method="post" action="suppression_commentaire.php">
                <?php
                $connect = mysqli_connect("127.0.0.1", "root", "", "test");
                $sql = "SELECT * FROM commentaires";
                $result = $connect->query($sql);
                ?>            
                <table>
                    <?php echo "Commentaires de l'utilisateur " . $_GET['value'] ?>
                    <table border="1" style="line-height:25px;">
                        <thead> <!-- En-tête du tableau -->
                            <tr>                       
                                <th>Commentaire</th>
                                <th>Date du commentaire</th>
                                <th>Réponse au commentaire</th>
                                <th>Supprimer</th>
                            </tr>
                        </thead>

                        <tbody> <!-- Corps du tableau -->
                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    if ($row['mail#'] == $_GET['value']) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row['commentaire']; ?></td>
                                            <td><?php echo $row['date_commentaire']; ?></td>
                                            <?php if ($row['reponse'] == "") { ?>
                                                <td><a href="repondre_commentaire.php?value=<?php echo $row['commentaire_id'] ?>">Répondre</a></td>
                                            <?php } else { ?>
                                                <td><?php echo $row['reponse']; ?></td>
                                                <?php } ?>
                                                <td><input type="checkbox" name="case[]" value=<?php echo $row['commentaire_id']; ?> /></td>
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

