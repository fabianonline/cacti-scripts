#!/bin/bash
black=$( snmpwalk -v1 -c public -Oqv 10.10.1.3 1.3.6.1.2.1.43.11.1.1.9.1.1 )
