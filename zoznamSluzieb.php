<?php
//zoznam všetkych služieb ktoré boli vykonané :)
/**
 * Created by PhpStorm.
 * User: vladislavakopalova
 * Date: 30.10.18
 * Time: 13:19
 *  <th>Kod služby</th>
<th>Klientske cislo</th>
 *                 <td><?php echo $row["kodSluzby"];?></td>
<td><?php echo $row["klientskeCislo"];?></td>
 * test test
 */
include "index.php";
include "database.php";
$db = new database();
$db->pripoj();
?>



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
</style>
<table id="tabulkaKlientov" align="center">
    <h1 style="color: dimgrey; text-align: center;">Zoznam všetkých vykonaných služeb</h1>
    <br><br>

    <tr>
        <th>ID objednavky</th>
        <th>Datum poskytnutia objednávky</th>
        <th>Názov služby</th>

        <th>Cislo poskytovatela</th>
        <th>Meno poskytovatela</th>
        <th>ID klienta</th>
        <th>Meno klienta</th>
        <th>Komentar</th>

    </tr>

    <?php
    $objednavky = $db->posliPoziadavku(
        "SELECT idObjednavka, DatumPoskytnutiaObjednavky, sluzba.nazov, objednavka.cisloPoskytovatela,
                  poskytovatel.meno as menoP, poskytovatel.priezvisko as priezviskoP, objednavka.klientskeCislo, 
                  klient.meno as menoK, klient.priezvisko as priezviskoK, komentar 
        from objednavka JOIN sluzba on (objednavka.kodSluzby = sluzba.kodSluzby) 
        JOIN klient on(objednavka.klientskeCislo = klient.klientskeCislo) 
        JOIN poskytovatel on(poskytovatel.cisloPoskytovatela = objednavka.cisloPoskytovatela) order by idObjednavka");
    $numrows = mysqli_num_rows($objednavky);
    if ($numrows!= 0){
        while($row = mysqli_fetch_assoc($objednavky)) {
            ?>
            <tr>
                <td><?php echo $row["idObjednavka"];?></td>
                <td><?php echo $row["DatumPoskytnutiaObjednavky"];?></td>
                <td><?php echo $row["nazov"];?></td>
                <td><?php echo $row["cisloPoskytovatela"];?></td>
                <td><?php
                    echo $row["menoP"];
                    echo " ";
                    echo $row["priezviskoP"];?></td>
                <td><?php echo $row["klientskeCislo"];?></td>

                <td><?php
                    echo $row["menoK"];
                    echo " ";
                    echo $row["priezviskoK"];?></td>

                <td><?php echo $row["komentar"];?></td>
            </tr>
            <?php
        }
        echo "</table>";
    }
    $db->odpoj();
    ?>