<?php

session_start();

require 'includes/db.inc.php';
require 'model/Ulesrend.php';
$tanulo = new Ulesrend;
require 'includes/functions.inc.php';

// default oldal
$page = 'index';

// kilépés végrehajtása
if(!empty($_REQUEST['action'])) {
	if($_REQUEST['action'] == 'kilepes') session_unset();
}

// ki vagy be vagyok lépve?
if(!empty($_SESSION["id"])) {
        $szoveg = $_SESSION["nev"].": Kilépés";
        $action = "kilepes";
}
else {
        $szoveg = "Belépés";
        $action = "belepes";        
} 

// router
if(isset($_REQUEST['page'])) {
        if(file_exists('controller/'.$_REQUEST['page'].'.php')) {
                $page = $_REQUEST['page']; 
        }
}

$menupontok = array(    'index' => "Főoldal", 
                        'ulesrend' => "Ülésrend", 
                        'felhasznalo' => $szoveg
                );

$title = $menupontok[$page];

include 'includes/htmlheader.inc.php';
?>
<body>
<?php

include 'includes/menu.inc.php';
include 'controller/'.$page.'.php';

?>
</body>
</html>