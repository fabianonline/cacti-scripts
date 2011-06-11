#!/bin/bash
df -B 1 $1 | tail -n 1 | awk '{print "total:"$2" used:"$3" available:"$4;}'