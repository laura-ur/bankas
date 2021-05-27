<?php
session_start();

// $users = require __DIR__ . '/db.php';

$data = file_get_contents(__DIR__ . '/bank.json');
$data = json_decode($data, 1);

define('URL', 'http://localhost/php/web_mechanics/bank/');