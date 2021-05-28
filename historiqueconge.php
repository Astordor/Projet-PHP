<?php session_start(); ?>
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
                $sql = "SELECT * FROM conges";
                $result = $connect->query($sql);
                ?>            
                <table>
                    <thead> <!-- En-tête du tableau -->
                    <table border="1" style="line-height:25px;">
                        <tr>
                            <th>Type de congé</th>
                            <th>Date de demande</th>
                            <th>Date de début</th>
                            <th>Date de fin</th>
                            <th>Nombre de jours</th>
                            <th>Etat du congé</th>
                            <th>Commentaire du directeur</th>
                        </tr>
                        </thead>

                        <tbody> <!-- Corps du tableau -->
                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    if ($row['mail#'] == $_SESSION['login']) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row['type_conge']; ?></td>
                                            <td><?php echo $row['date_demande']; ?></td>
                                            <td><?php echo $row['date_debut']; ?></td>
                                            <td><?php echo $row['date_fin']; ?></td>
                                            <td><?php echo $row['nbr_jours']; ?></td>
                                            <?php if ($row['etat'] == 1) { ?>
                                                <td>Congé accordé</td>
                                            <?php } else { ?>
                                                <td>Congé refusé</td>
                                            <?php }?>
                                                <td><?php echo $row['commentaire']; ?></td>
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
                            <?php include("footeruser.php"); ?>

                            </body>
                            </html>
