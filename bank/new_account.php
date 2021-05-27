<?php

require __DIR__ . '/bootstrap.php';

//NAUJAS KLIENTAS


if ('POST' == $_SERVER['REQUEST_METHOD']) {
  
  _d($_POST['submit']);
  
    $newArray = [];
   if (isset($_POST['vardas'])) {
        $newArray['vardas'] = $_POST['vardas'];    
    }
    if (isset($_POST['pavarde'])) {
        $newArray['pavarde'] = $_POST['pavarde'];    
    }
    if (isset($_POST['aKodas'])) {
      
        $newArray['aKodas'] = (int)$_POST['aKodas']; 
    }
    if (isset($_POST['generate'])) {
        $_POST['sNr'] = 'LT' .rand(10, 99). '7300 0' .rand(100, 999). ' ' .rand(1000, 9999). ' ' .rand(1000, 9999);
        $newArray['sNr'] = $_POST['sNr']; 
        $newArray['likutis']  = 0;
    }

    // _d($newArray);

    array_push($data, $newArray);

    $userSurname = array_column($data, 'pavarde');
    array_multisort($userSurname, SORT_ASC, $data);

    // _d($data);

    file_put_contents(__DIR__ . '/bank.json', json_encode($data));
    header('Location: http://localhost/php/web_mechanics/bank/list.php');
    die;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,500" rel="stylesheet">
    <link rel="stylesheet" href="bank.css">
    <title>Document</title>
</head>
<body >

<?php include ("navigation.php"); ?>

<form class="newAcount" action="http://localhost/php/web_mechanics/bank/new_account.php" method="post">
    <h3>Pridėti naują sąskaitą</h3>
    <input type="text" placeholder="Vardas" name="vardas">
    <input type="text" placeholder="Pavardė" name="pavarde">
    <input type="text" placeholder="Asmens kodas" name="aKodas">

    <!-- <input type="text" placeholder="Sąskaitos numeris" name="sNr"> -->
    <!-- <div class="buttons"> -->
    <!-- <button class="generate" type="submit">Generuoti sąskaitos numerį</button> -->
    <button class="bottom" type="submit" name="generate" >Pridėti</button>
    <!-- </div> -->
</form>
    
</body>
</html>