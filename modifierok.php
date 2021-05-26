<!DOCTYPE html>
<html>

    <body>

        <!-- Head -->

        <?php include("head.php"); ?>

        <!-- Body -->

        <div id="body">            
            Modifications enregistrées
            <?php
            if (isset($_POST["nom"])) {
                $connect = mysqli_connect("127.0.0.1", "root", "", "test");
                $req = "update informations set telephone=?,code_postal=?, ville=?, rue=?, situation_familiale=?, contrat=?, nom=?, prenom=?, age=? where mail =?";
                $res = mysqli_prepare($connect, $req);
                $var = mysqli_stmt_bind_param($res, 'ssssssssss', $telephone, $code_postal, $ville, $rue, $situation_familiale, $contrat, $nom, $prenom, $age, $mail);
                $telephone = $_POST['telephone'];
                $code_postal = $_POST['code_postal'];
                $ville = $_POST['ville'];
                $rue = $_POST['rue'];
                $situation_familiale = $_POST['situation_familiale'];
                $contrat = $_POST['contrat'];
                $nom = $_POST['nom'];
                $prenom = $_POST['prenom'];
                $age = $_POST['age'];
                $mail = $_POST['mail'];
                $var = mysqli_stmt_execute($res);

                if ($var == false) {
                    echo "echec de l'exécution de la requête.<br/>";
                }
                mysqli_stmt_close($res);
            }
            ?>
        </div>

        <!--Footer-->
        <a href="gestionsalaries.php">Retour à la page de gestion des salariés</a>
        <?php include("footeradmin.php");
        ?>

    </body>
</html>


