
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