<!DOCTYPE html>
<html>

    <body>

        <!-- Head -->

        <?php include("head.php"); ?>

        <!-- Body -->

        <div id="body">            
            <form method="post" action="gestionsalaries.php">

                <p>
                    Nom* :
                    <input type="text" name="nom"/></br></br>
                    Prénom* :
                    <input type="text" name="prenom"/></br></br>
                    Adresse mail* :
                    <input type="email" name="mail"/></br></br>
                    Numéro de téléphone* :
                    <input type="tel" name="telephone"/></br></br>
                    Fonction* :
                    <select name="fonction">
                        <option value="Enseignant">Enseignant</option>
                        <option value="Personnel administratif">Personnel administratif</option>
                    </select>
                    </br></br>Type de contrat* :
                    <select name="contrat">
                        <option value="CDI">CDI</option>
                        <option value="CDD">CDD</option>
                    </select>
                    </br></br>Date d'embauche* :
                    <input type="date" name="date_embauche"/></br></br>
                    RTT restants* :
                    <input type="text" name="RTT"/></br></br>
                    Congés payés restants* :
                    <input type="text" name="CP"/></br></br>
                    Code postal :
                    <input type="text" name="code_postal"/></br></br>
                    Ville :
                    <input type="text" name="ville"/></br></br>
                    Rue :
                    <input type="text" name="rue"/></br></br>
                    Nationalité :
                    <input type="text" name="nationalité"/></br></br>
                    Sexe :
                    <input type="text" name="sexe"/></br></br>
                    Situation familiale :
                    <input type="text" name="situation_familiale"/></br></br>
                    Age :
                    <input type="text" name="age"/></br></br>

                    <input type="submit" value="Valider"/></br></br>
                </p>
        </div>

        <!-- Footer -->

        <?php include("footeradmin.php"); ?>

    </body>
</html>