<?php session_start(); ?>
<!DOCTYPE html>
<html>

    <body>

        <!-- Head -->

        <?php include("head.php"); ?>

        <!-- Body -->

        <div id="body">            
            <form method="post" action="modifierok.php">

                <p>
                    Nom :
                    <input type="text" name="nom"/></br></br>
                    Prénom :
                    <input type="text" name="prenom"/></br></br>
                    Numéro de téléphone :
                    <input type="text" name="telephone" pattern="^\d{10}$"/></br></br>
                    Type de contrat* :
                    <select name="contrat">
                        <option value="CDI">CDI</option>
                        <option value="CDD">CDD</option>
                    </select>
                    </br></br>Code postal :
                    <input type="text" name="code_postal"/></br></br>
                    Ville :
                    <input type="text" name="ville"/></br></br>
                    Rue :
                    <input type="text" name="rue"/></br></br>                   
                    Situation familiale :
                    <input type="text" name="situation_familiale"/></br></br>
                    Age :
                    <input type="text" name="age"/></br></br>
                    <input type="hidden" name="mail" value=<?php echo $_GET['value'] ?>>
                    <input type="submit" value="Valider"/></br></br>
                </p>

        </div>

        <!-- Footer -->

        <?php include("footeradmin.php"); ?>

    </body>
</html>

