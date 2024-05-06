<?php

function intSanitize(int $value){
  $sanitized_value = filter_var($value, FILTER_SANITIZE_NUMBER_INT);
  return $sanitized_value;
}

function stringSanitize(string $value){
  $sanitized_value = filter_var($value, FILTER_SANITIZE_STRING);
  return $sanitized_value;
}

function floatSanitize(float $value){
  $sanitized_value = filter_var($value, FILTER_SANITIZE_NUMBER_FLOAT);
  return $sanitized_value;
}

function emailSanitize(string $value){
  $sanitized_value = filter_var($value, FILTER_SANITIZE_EMAIL);
  return $sanitized_value;
}

function validateEmail(string $value){
$sanitized_value = filter_var($value, FILTER_VALIDATE_EMAIL);
return $sanitized_value;
}


function quickTranslate($tag, $render_lg){
  $trad="";

  include('connexion.php');
  try {
    $db = new PDO('mysql:host='.$db_host.';dbname='.$db_name.';charset=utf8', $db_login, $db_pwd);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $statement2 = $db->prepare("select dico_value from dico_contents left join dico on dico.id = dico_contents.dico_id where dico.tag_name = :tag and dico_lg = :render_lg");
    $statement2->execute(array('tag' => $tag,'render_lg'=>$render_lg ));
    $row2 = $statement2->fetch(PDO::FETCH_ASSOC);
    $trad = $row2['dico_value'];
  } catch (PDOException $e) {
      print "Erreur !: " . $e->getMessage() . "<br/>";
      die();
  }
  $db = null;

  return $trad;
}

?>