<?php

session_start();

require 'db.inc.php';
require 'model/Ulesrend.php';
$tanulo = new Ulesrend;
require 'functions.inc.php';

include 'htmlheader.inc.php';
?>

<body>
<?php

include 'menu.inc.php';

$page = 'index';

if(isset($_REQUEST['page'])) {
        if(file_exists('controller/'.$_REQUEST['page'].'.php')) {
                $page = $_REQUEST['page']; 
        }
}

include 'controller/'.$page.'.php';

?>
</body>