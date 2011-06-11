#!/bin/bash
bytes=$( /usr/bin/sudo /usr/share/cacti/scripts/shorewall.sh ${1} | tail -n +7 | /usr/bin/php -r '$res=0;while(!feof(STDIN)){$p=split(" +",fgets(STDIN));$res+=$p[2];}print $res;' )

echo -n "bytes:${bytes}"
