<?php

include_once('./config.php');
include_once('./memcache.class.php');
$mc = new mem($mc_config);
$mc2 = new mem($mc_config2);

echo "========== M test string ============\n";
$key = 'testString';
$val = array('123','testString');
$mc -> set($key, $val);
echo "<br>";
var_dump($mc -> get($key));
echo "<br>";

echo "========== M test string2 ============\n";
echo "<br>";
$key = 'testString';
var_dump($mc2 -> get($key));


include_once('./redis.class.php');
$redis = new Re($redis_config);

echo "<br>";
echo "========== R test string ============\n";
$key = 'testString';
$val = array('123','testStringqwe');
$redis -> set($key, $val);
echo "<br>";
var_dump($redis -> get($key));

?>