<?php

$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

switch ($lang) {

  case "en":
  case "uk":
    break;
  default:
    $lang = "en";
    break;

}

header("Location: /" . $lang . "/");

?>
