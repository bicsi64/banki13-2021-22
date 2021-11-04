<?php

session_start();

require 'includes/db.inc.php';
require 'model/Ulesrend.php';
$tanulo = new Ulesrend;
require 'includes/functions.inc.php';

$szoveg = "Belépés";
$link = "belepes";

if(!empty($_SESSION["id"])) {
    $szoveg = $_SESSION["nev"].": Kilépés";
    $link = "index.php?logout=1";
} 

$menupontok = array('index' => "Főoldal", 'ulesrend' => "Ülésrend", $link => $szoveg);

$page = 'index';

if(isset($_REQUEST['page'])) {
        if(file_exists('controller/'.$_REQUEST['page'].'.php')) {
                $page = $_REQUEST['page']; 
        }
}

$title = $menupontok[$page];

include 'includes/htmlheader.inc.php';
?>

<body>
<?php

include 'includes/menu.inc.php';



include 'controller/'.$page.'.php';

?>
</body>