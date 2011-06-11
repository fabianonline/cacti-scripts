#!/usr/bin/php
<?php
$result = 0;
while (!feof(STDIN)) {
  $line = fgets(STDIN);
  $parts = split(" +", $line);
  $result += $parts[2];
}
print $result;