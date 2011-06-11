#!/usr/bin/php
<?php
// Daten auslesen
$fp = fsockopen("localhost", 7634, $errno, $errstr, 10);
if (!$fp) die();

$zeile = fgets($fp);
fclose($fp);

$zeile = trim($zeile, "|");
$disks = explode("||", $zeile);

foreach($disks as $id=>$d) {
  $data = explode("|", $d);
  $disk_data[$data[0]] = $data;
}

$data = $disk_data[$argv[1]];

print "temp:" . $data[2];
?>