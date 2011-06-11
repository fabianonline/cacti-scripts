#!/bin/bash
cat /proc/net/dev | grep "${1}:" | awk -v FS="[ :]+" '{ORS=""; print "bytes_in:"$3" bytes_out:"$11;}'
