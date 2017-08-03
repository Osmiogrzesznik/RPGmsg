<?php

function cookify($var_array){
$out = '';
if (is_array($var_array)) {
    foreach ($var_array as $index => $data) {
      $out.= ($data!="") ? $index."=".$data."|" : "";
    }
  }
  return rtrim($out,"|");
}

function decookify($cookie_string) {
  $array = explode("|", $cookie_string);
  foreach ($array as $i => $stuff) {
    $stuff = explode("=", $stuff);
    $array[$stuff[0]] = $stuff[1];
    unset($array[$i]);
  }
  return $array;
}




?>