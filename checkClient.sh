#!/bin/bash
result=$( fping $1 2>&1| tail -n 1 )
expr "$result" : ".*alive" > /dev/null && echo "on:1 off:0" || echo "on:0 off:1"