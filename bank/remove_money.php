<?php
require __DIR__ . '/bootstrap.php';


$message = $_SESSION['message'] ?? '';
// $display='none';
$key = $_GET['add'];


if('POST'== $_SERVER['REQUEST_METHOD'])  {

    $check = $data[$key]['likutis'] - (int)$_POST['add'];

    if ($check < 0 ){
      
        $_SESSION['message'] = 'Sąskaitoj per mažai pinigų!';
        header('Location: http://localhost/php/web_mechanics/bank/remove_money.php?add='.$key);
        die;
    }
    elseif ($_POST['add'] <= 0){
       
        $_SESSION['message'] = 'Kažkas negerai! Patikslinkite skaičių!';
        header('Location: http://localhost/php/web_mechanics/bank/remove_money.php?add='.$key);
        die;
    } 
    else {
      
        $data[$key]['likutis'] -= (int)$_POST['add'];
        $_SESSION['message'] = 'Sėkmingai nurašyta '.$_POST['add'].' € !';
        file_put_contents(__DIR__ . '/bank.json', json_encode($data));
        header('Location: http://localhost/php/web_mechanics/bank/remove_money.php?add='.$key);
        die;
     
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

<form class= "addRemove" action="http://localhost/php/web_mechanics/bank/remove_money.php?add=<?= $key ?>" method="post">  
    <?php
    // if(isset($_POST['add'])){
    //     $display='block';
    // } ?>

    <div class="message"style="display:block;" ><?= $message ?></div>
    <?php unset($_SESSION['message']) ?>

<?php
            
        echo

        '<output><strong>' . $data[$key]['vardas']. ' ' .$data[$key]['pavarde'].'</strong></output>
        <br>
        <output>a/k '. $data[$key]['aKodas'].'</output>
        <output>'. $data[$key]['sNr'].'</output>
        <output>'. $data[$key]['likutis'].' €</output>
        <br>
        <input type="text" placeholder="Nurašyti" name="add">
        <div class="buttons">
        <a class="log" href = "http://localhost/php/web_mechanics/bank/list.php">Grįžti į sąrašą</a>
        <button class="log delete" type="submit" name="submit">Nuskaičiuoti</button></div>';
        
   
?>

</form>
</body>
</html>