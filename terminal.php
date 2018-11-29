<?php
/**
 * Created by PhpStorm.
 * User: vladislavakopalova
 * Date: 7.10.18
 * Time: 21:03
 */


//session_start();
$title = 'TERMINÁL';
include 'index.php';
include 'database.php';

$db = new database();
$db->pripoj();

?>


<div class="container">
    <form method="post" role="form">
        <h1 class="text-center" style="transform: translateY(-50%); color: black">Nová objednávka</h1>
        <div class="row">
            <div class="col-md-6">
                <h4>Zadaj číslo poskytovateľa</h4>
                <div class="form-group">
                    <input type="text" name ="poskytovatelcislo" class="form-control" placeholder="Tu zadaj číslo">
                </div>
            </div>
            <div class="col-md-6">
                <h4>Zadaj číslo klienta</h4>
                <div class="form-group">
                    <input type="text" name ="klientcislo" class="form-control" placeholder="Tu zadaj číslo">
                </div>


            </div>
            <div align="center">
                <input type="submit" name="submit" class="btn btn-secondary" value="Potvrď ">
            </div>
        </div>
    </form>
</div>

<?php
if (isset($_POST['submit'])) {

    $db = new database();
    $db->pripoj();
    $klientcislo = strip_tags($_POST['klientcislo']);

    $klientovia = $db->posliPoziadavku("Select * from klient where klientskeCislo = $klientcislo");

    $numrows = mysqli_num_rows($klientovia);
    if ($numrows != 0) {
        echo "ZADANE ID JE SPRAVINE";
    }else {
        echo "ZADANE ID NIE JE SPRAVNE";
    }

    $db->odpoj();

}

?>


<div class="container">
    <form method="post" role="form">
        <h1 class="text-center" style="transform: translateY(-50%); color: black">Objednavky klienta</h1>
        <div class="row">
            <div class="col-md-6">
                <h4>Zadaj číslo klienta</h4>
                <div class="form-group">
                    <input type="text" name ="klientcislo" class="form-control" placeholder="Tu zadaj číslo klienta">
                </div>

            </div>
            <div align="center">
                <input type="submit" name="submit2" class="btn btn-secondary" value="Vypis objednavok">
            </div>
        </div>
    </form>
</div>

<table id="tabulkaKlientov" align="center">
    <h1 style="color: dimgrey; text-align: center;">Zoznam sluzieb klienta</h1>
    <br><br>

    <tr>
        <th>Klientske číslo  </th>
        <th>ID objednavky  </th>
        <th>Cislo poskytovatela  </th>
        <th>Kod sluzby  </th>
        <th>Nazov sluzby  </th>
        <th>Poplatok  </th>



    </tr>

    <?php
    if (isset($_POST['submit2'])) {

        $db = new database();
        $db->pripoj();
        $klientcislo = strip_tags($_POST['klientcislo']);
        $suma = 0;

        $klientovia = $db->posliPoziadavku("
SELECT objednavka.idObjednavka, objednavka.cisloPoskytovatela, objednavka.klientskeCislo, 
sluzba.kodSluzby, sluzba.poplatok, sluzba.nazov FROM `objednavka` 
JOIN sluzba ON (objednavka.kodSluzby = sluzba.kodSluzby) 
JOIN klient on (objednavka.klientskeCislo = $klientcislo) group by objednavka.idObjednavka");

        $numrows = mysqli_num_rows($klientovia);
        if ($numrows != 0) {
            while ($row = mysqli_fetch_assoc($klientovia)) {
                $suma += $row["poplatok"];
                ?>
                <tr>
                    <td><?php echo $row["klientskeCislo"]; ?></td>
                    <td><?php echo $row["idObjednavka"]; ?></td>
                    <td><?php echo $row["cisloPoskytovatela"]; ?></td>
                    <td><?php echo $row["kodSluzby"]; ?></td>
                    <td><?php echo $row["nazov"]; ?></td>
                    <td><?php echo $row["poplatok"]; ?></td>

                </tr>

                <?php

            }
            echo "</table>";


        }
        $db->odpoj();

    }


    ?>
    <table id="tabulkaSumy" align="center">
        <br><br>
        <tr>
            <th>SPOLU </th>
        </tr>
        <tr>
            <td><?php echo $suma; ?></td>
        </tr>

    </table>
    <span style="display:block; height: 50px;"></span>

    <style>
        table {
            width: 80%;
            align-content: center;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even){background-color: #f2f2f2}

        th {
            background-color:#004d73;
            color: white;
        }
