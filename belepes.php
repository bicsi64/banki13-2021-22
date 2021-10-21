<?php

session_start();

require 'db.inc.php';
require 'model/Ulesrend.php';
// form feldolgozása
$tanulo = new Ulesrend;

if(isset($_POST['user']) and isset($_POST['pw'])) {
	$loginError = '';
	if(strlen($_POST['user']) == 0) $loginError .= "Nem írtál be felhasználónevet<br>";
	if(strlen($_POST['pw']) == 0) $loginError .= "Nem írtál be jelszót<br>";
	if($loginError == '') {
		$sql = "SELECT id FROM ulesrend WHERE felhasznalonev = '".$_POST['user']."' ";

		if(!$result = $conn->query($sql)) echo $conn->error;

		if ($result->num_rows > 0) {
			
			if($row = $result->fetch_assoc()) {
				$tanulo->set_user($row['id'], $conn);
				if(md5($_POST['pw']) == $tanulo->get_jelszo()) {
					$_SESSION["id"] = $row['id'];
					$_SESSION["nev"] = $tanulo->get_nev();
                    header('Location: ulesrend.php');
                    exit();
				}
				else $loginError .= 'Érvénytelen jelszó<br>';
			}
		}
		else $loginError .= 'Érvénytelen felhasználónév<br>';
	}
}
$title = "Belépés";

if(!empty($_SESSION["id"])) $title = "Kilépés";

include 'htmlheader.inc.php';

?>
	<body>
        <?php

        include 'menu.inc.php';

        ?>
		<table>
			<tr>
				<th colspan="3">
					<?php

					if(!empty($_SESSION["id"])) {
						echo "Üdv ".$_SESSION['nev']."!";
						?>
						<br>
						
						<form action="belepes.php" method="get">
							<input type="submit" name="logout" value="Kilépés">
						</form>
						<?php
					}
					else {
						if(isset($_POST['user'])) {
							echo $loginError;
						}
						else echo "<h2>Belépés</h2>";

						?>
						<form action="belepes.php" method="post">
							Felhasználó:<br><input type="text" name="user">
							<br>
							Jelszó: <br><input type="password" name="pw">
							<br>
						<input type="submit">
						</form>
						<?php						
					}
				?>
				</th>
			</tr>
		</table>
	</body>
</html>