#!/bin/bash
cat /proc/uptime | awk -v FS="[ \.]" '{print "uptimeTotal:" $1 " uptimeIdle:" $3; }'
