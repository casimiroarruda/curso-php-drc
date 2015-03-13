<?php
$file = file_get_contents('./SacramentocrimeJanuary2006.csv');
$novo = str_replace("\r","\r\n",$file);
file_put_contents('crimes.csv',$novo);