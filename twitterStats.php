#!/usr/bin/php
<?php

$xml = simplexml_load_string(file_get_contents('http://twitter.com/statuses/public_timeline.xml'));

echo 'total_tweets:', (string)$xml->status[0]->id;
