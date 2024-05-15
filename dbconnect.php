<?php
$mysqli = new mysqli('localhost', 'root', '', 'DATA_BASE_WALLPAPER');
if ($mysqli->connect_error) {
  die(' Connect Error (' .$mysqli->connect_errno. ') '. $mysqli->connect_error);
}
?>