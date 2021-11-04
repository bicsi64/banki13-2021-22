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
