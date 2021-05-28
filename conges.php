<?php session_start(); ?>
<!DOCTYPE html>
<html>

    <body>

        <!-- Head -->

        <?php include("head.php"); ?>

        <!-- Body -->

        <div id="body">            
            <form method="post" action="conges.php">
                <p>
                    Formulaire de demande de congé :</br></br>
                    Type de congé : 
                    <select name="type_conge">
                        <option value="RTT">RTT</option>
                        <option value="CP">Congé payé</option>
                    </select>
                    </br></br>Date de début :
                    <input type="date" name="date_debut"/></br></br>
                    Date de fin :
                    <input type="date" name="date_fin"/></br></br>
                    Nombre de jours demandés :
                    <input type="text" name="nbr_jours"/></br></br>                    
                    </br><input type="submit" value="Valider"/></br></br>                    
                </p>
                <?php
                $connect = mysqli_connect("localhost", "root", "", "test");
                if ($connect) {
                    
                } else {
                    echo "echec de connexion" . mysqli_connect_error() . "<br/>";
                }
                if (isset($_POST["type_conge"])) {
                    $req = "insert into `conges` (`mail#` ,`type_conge`,`date_debut`,`date_fin`,`nbr_jours`) values (?,?,?,?,?)";
                    $res = mysqli_prepare($connect, $req);
                    $var = mysqli_stmt_bind_param($res, 'sssss', $mail, $type_conge, $date_debut, $date_fin, $nbr_jours);
                    $mail = "Mister3@esme.fr"; //need update
                    $type_conge = $_POST["type_conge"];
                    $date_debut=$_POST["date_debut"];
                    $date_fin=$_POST["date_fin"];
                    $nbr_jours=$_POST["nbr_jours"];
                    $var = mysqli_stmt_execute($res);
                    if ($var == false) {
                        echo"echec de l'exécution de la requête.<br/>";
                    } else {
                        echo"Demande de congé soumise !<br/>";
                    }
                    mysqli_stmt_close($res);
                }
                ?>
        </div>

        <!-- Footer -->

        <?php include("footeruser.php"); ?>

    </body>
</html>

