<?php
/**
 * Created by PhpStorm.
 * User: misoh
 * Date: 29.10.2018
 * Time: 18:08
 */

$title = 'Formular';

include "index.php";
include "database.php";
?>

<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h1 align="center"><span class="glyphicon glyphicon-log-in"></span> Prihlásenie operátora</h1>
                <br>

                <form method="post" role="form">
                    <legend>Zadaj prihlasovacie meno</legend>
                    <div class="form-group">
                        <input type="text" name ="meno" class="form-control" placeholder="Prihlasovacie meno">
                    </div>
                    <legend>Zadaj heslo</legend>
                    <div class="form-group">
                        <input type="password" name ="heslo" class="form-control" placeholder="Heslo">
                    </div>
                    <div align="center">
                        <input formmethod="post" type="submit" name="submit" class="btn btn-secondary" value="Prihlás">
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>


<?php
if (isset($_POST['submit'])) {

    $db = new database();
    $db->pripoj();

    $meno = strip_tags($_POST['meno']);
    $heslo = strip_tags($_POST['heslo']);


   if($meno == "admin" && $heslo == "admin") {
       header("location: headerOperator.php");

   } else {
       echo "<script type='text/javascript'>alert('Nesprávne meno a heslo');</script>";

   }
}
?>
