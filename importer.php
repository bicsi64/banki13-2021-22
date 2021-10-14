<?php

require 'db.inc.php';

?>
<!doctype html>
<html lang="hu">
	<head>
		<meta charset="utf-8">
		<Title>Ülésrend import</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
    <body>
	<?php

	$osztaly = array(
		array("Kulhanek László István"),
		array("Molnár Gergő Máté","Bakcsányi Dominik","Füstös Loránt","Orosz Zsolt","Harsányi László Ferenc",NULL),
		array("Kereszturi Kevin","Juhász Levente","Szabó László","Sütő Dániel","Détári Klaudia",NULL),
		array("Fazekas Miklós Adrián",NULL,"Gombos János","Bicsák József")
	);

	foreach($osztaly as $sor => $tomb) {
		foreach($tomb as $oszlop => $tanulo) {

			$sql = "INSERT INTO `ulesrend` ( `nev`, `sor`, `oszlop`) VALUES ( '$tanulo', $sor + 1, $oszlop + 1);";

			if ($conn->query($sql) === TRUE) {
				echo "$tanulo beszúrásra került. ";
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}			
		}
	}


	  
	  $conn->close();

	?>
	<body>

	</body>
</html>