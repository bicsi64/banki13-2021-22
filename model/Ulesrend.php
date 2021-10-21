<?php

require "../db.inc.php";

class Ulesrend {
    
    private $id;
    private $nev;
    private $sor;
    private $oszlop;
    private $jelszo;
    private $felhasznalonev;

    public function set_user($id, $conn) {
        // adatbázisból lekérdezzük
        $sql = "SELECT id, nev, sor, oszlop, jelszo, felhasznalonev FROM ulesrend";
        $sql .= " WHERE id = $id ";
        $result = $conn->query($sql);
        if ($conn->query($sql)) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $this->id = $row['id'];
                $this->nev = $row['nev'];
                $this->sor = $row['sor'];
                $this->oszlop = $row['oszlop'];
                $this->jelszo = $row['jelszo'];
                $this->felhasznalonev = $row['felhasznalonev'];
            }
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // építsük fel az összes get metódust
    public function get_nev() {
        return $this->nev;
    }
}

$tanulo = new Ulesrend;

$tanulo->set_user(4, $conn);

echo $tanulo->get_nev();

?>
