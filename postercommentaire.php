<?php session_start(); ?>
<!DOCTYPE html>
<html>

    <body>

        <!-- Head -->

        <?php include("head.php"); ?>

        <!-- Body -->

        <div id="body">            
            <form method="post" action="postercommentaire.php">
                <p>
                    Poster un commentaire :
                    </br></br><textarea name="commentaire" rows="8" cols="45"></textarea>
                    </br><input type="submit" value="Poster"/></br></br>                    
                </p>
                <?php
                $connect = mysqli_connect("localhost", "root", "", "test");
                if ($connect) {
                    
                } else {
                    echo "echec de connexion" . mysqli_connect_error() . "<br/>";
                }
                if (isset($_POST["commentaire"])) {
                    $req = "insert into `commentaires` (`mail#` ,`commentaire`) values (?,?)";
                    $res = mysqli_prepare($connect, $req);
                    $var = mysqli_stmt_bind_param($res, 'ss', $mail, $commentaire);
                    $mail = $_SESSION['login'];
                    $commentaire = $_POST["commentaire"];
                    $var = mysqli_stmt_execute($res);
                    if ($var == false) {
                        echo"echec de l'exécution de la requête.<br/>";
                    } else {
                        echo"Commentaire posté !<br/>";
                    }
                    mysqli_stmt_close($res);
                }
                ?>
        </div>

        <!-- Footer -->

        <?php include("footeruser.php"); ?>

    </body>
</html>

