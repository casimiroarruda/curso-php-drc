<?php
//$file = file_get_contents('./SacramentocrimeJanuary2006.csv');
$file = file_get_contents('./SalesJan2009.csv');
$novo = str_replace("\r","\r\n",$file);
file_put_contents('sales.csv',$novo);