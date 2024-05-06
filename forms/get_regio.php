<?php

$cp = !empty($_POST['cp']) ? $_POST['cp'] : '0';
$country = !empty($_POST['country']) ? $_POST['country'] : 'BE';


include('../inc/connexion.php');
try {

    $city_cp_substring = substr($cp, 0, 2);

    $wall = [60, 61, 62, 64, 65, 70, 71, 73, 75, 76, 77, 78, 79,
        40, 41, 42, 43, 44, 45, 46, 48, 47, 49,
        13, 14,
        66, 67, 68, 69,
        50, 51, 53, 55, 56,
    ];

    $bxl = [10, 11, 12];

    if ($country == 'BE') {

        if (in_array($city_cp_substring, $wall)) {
            echo 'WAL';
        } else if (in_array($city_cp_substring, $bxl)) {
            echo 'BXL';
        } else {
            echo 'FLA';
        }
    } else {
        echo 'LUX';
    }


} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
$db = null;
?>