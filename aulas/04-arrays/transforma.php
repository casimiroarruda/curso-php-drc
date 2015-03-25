<?php
<<<<<<< Updated upstream
//$file = file_get_contents('./SacramentocrimeJanuary2006.csv');
$file = file_get_contents('./SalesJan2009.csv');
$novo = str_replace("\r","\r\n",$file);
file_put_contents('sales.csv',$novo);
=======
$file = file_get_contents('./SalesJan2009.csv');
$novo = str_replace("\r","\r\n",$file);
file_put_contents('SalesJan2009.csv',$novo);
>>>>>>> Stashed changes
