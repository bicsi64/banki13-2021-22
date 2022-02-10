<?php

$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");

$txt = "John Doe\n";
fwrite($myfile, $txt);

$txt = "Jane Doe\n";
fwrite($myfile, $txt);

fclose($myfile);

// írjuk ki a file tartalmát

// nevezzük át a fájlt oldfile.txt -re

// másoljuk le a fájlt copyfile.txt néven

// írjuk ki a copyfile.txt tartalmát

// töröljük az oldfile.txt-t

?> 