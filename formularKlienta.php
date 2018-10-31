<?php
/**
 * Created by PhpStorm.
 * User: vladislavakopalova
 * Date: 8.10.18
 * Time: 19:45
 */


$title = 'Formular';

include "headerOperator.php";
include "database.php";
?>

<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h1 align="center"><span class="glyphicon glyphicon-log-in"></span> Formulár pre pridanie nového člena</h1>
                <br>

                <form method="post" role="form">
                    <legend>Zadaj osobné udaje</legend>
                    <div class="form-group">
                        <input type="text" name ="meno" class="form-control" placeholder="Meno člena">
                    </div>
                    <div class="form-group">
                        <input type="text" name ="priezvisko" class="form-control" placeholder="Priezvisko člena">
                    </div>
                    <div class="form-group">
                        <input type="text" name ="ulica" class="form-control" placeholder="Ulica">
                    </div>
                    <div class="form-group">
                        <input type="text" name ="mesto" class="form-control" placeholder="Mesto">
                    </div>

                    <div class="form-group ">
                        <input type="text" name ="psc" class="form-control" placeholder="Psč">
                    </div>

                    <div align="center">
                        <input formmethod="post" type="submit" name="submit" class="btn btn-secondary" value="Pridaj člena">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>ć


<?php
if (isset($_POST['submit'])) {

    $db = new database();
    $db->pripoj();

    $meno = strip_tags($_POST['meno']);
    $priezvisko = strip_tags($_POST['priezvisko']);
    $mesto = strip_tags($_POST['mesto']);
    $ulica = strip_tags($_POST['ulica']);
    $psc = strip_tags($_POST['psc']);
    $datumPlatby = date('y-m-d');

    if($meno&&$priezvisko&&$mesto&&$ulica&&$psc&&$datumPlatby){
        $test=$db->posliPoziadavku("INSERT INTO klient(meno,priezvisko,ulica,mesto,psc,datumLastPlatby) VALUES ('$meno','$priezvisko','$ulica','$mesto','$psc','$datumPlatby')");
        echo "<script type='text/javascript'>alert('Klient bol úspešne pridaný');</script>";

    } else{
        echo "<script type='text/javascript'>alert('Zadajte všetky údaje');</script>";

    }

}
?>
