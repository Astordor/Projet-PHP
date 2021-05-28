<?php session_start(); ?>
<!DOCTYPE html>
<html>

    <body>

        <!-- Head -->

        <?php include("head.php"); ?>

        <!-- Body -->

        <div id="body">            
            <form method="post" action="repondre_commentaireok.php">
                <p>
                    Répondre au commentaire :
                    </br></br><textarea name="reponse" rows="8" cols="45"></textarea>
                    <input type="hidden" name = "reponse_id" value=<?php echo $_GET['value']?>>
                    </br><input type="submit" value="Poster"/></br></br>                    
                </p>               
        </div>

        <!-- Footer -->

        <?php include("footeradmin.php"); ?>

    </body>
</html>