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


