#!/bin/bash
bytes_in=$( /usr/bin/sudo /usr/share/cacti/scripts/shorewall.sh ${1}_in | tail -n +7 | /usr/bin/php -r '$res=0;while(!feof(STDIN)){$p=split(" +",fgets(STDIN));$res+=$p[2];}print $res;' )
bytes_out=$( /usr/bin/sudo /usr/share/cacti/scripts/shorewall.sh ${1}_out | tail -n +7 | /usr/bin/php -r '$res=0;while(!feof(STDIN)){$p=split(" +",fgets(STDIN));$res+=$p[2];}print $res;' )

echo -n "bytes_in:${bytes_in} bytes_out:${bytes_out}"
