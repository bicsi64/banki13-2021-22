<?php

require_once 'Kijeloltfelhasznalok.php';

class Admin extends Kijeloltfelhasznalok {
    
    function __construct() {
        $this->tablaNev = 'adminok';
    }
}

?>
