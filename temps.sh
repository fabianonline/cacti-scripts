#!/bin/bash
#sensors | awk '{ ORS=""; if ($1=="temp2:") print "cpu:" $2; else if ($1=="temp1:") print "mainboard:" $2 " ";}' | sed 's/°C//g' | sed 's/\+//g'
sensors | awk '{ ORS=""; if ($1=="CPU" && $2=="Temperature:") print "cpu:" $3; if ($1=="MB" && $2=="Temperature:") print " mainboard:" $3;}' | sed 's/°C//g' | sed 's/\+//g'
