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
            <form method="post" action="gestionconges.php">
                <input type="hidden" name="OK" value="Valider"/>
                <?php
                $connect = mysqli_connect("127.0.0.1", "root", "", "test");
                $sql = "SELECT * FROM conges";
                $result = $connect->query($sql);
                ?>            
                <table>
                    <thead> <!-- En-tête du tableau -->
                    <table border="1" style="line-height:25px;">
                        <tr>
                            <th>Adresse mail</th>
                            <th>Type de congé</th>
                            <th>Date de demande</th>
                            <th>Début du congé</th>
                            <th>Fin du congé</th>
                            <th>Nombre de jours demandés</th>
                            <th>État</th>
                            <th>Commenter la décision</th>
                        </tr>
                        </thead>

                        <tbody> <!-- Corps du tableau -->
                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    if ($row['etat'] == "") {
                                        if (!isset($_POST[$row['demande_id']])) {
                                            ?>
                                            <tr>
                                            <?php } elseif ($_POST[$row['demande_id']] == 1) { ?>
                                            <tr style="background-color:green">
                                            <?php } elseif ($_POST[$row['demande_id']] == 0) { ?>
                                            <tr style="background-color:red">
                                            <?php } ?>
                                            <td><?php echo $row['mail#']; ?></td>
                                            <td><?php echo $row['type_conge']; ?></td>
                                            <td><?php echo $row['date_demande']; ?></td>
                                            <td><?php echo $row['date_debut']; ?></td>
                                            <td><?php echo $row['date_fin']; ?></td>
                                            <td><?php echo $row['nbr_jours']; ?></td>
                                            <td><select name=<?php echo $row['demande_id'] ?>>
                                                    <option value=1>Validé</option>
                                                    <option value=0>Refusé</option>
                                                </select></td>
                                        <?php } elseif ($row['etat'] == 1) { ?>
                                        <tr style="background-color:green">

                                            <td><?php echo $row['mail#']; ?></td>
                                            <td><?php echo $row['type_conge']; ?></td>
                                            <td><?php echo $row['date_demande']; ?></td>
                                            <td><?php echo $row['date_debut']; ?></td>
                                            <td><?php echo $row['date_fin']; ?></td>
                                            <td><?php echo $row['nbr_jours']; ?></td>
                                            <td>Validé</td>
                                        <?php } elseif ($row['etat'] == 0) { ?>
                                        <tr style="background-color:red">

                                            <td><?php echo $row['mail#']; ?></td>
                                            <td><?php echo $row['type_conge']; ?></td>
                                            <td><?php echo $row['date_demande']; ?></td>
                                            <td><?php echo $row['date_debut']; ?></td>
                                            <td><?php echo $row['date_fin']; ?></td>
                                            <td><?php echo $row['nbr_jours']; ?></td>
                                            <td>Refusé</td>
                                        <?php } ?>
                                        <?php if ($row['commentaire'] == "") { ?>
                                            <td><textarea name=<?php echo $row['demande_id'] . "a" ?> rows="3" cols="45"></textarea></td>
                                        <?php } else { ?>  
                                            <td><?php echo $row['commentaire']; ?></td>
                                        <?php } ?>                                           
                                    </tr>
                                    <?php
                                    if (isset($_POST['OK'])) {
                                        $req = "update conges set etat=?, commentaire=? where demande_id =?";
                                        $res = mysqli_prepare($connect, $req);
                                        $var = mysqli_stmt_bind_param($res, 'sss', $etat, $commentaire, $demande_id);
                                        if ($row['etat'] == "") {
                                            $etat = $_POST[$row['demande_id']];
                                            if ($etat == 1) {
                                                $a = $etat;
                                            }
                                        } else {
                                            $etat = $row['etat'];
                                            $a = 3;
                                        }
                                        if ($row['commentaire'] == "") {
                                            $commentaire = $_POST[$row['demande_id'] . "a"];
                                        } else {
                                            $commentaire = $row['commentaire'];
                                        }
                                        $demande_id = $row['demande_id'];
                                        $var = mysqli_stmt_execute($res);

                                        if ($var == false) {
                                            echo "echec de l'exécution de la requête.<br/>";
                                        }
                                        if ($a == 1) {
                                            if ($row['type_conge'] == "RTT") {
                                                $req2 = "SELECT * FROM informations where mail ='" . $row['mail#'] . "'";
                                                $result2 = $connect->query($req2);
                                                $row2 = $result2->fetch_assoc();
                                                $req = "update informations set RTT=? where mail ='" . $row['mail#'] . "'";
                                                $res = mysqli_prepare($connect, $req);
                                                $var = mysqli_stmt_bind_param($res, 's', $RTT);
                                                $RTT = $row2['RTT'] - (int) $row['nbr_jours'];
                                                $var = mysqli_stmt_execute($res);
                                            } elseif ($row['type_conge'] == "CP") {
                                                $req3 = "SELECT * FROM informations where mail ='" . $row['mail#'] . "'";
                                                $result3 = $connect->query($req3);
                                                $row3 = $result3->fetch_assoc();
                                                $req = "update informations set CP=? where mail ='" . $row['mail#'] . "'";
                                                $res = mysqli_prepare($connect, $req);
                                                $var = mysqli_stmt_bind_param($res, 's', $CP);
                                                $CP = $row3['CP'] - (int) $row['nbr_jours'];
                                                $var = mysqli_stmt_execute($res);
                                            }
                                        }
                                    }
                                }
                            }
                            ?>                    
                        </tbody>
                    </table>
                    <?php ?>
                    </div>

                    <!-- Footer -->
                    </br><input type="submit" value="Valider"/></br></br>
                    <?php include("footeradmin.php"); ?>

                    </body>
                    </html>                  