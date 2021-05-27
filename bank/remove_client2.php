<?php
require __DIR__ . '/bootstrap.php';

$message = $_SESSION['message'] ?? '';
$message = 'Sėkmingai ištrinta!';


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

<form class= "addRemove" action="http://localhost/php/web_mechanics/bank/remove_client2.php?add=<?= $key ?>" method="post">  

    <div class="message"><?= $message ?></div>
    <?php unset($_SESSION['message']) ?>

<?php
        echo  
        '<a class="log" href = "http://localhost/php/web_mechanics/bank/list.php">Grįžti į sąrašą</a>'   
?>

</form>
</body>
</html>