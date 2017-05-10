<?php
#currency
echo '<form action="currency.php" method="post">';
$response = file_get_contents('https://apis.is/currency/lb'); # /currency/{m5,arion,lb}, {m5.is, arionbanki, landsbanki}
$currency = json_decode($response, true);
echo '<select id="curr" name="curr">';
echo '<option value="0">Currency</option>';
foreach ($currency['results'] as $nr){
    $curr = $nr['shortName'];
    echo '<option value="'.$curr.'">'.$curr.'</option>';
}
echo '</select><br>Enter Amount:<input type="text" name="amount"><br>';
echo '<input type="submit" name="submit" value="Convert Now"></center>';

if(isset($_POST['submit'])){
	
	$amount = $_POST['amount'];
	$curr = $_POST['curr'];
	$value = 102.5;
	
	echo $value*$amount;
}



?>
