#!/usr/bin/perl
$host = $ARGV[0];
$ping=`/usr/sbin/fping -c 40 -p 130 -i 130 -q $host 2>&1`;
($x, $y) = split (",", $ping);
($xmt,$rcv,$loss) = ($x =~ /(\d+)\/(\d+)\/(\d+)/);
($min,$avg,$max) = ($y =~ /(\d+\.?\d*)\/(\d+\.?\d*)\/(\d+\.?\d*)/);
#$dev1 = $avg - $min;
#$dev2 = $max - $avg;
$dev = $max - $min;
printf ("min:%.3f avg:%.3f max:%.3f diff:%.3f loss:%.0f", $min, $avg, $max, $dev, $loss); 