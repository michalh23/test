<?php
/**
 * Created by PhpStorm.
 * User: vladislavakopalova
 * Date: 27.12.17
 * Time: 11:04
 */

$title = 'Klienti';

include "headerOperator.php";
include "database.php";
$db =new database();
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
<br><br>
<table id="tabulkaKlientov" align="center">
    <h1 style="color: dimgrey; text-align: center;">Zoznam všetkých klientov</h1>
    <br><br>

    <tr>
        <th>Klientske číslo</th>
        <th>Meno</th>
        <th>Priezvisko</th>
        <th>Ulica</th>
        <th>Mesto</th>
        <th>Psč</th>
        <th>Dátum poslednej platby</th>
        <th></th>
        <th></th>

    </tr>



   <?php


    $klientovia = $db->posliPoziadavku("SELECT * FROM klient");
    $numrows = mysqli_num_rows($klientovia);
    if ($numrows!= 0){
        while($row = mysqli_fetch_assoc($klientovia)) {
            ?>
            <tr>
                <td><?php echo $row["klientskeCislo"];?></td>
                <td><?php echo $row["meno"];?></td>
                <td><?php echo $row["priezvisko"];?></td>
                <td><?php echo $row["ulica"];?></td>
                <td><?php echo $row["mesto"];?></td>
                <td><?php echo $row["psc"];?></td>
                <td><?php echo $row["datumLastPlatby"];?></td>
                <td><span class="glyphicon glyphicon-edit"></span></td>

            </tr>
            <?php
        }
        echo "</table>";

    }
    $db->odpoj();

   function find_client_by_id($client_id) {
       global $connection;

       $safe_client_id = mysqli_real_escape_string($connection, $client_id);

       $query = "SELECT * FROM klient WHERE id = {$safe_client_id} LIMIT 1";
       $client_set = mysqli_query($connection, $query);
       if($client = mysqli_fetch_assoc($client_set)) {
           return $client;
       } else {
           return null;
       }
   }
    ?>

    <br><br>
