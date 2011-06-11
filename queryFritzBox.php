#!/usr/bin/php
<?php

define("BOX_IP", "10.10.1.1");
define("BOX_PW", "algol17");

/*$ch = curl_init();

$data = "login:command/password=" . BOX_PW .
  "&getpage=../html/de/menus/menu2.html" .
  "&errorpage=../html/index.html" .
  "&var:lang=de" . 
  "&var:pagename=home" . 
  "&var:menu=home";

curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_URL, "http://" . BOX_IP . "/cgi-bin/webcm");
curl_setopt($ch, CURLOPT_MUTE, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_exec($ch);
curl_close($ch);
*/

$ch = curl_init();

$data = "getpage=../html/de/menus/menu2.html" .
  "&errorpage=../html/de/menus/menu2.html" .
  "&var:lang=de" . 
  "&var:pagename=adsl" . 
  "&var:errorpagename=adsl" . 
  "&var:menu=internet" . 
  "&var:pagemaster=" . 
  "&time:settings/time=1155197486,-120";
  
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_URL, "http://" . BOX_IP . "/cgi-bin/webcm");
//curl_setopt($ch, CURLOPT_MUTE, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$result = curl_exec($ch);
curl_close($ch);

$temp = getData($result, "Leitungskapazit&auml;t");
echo "capacity_in:", $temp['in'], " capacity_out:", $temp['out'], " ";

$temp = getData($result, "Nutz-Datenrate");
echo "rate_in:", $temp['in'], " rate_out:", $temp['out'], " ";

$temp = getData($result, "Signal/Rauschtoleranz");
echo "snr_in:", $temp['in'], " snr_out:", $temp['out'], " ";

$temp = getData($result, "Leitungsd&auml;mpfung");
echo "lineloss_in:", $temp['in'], " lineloss_out:", $temp['out'], " ";


function getData($html, $fieldToLookFor) {
  preg_match('|<td class\="c1">' . preg_quote($fieldToLookFor) . '</td>.*<td class="c2">(.*)</td>.*<td class="c3">(.*)</td>.*<td class="c3">(.*)</td>|Uis', $html, $regs);
  return array("unit"=>$regs[1], "in"=>$regs[2], "out"=>$regs[3]);
}

?>
