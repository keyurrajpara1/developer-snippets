<?php

// timestamp multiply 1000 php
// https://stackoverflow.com/questions/4676195/why-do-i-need-to-multiply-unix-timestamps-by-1000-in-javascript

// SELECT UTC_TIMESTAMP, UTC_TIMESTAMP(), UTC_TIMESTAMP()+0;
// 2021-12-25 15:23:09, 2021-12-25 15:23:09, 20211225152309

date_default_timezone_set("Asia/Calcutta");

$timestamp = time(); // 1640445584
$timestamp = 1640445584;

$y = date("Y", $timestamp);
$m = date("m", $timestamp);
$d = date("d", $timestamp);
$h = date("H", $timestamp);
$i = date("i", $timestamp);
$s = date("s", $timestamp);

$dateTime = date('Y-m-d H:i:s', $timestamp); // 2021-12-25 20:49:44
$dateTime = $y."-".$m."-".$d." ".$h.":".$i.":".$s; // 2021-12-25 20:49:44
$dateTime = "2021-12-25 20:49:44";

$dateTime = strtotime($dateTime); // 1640445584
$dateTime = mktime($h, $i, $s, $m, $d, $y); // 1640445584
?>