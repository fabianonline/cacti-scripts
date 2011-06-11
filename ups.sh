#!/bin/bash
upsc $1 | awk 'BEGIN { ORS=" "; } { print $1 $2; }'
