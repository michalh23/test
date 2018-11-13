<?php
/**
 * Created by PhpStorm.
 * User: vladislavakopalova
 * Date: 8.10.18
 * Time: 19:45
 */


$title = 'Editovanie';

//najskôr sa zobrazí zoznam
include "zoznamKlientov.php";
?>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <br>

        <form method="post" role="form">
            <legend>Zadaj číslo klienta:</legend>
            <div class="form-group">
                <input type="text" name ="cisloKlienta" class="form-control" placeholder="Klientske cislo">
            </div>
            <div align="center" >
                <input formmethod="post" type="submit" name="submit" class="btn btn-secondary" value="Uprav člena">
                <input formmethod="post" onclick="zmaz()" type="submit" name="delete" class="btn btn-secondary"  value="Zmaž člena">
            </div>
        </form>
    </div>
</div>

<script>
    function zmaz() {
        var txt;
        if (confirm("Skutočne chcete zmazať klienta?")) {
            txt = "Áno";
            <?php
                $klientskeCislo= strip_tags($_POST['cisloKlienta']);
                $db->posliPoziadavku("DELETE * FROM klient where klientskeCislo = $klientskeCislo");
            ?>
        } else {
            txt = "Zruš";
        }
        document.getElementById("demo").innerHTML = txt;
    }
</script>