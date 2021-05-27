<?php
require __DIR__ . '/bootstrap.php';

//Login scenarijus
// if ('POST' == $_SERVER['REQUEST_METHOD']) {
//     $name = $_POST['name'];
//     $pass = md5($_POST['password']);
//     foreach ($users as $user) {
//         if($user['email'] == $name) {
//             if($user['password'] == $pass) {
//                 $_SESSION['logged'] = 1;
//                 $_SESSION['name'] = $user['name'];
//                 $_SESSION['message'] = 'Viskas gerai!';
//                 header('Location:  http://localhost/php/web_mechanics/bank/bank.php');
//                 die;
//             }
//         }

//     }
//     $_SESSION['message'] = 'Neteisingi prisijungimo duomenys!';
//     header('Location: http://localhost/php/web_mechanics/bank/login.php');
//     die;
//     unset($_SESSION['message']);
// }
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
<body>
    
<?php include ("navigation.php"); ?>

<form class="loginForm" action="http://localhost/php/web_mechanics/bank/login.php" method="post">

    <h3>LOGIN</h3>
    <input type="email" placeholder="Username" name="name">
    <input type="password" placeholder="Password" name="password">
    <a class="log" href = "http://localhost/php/web_mechanics/bank/">Login</a>

</form>

</body>

</html>