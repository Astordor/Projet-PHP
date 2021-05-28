<!DOCTYPE html>
<html>

    <body>

        <!-- Head -->

        <?php include("head.php"); ?>

        <!-- Body -->

        <div id="body">            
            <form method="post" action="selfmodification.php">

                <p>
                    Nom :
                    <input type="text" name="nom"/></br></br>
                    Prénom :
                    <input type="text" name="prenom"/></br></br>
                    Numéro de téléphone :
                    <input type="text" name="telephone"/></br></br>
                    Code postal :
                    <input type="text" name="code_postal"/></br></br>
                    Ville :
                    <input type="text" name="ville"/></br></br>
                    Rue :
                    <input type="text" name="rue"/></br></br>                   
                    Situation familiale :
                    <input type="text" name="situation_familiale"/></br></br>
                    Age :
                    <input type="text" name="age"/></br></br>
                    <input type="hidden" name="mail" value="Mister3@esme.fr" ?>
                    <input type="submit" value="Valider"/></br></br>
                </p>
                <?php
                if (isset($_POST["nom"])) {
                    $connect = mysqli_connect("127.0.0.1", "root", "", "test");
                    $req = "update informations set telephone=?,code_postal=?, ville=?, rue=?, situation_familiale=?, nom=?, prenom=?, age=? where mail =?";
                    $res = mysqli_prepare($connect, $req);
                    $var = mysqli_stmt_bind_param($res, 'sssssssss', $telephone, $code_postal, $ville, $rue, $situation_familiale, $nom, $prenom, $age, $mail);
                    $telephone = $_POST['telephone'];
                    $code_postal = $_POST['code_postal'];
                    $ville = $_POST['ville'];
                    $rue = $_POST['rue'];
                    $situation_familiale = $_POST['situation_familiale'];
                    $nom = $_POST['nom'];
                    $prenom = $_POST['prenom'];
                    $age = $_POST['age'];
                    $mail = "Mister3@esme.fr";
                    $var = mysqli_stmt_execute($res);

                    if ($var == false) {
                        echo "echec de l'exécution de la requête.<br/>";
                    }
                    else{
                        echo "Modifications enregistrées";
                    }
                    
                    mysqli_stmt_close($res);
                }
                ?>

        </div>

        <!-- Footer -->

        <?php include("footeruser.php"); ?>

    </body>
</html>
