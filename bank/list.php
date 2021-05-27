<?php

require __DIR__ . '/bootstrap.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bank.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,500" rel="stylesheet">
    <title>Document</title>
</head>
<body >

<?php include ("navigation.php"); ?>


<form class="wide" action="" method="get">   
<table class="list">
<tr>
    <th>Eil.Nr.</th>
    <th>Vardas</th>
    <th>Pavardė</th>
    <th>Asmens kodas</th>
    <th>Sąskaitos numeris</th>
    <th>Likutis</th>
    <th></th>
    <th></th>
    <th></th>
</tr>
<?php
$count = 1;
    foreach($data as $key => $client) {
        echo '<tr>';
        echo
        '<td>' . $count .'</td>
        <td>' . $data[$key]['vardas'] .'</td>
        <td>'. $data[$key]['pavarde'].'</td>
        <td>'. $data[$key]['aKodas'].'</td>
        <td>'. $data[$key]['sNr'].'</td>
        <td>'. $data[$key]['likutis'].' €</td>
        <td> <a class="log delete" href="http://localhost/php/web_mechanics/bank/remove_client.php?add='. $key .'"> Trinti </a></td>
        <td> <a class="log addMoney" href="http://localhost/php/web_mechanics/bank/add_money.php?add='. $key .'"> Pridėti lėšas </a></td>
        <td> <a class="log" href="http://localhost/php/web_mechanics/bank/remove_money.php?add='. $key .'"> Nurašyti lėšas </a></td>';
        echo '</tr>';
        $count++;

    }

?>
</table>
</form>


</body>
</html>