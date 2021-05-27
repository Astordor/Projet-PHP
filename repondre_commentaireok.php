<!DOCTYPE html>
<html>

    <body>

        <!-- Head -->

        <?php include("head.php"); ?>

        <!-- Body -->

        <div id="body">            
            <?php
                $connect = mysqli_connect("localhost", "root", "", "test");
                if ($connect) {
                    
                } else {
                    echo "echec de connexion" . mysqli_connect_error() . "<br/>";
                }
                if (isset($_POST["reponse"])) {
                    $req = "update commentaires set reponse=? where commentaire_id =?";
                    $res = mysqli_prepare($connect, $req);
                    $var = mysqli_stmt_bind_param($res, 'ss', $reponse, $commentaire_id);
                    $reponse = $_POST['reponse'];
                    $commentaire_id = $_POST['reponse_id'];
                    $var = mysqli_stmt_execute($res);
                    if ($var == false) {
                        echo"echec de l'exécution de la requête.<br/>";
                    } else {
                        echo"Réponse postée !<br/>";
                    }
                    mysqli_stmt_close($res);
                }
                ?>             
        </div>

        <!-- Footer -->

        <?php include("footeradmin.php"); ?>

    </body>
</html>



