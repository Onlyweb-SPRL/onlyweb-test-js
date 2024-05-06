<?php

$cp = !empty($_POST['cp']) ? $_POST['cp'] : '0';
$country = !empty($_POST['country']) ? $_POST['country'] : 'BE';

include('../inc/connexion.php');
try {
    if(strlen($cp) > 5) {
        echo json_encode(true);
        exit;
    }
    $db = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name . ';charset=utf8', $db_login, $db_pwd);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $statement = $db->prepare("SELECT city_cp, city_loca FROM cities WHERE city_cp like :city_cp AND country = :country");
    $str = $cp . '%';
    $statement->bindParam('city_cp', $str, PDO::PARAM_STR);
    $statement->bindParam('country', $country, PDO::PARAM_STR);
    $statement->execute();

    $isExisting = $statement->rowCount();


    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);

    $cities = [];
    foreach ($rows as $row) {
        $city_cp_substring = substr($row['city_cp'], 0, 2);

        $wall = [60, 61, 62, 64, 65, 70, 71, 73, 75, 76, 77, 78, 79,
            40, 41, 42, 43, 44, 45, 46, 48, 47, 49,
            13, 14,
            66, 67, 68, 69,
            50, 51, 53, 55, 56,
        ];

        // Get only wallonie's cities
        if (in_array($city_cp_substring, $wall)) {
            $cities[] = $row;
        }
    }

    if(empty($cities)) {
        echo json_encode(false);
        exit;
    }

    echo json_encode($cities);


} catch (PDOException $e) {
    var_dump($e);
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
$db = null;
?>
