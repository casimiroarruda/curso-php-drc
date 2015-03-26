<?php
$conn = mysql_connect('localhost','web_user','xurumelas',true);
if(!$conn){
    die("Algo deu muito errado: ".mysql_error());
}
mysql_select_db('report', $conn);
$data = array(
    "Mastercard" => rand(1,1000000000)/100,
    "Visa" => rand(1,1000000000)/100,
    "Diners" => rand(1,1000000000)/100,
    "Amex" => rand(1,1000000000)/100
);
/*foreach($data as $paymentType => $value){
    $sql = "INSERT INTO line (payment_type,amount) VALUES ('$paymentType',$value)";
    $x = mysql_query($sql,$conn);
}*/
$paymentTypeDefault = 'Diners';
$qry = mysql_query("SELECT * FROM line WHERE payment_type = '{$paymentTypeDefault}'");
while($obj = mysql_fetch_object($qry)){
    echo "{$obj->id}, {$obj->payment_type}: USD {$obj->amount}",PHP_EOL;
}
mysql_close($conn);

