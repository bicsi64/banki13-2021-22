<?php

// keresés megvalósítása

require 'includes/db.inc.php';

if(isset($_REQUEST['keres'])) {
   
    $sql = 'SELECT nev FROM ulesrend WHERE nev LIKE ?';

    $stmt = $conn->prepare($sql);

    $stmt->bind_param('s', $like); 
    
    $like = $_REQUEST['keres'].'%';
    
    $stmt->execute();

    if($result = $stmt->get_result()) {

        if ($result->num_rows > 0) {
            
            while($row = $result->fetch_assoc()) {
                echo $row['nev']."<br>";
            }
        }
        else echo 'Nincs ilyen név';        
    } 


    // 
}



?> 