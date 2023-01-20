<?php

require __DIR__ . "/../vendor/autoload.php";

// use CoffeeCode\DataLayer\Connect;

// $conn = Connect::getInstance();
// $error = Connect::getError();

// if ($error) {
//     echo $error->getMessage();
//     die();
// }

// $query = $conn->query("SELECT u.* FROM users u");

use Source\Models\User;

$user = new User();
$list = $user->find()->fetch(true);

echo "<pre>";
echo "<h1>Lista de Pessoas</h1><br><br>";

/** @var $item $user */
foreach ($list as $item) {
    print_r($item);
    echo "<br>";
    var_dump($item->addresses());

    // foreach ($item->addresses() as $address) {
    //     var_dump($address->data());
    // }
}

die();