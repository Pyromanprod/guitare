<?php

$user = 'root';
$passCo = '';
$dbname = 'guitare';
$host = 'localhost';

$bdd = new PDO("mysql:host=$host;dbname=$dbname;charset=UTF8", $user, $passCo);
