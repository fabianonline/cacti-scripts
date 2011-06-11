#!/usr/bin/php
<?php

$user = $argv[1];

$data = file_get_contents('http://api.twitter.com/1/users/show/' . $user . '.xml');

$xml = simplexml_load_string($data);

echo 'followers:' . (string)$xml->followers_count;
echo ' ';
echo 'friends:' . (string)$xml->friends_count;
echo ' ';
echo 'statuses:' . (string)$xml->statuses_count;
