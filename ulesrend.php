<?php

session_start();

require 'db.inc.php';
require 'model/Ulesrend.php';
$tanulo = new Ulesrend;
require 'functions.inc.php';

// form feldolgozása

if(!empty($_POST["hianyzo_id"])) {
	$sql = "INSERT INTO hianyzok VALUES(".$_POST["hianyzo_id"].")";
	$result = $conn->query($sql);
}
elseif(!empty($_GET['nem_hianyzo'])) {
	$sql = "DELETE FROM hianyzok WHERE id =".$_GET['nem_hianyzo'];
	$result = $conn->query($sql);	
}

$hianyzok = getIds('hianyzok', $conn);

$adminok = array(); // ebben leszek az adminok id-i felsorolva

$sql = "SELECT id FROM adminok";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$adminok[] = $row['id'];
	}
}

$en = 0;
if(!empty($_SESSION["id"])) $en = $_SESSION["id"];

$tanar = 17;

$title = "Ülésrend";

include 'htmlheader.inc.php';

?>
	<body>
		<?php

		include 'menu.inc.php';

		?>
		<table>
			<tr>
				<th colspan="3">
					<h2>Ülésrend</h2>
				</th>
				<th colspan="3">
				<?php
				
				if(!empty($_SESSION["id"])) {
					if(in_array($_SESSION["id"], $adminok)) {
						?>
						<form action="ulesrend.php" method="post">
						Hiányzó: 	<select name="hianyzo_id">
									<?php

									$result = tanulokListaja($conn);

									if ($result->num_rows > 0) {
										while($row = $result->fetch_assoc()) {
											if($row['nev'] and !in_array($row['id'], $hianyzok)) echo '<option value="'.$row['id'].'">'.$row['nev'].'</option>';
										}
									}
									?>
										
									</select>
							<br>
						<input type="submit">
						</form>						
						<?php
					}
				}
				?>
				</th>
			</tr>
			
				<?php

				$result = tanulokListaja($conn);

				if ($result->num_rows > 0) {
				// output data of each row
				$sor = 0;
				while($row = $result->fetch_assoc()) {
					$tanulo->set_user($row['id'], $conn);
					if($tanulo->get_sor() != $sor) {
						if($sor != 0) echo '</tr>';
						echo '<tr>';
						$sor = $tanulo->get_sor();
					}
					if(!$tanulo->get_nev()) echo '<td class="empty"></td>';
					else {
						$plusz = '';
						if(in_array($row["id"], $hianyzok)) $plusz .=  ' class="missing"';
						if($row["id"] == $en) $plusz .=  ' id="me"';
						if($row["id"] == $tanar) $plusz .=  ' colspan="2"';
						echo "<td".$plusz.">" . $tanulo->get_nev();
						if(!empty($_SESSION["id"])) {
							if(in_array($_SESSION["id"], $adminok)) {
								if(in_array($row["id"], $hianyzok)) echo '<br><a href="ulesrend.php?nem_hianyzo='.$row["id"].'">Nem hiányzó</a>';
							}
						}
						echo "</td>";
					}
				}
				} 
				else {
					echo "0 results";
				}
				$conn->close();

				?>
		</table>
	</body>
</html>