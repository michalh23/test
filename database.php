<?php
/**
 * Created by PhpStorm.
 * User: vladislavakopalova
 * Date: 7.10.18
 * Time: 21:47
 */
class database{
    private $spojenie;
    private $host;
    private $pouzivatel;
    private $heslo;
    private $nazovDB;

    public function __construct()
    {
        /*$this->spojenie=null;
        $this->host="35.198.174.32:3306";
        $this->pouzivatel="slivka";
        $this->heslo="slivka";
        $this->nazovDB="SLIVKA";*/

        $this->host="localhost";
        $this->pouzivatel="root";
        $this->heslo="";
        $this->nazovDB="cokoholici";
    }

    public function pripoj()
    {
        if ($this->spojenie == null) {
            $this->spojenie = new mysqli($this->host, $this->pouzivatel,
                $this->heslo, $this->nazovDB);

            if ($this->spojenie->connect_error) {
                die("Spojenie zlyhalo: " . $this->spojenie->connect_error);
            }
        }
    }

    public function odpoj()
    {
        if ($this->spojenie != null) { // Odpojit len ak spojenie existuje
            //$this->spojenie->close();
            mysqli_close($this->spojenie);
            $this->spojenie = null;
        }
    }

    public function posliPoziadavku($sqlRetazec)
    {
        if ($this->spojenie != null) {
            $result = mysqli_query($this->spojenie, $sqlRetazec);
            return $result;


            //return $this->spojenie->query($sqlRetazec);
        } else {
            return null;
        }
    }
}


?>