<!DOCTYPE html>
<html>

    <body>

        <!-- Head -->

        <?php include("head.php"); ?>

        <!-- Body -->

        <div id="body">            
            <form method="post" action="selfmodification.php">  
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
                            <th>Numéro de téléphone</th>
                            <th>Date d'embauche</th>
                            <th>RTTs restants</th>
                            <th>Congés payés restants</th>
                            <th>Code postal</th>
                            <th>Ville</th>
                            <th>Rue</th>
                            <th>Nationalité</th>
                            <th>Sexe</th>
                            <th>Situation familiale</th>
                            <th>Age</th>
                        </tr>
                        </thead>

                        <tbody> <!-- Corps du tableau -->
                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    if ($row['mail'] == 'Mister2@esme.fr') { //need update
                                        ?>
                                        <tr>
                                            <td><?php echo $row['mail']; ?></td>
                                            <td><?php echo $row['nom']; ?></td>
                                            <td><?php echo $row['prenom']; ?></td>
                                            <td><?php echo $row['fonction']; ?></td>
                                            <td><?php echo $row['contrat']; ?></td>
                                            <td><?php echo $row['telephone']; ?></td>
                                            <td><?php echo $row['date_embauche']; ?></td>
                                            <td><?php echo $row['RTT']; ?></td>
                                            <td><?php echo $row['CP']; ?></td>
                                            <td><?php echo $row['code_postal']; ?></td>
                                            <td><?php echo $row['ville']; ?></td>
                                            <td><?php echo $row['rue']; ?></td>
                                            <td><?php echo $row['nationalite']; ?></td>
                                            <td><?php echo $row['sexe']; ?></td>
                                            <td><?php echo $row['situation_familiale']; ?></td>
                                            <td><?php echo $row['age']; ?></td>
                                        </tr>
                                        <?php
                                    }
                                }
                            }
                            ?>
                        <tbody>

                        <table>
                            </div>

                            <!-- Footer -->
                            </br><input type="submit" value="Modifier"/></br></br>
                            <?php include("footeruser.php"); ?>

                            </body>
                            </html>
