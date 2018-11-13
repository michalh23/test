<?php
/**
 * Created by PhpStorm.
 * User: peter
 * Date: 29. 10. 2018
 * Time: 17:41
 */
include "index.php";
include "database.php";

if (isset($_POST['submit'])) {

    $db = new database();
    $db->pripoj();

    $datumVykonania = date($_POST['datumVykonaniaSluzby']);
    $cisloPoskytovatela = strip_tags($_POST['cisloPoskytovatela']);
    $cisloKlienta = strip_tags($_POST['cisloKlienta']);
    $kodSluzby = strip_tags($_POST['kodSluzby']);
    $komentar = strip_tags($_POST['komentar']);
    $aktualnyDatum = date('y-m-d');

    if($datumVykonania&&$cisloPoskytovatela&&$cisloKlienta&&$kodSluzby&&$komentar){
        $db->posliPoziadavku("INSERT INTO objednavka(DatumPoskytnutiaObjednavky,komentar,cisloPoskytovatela,klientskeCislo,kodSluzby,datumPrijatiaDoPC,datumVytvoreniaObjednavky)
                          VALUES ('$datumVykonania','$komentar','$cisloPoskytovatela','$cisloKlienta','$kodSluzby','$datumVykonania','$aktualnyDatum')");
        echo "<script type='text/javascript'>alert('Faktura bola úspešne pridaná');</script>";

    } else{
        echo "<script tśype='text/javascript'>alert('Zadajte všetky údaje');</script>";

    }

}
?>

<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h1 align="center"></span> Formulár pre pridanie novej faktúry</h1>
                <br>

                <form method="post" role="form">
                    <legend>Zadaj údaje o faktúre</legend>
                    <div class="form-group">
                        <input type="text" name ="datumVykonaniaSluzby" class="form-control" placeholder="Dátum vykonania služby (YYYY-MM-DD)">
                    </div>
                    <div class="form-group">
                        <input type="text" name ="cisloPoskytovatela" class="form-control" placeholder="Číslo poskytovateľa">
                    </div>
                    <div class="form-group">
                        <input type="text" name ="cisloKlienta" class="form-control" placeholder="Číslo klienta">
                    </div>
                    <div class="form-group">
                        <input type="text" name ="kodSluzby" class="form-control" placeholder="Kód služby">
                    </div>

                    <div class="form-group ">
                        <textarea  name ="komentar" class="form-control" placeholder="Komentár" cols="30" rows="10"></textarea>
                    </div>

                    <div align="center">
                        <input formmethod="post" type="submit" name="submit" class="btn btn-secondary" value="Pridaj faktúru">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>