<?php

function tanulokListaja($conn) {
	$sql = "SELECT id, nev, sor, oszlop FROM ulesrend";
	$result = $conn->query($sql);
	return $result;
}


function getIds($tablanev, $conn) {
    $tomb = array(); // ebben leszek azk id-k felsorolva

    $sql = "SELECT id FROM $tablanev";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $tomb[] = $row['id'];
        }
    }
    return $tomb;
}


?>
