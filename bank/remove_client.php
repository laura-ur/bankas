<?php
require __DIR__ . '/bootstrap.php';


$message = $_SESSION['message'] ?? '';
$key = $_GET['add'];


if('POST'== $_SERVER['REQUEST_METHOD'])  {
  
     if(isset($_POST['submit'])){

         if($data[$key]['likutis'] > 0) {
            $_SESSION['message'] = 'Nepavyks! Klientas turi pinigų!';
            header('Location: http://localhost/php/web_mechanics/bank/remove_client.php?add='.$key);
            die;
         } 
         else {
            
             $_SESSION['message'] = 'Sėkmingai ištrinta!';
             unset($data[$key]);
             file_put_contents(__DIR__ . '/bank.json', json_encode($data));
             header('Location: http://localhost/php/web_mechanics/bank/remove_client2.php');
             die;
         }

    }
}

_d($data);

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
<body>

<?php include ("navigation.php"); ?>



<?php unset($_SESSION['message']) ?>

<form class= "addRemove" action="http://localhost/php/web_mechanics/bank/remove_client.php?add=<?= $key ?>" method="post">  

    <div class="message"><?= $message ?></div>
    <?php unset($_SESSION['message']) ?>

<?php

        echo
        '<output><strong>' . $data[$key]['vardas']. ' ' .$data[$key]['pavarde'].'</strong></output>
        <br>
        <output>a/k '. $data[$key]['aKodas'].'</output>
        <output>'. $data[$key]['sNr'].'</output>
        <output>'. $data[$key]['likutis'].' €</output>
        <br>
        <div class="buttons">
        <a class="log" href = "http://localhost/php/web_mechanics/bank/list.php">Grįžti į sąrašą</a>
        <button class="log delete" type="submit" name="submit">Trinti</button></div>';
   
?>

</form>
</body>
</html>