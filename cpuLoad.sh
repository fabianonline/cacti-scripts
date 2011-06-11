#!/bin/bash
cat /proc/stat | grep "^cpu${1} " | awk '{ print "cpu_user:"$2" cpu_nice:"$3" cpu_system:"$4" cpu_idle:"$5" cpu_iowait:"$6; }'
