#!/usr/bin/php
<?php
  $fields = array(
                  "User TotCred" => "user_total",
                  "User AvgCred" => "user_avg",
                  "Team TotCred" => "team_total",
                  "Team AvgCred" => "team_avg");
                  
  if ($argc != 2 || in_array($argv[1], array("--help", "-help", "-h", "-?"))) {
    echo "  Usage:\n    $argv[0] <userid>\n\n";
    die;
  }
  $data = file_get_contents("http://setiathome.berkeley.edu//userw.php?id=" . $argv[1]);
  $data = str_replace("<br/>", "<br/><br/>", $data);
  preg_match_all("/<br\/>([^>]+): ([^>]*)<br\/>/Ui", $data, $regs, PREG_SET_ORDER);
  foreach($regs as $r) {
    if (isset($fields[$r[1]])) echo $fields[$r[1]], ":", str_replace(",", "", $r[2]), " ";
  } 
?>