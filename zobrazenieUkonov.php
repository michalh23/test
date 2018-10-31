<?php
/**
 * Created by PhpStorm.
 * User: misoh
 * Date: 30.10.2018
 * Time: 19:00
 */

$title = 'Zoznam úkonov';

include "index.php";
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

<table id="tabulkaUkonov" align="center">
    <h1 style="color: dimgrey; text-align: center;">Zoznam všetkých úkonov</h1>
    <br><br>

    <tr>
        <th>Kód služby</th>
        <th>Názov služby</th>
        <th>Poplatok</th>
        <th>Číslo poskytovateľa</th>


    </tr>



<?php


$klientovia = $db->posliPoziadavku("SELECT * FROM sluzba");
$numrows = mysqli_num_rows($klientovia);
if ($numrows!= 0){
    while($row = mysqli_fetch_assoc($klientovia)) {
        ?>
        <tr>
            <td><?php echo $row["kodSluzby"];?></td>
            <td><?php echo $row["nazov"];?></td>
            <td><?php echo $row["poplatok"];?></td>
            <td><?php echo $row["cisloPoskytovatela"];?></td>
        </tr>
        <?php
    }
    echo "</table>";

}
$db->odpoj();

/*function find_client_by_id($client_id) {
    global $connection;

    $safe_client_id = mysqli_real_escape_string($connection, $client_id);

    $query = "SELECT * FROM klient WHERE id = {$safe_client_id} LIMIT 1";
    $client_set = mysqli_query($connection, $query);
    if($client = mysqli_fetch_assoc($client_set)) {
        return $client;
    } else {
        return null;
    }
}*/
?>

<br><br>
