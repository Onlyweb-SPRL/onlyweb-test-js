<?php

include('inc/connexion.php');

$db = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name . ';charset=utf8', $db_login, $db_pwd);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$statement2 = $db->prepare("SELECT * FROM cities WHERE id = ?");
$statement2->execute([1]);

$result = $statement2->fetch(PDO::FETCH_ASSOC);

if ($result) {
    print_r($result);
}
