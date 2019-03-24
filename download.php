<?php
if (!isset($_GET['file']))
	die('ERROR');

$agent = urlencode($_SERVER['HTTP_USER_AGENT']);
$IP = trim($_SERVER['REMOTE_ADDR']);
if (isset($_COOKIE['tracking-uid'])) {
	$cid = trim($_COOKIE['tracking-uid']);
} else {
	$cid = uniqid();
	setcookie('tracking-uid', $cid, time() + (86400*365), '/');	
}

$file = trim($_GET['file']);
$file_path = __DIR__ . '/avsnitt/' . $file;

$source = 'other';
$medium = 'pod';
$document = urlencode("https://www.ipmulricehamn.se/podd/avsnitt/{$file}");

if (isset($_GET['source']))
	$source = trim($_GET['source']);

$event_post = "v=1&tid=UA-XXXXXXX-X&cid={$cid}&t=event&ec=Pod&ea=Play&el={$file}&uip={$IP}&ua={$agent}&cs={$source}&cm={$medium}&sc=start";
$file_post = "v=1&tid=UA-XXXXXXX-1&cid={$cid}&t=pageview&dl={$document}&uip={$IP}&ua={$agent}&cs={$source}&cm={$medium}&sc=end";

if (file_exists($file_path)) {

	$ch = curl_init('https://www.google-analytics.com/collect');

	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $event_post);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CONNECTION_TIMEOUT, 3);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	$results = curl_exec($ch);

	usleep(250000);

	curl_setopt($ch, CURLOPT_POSTFIELDS, $file_post);

	$results = curl_exec($ch);

	header("HTTP/1.1 302 Found");
	header("Location: https://www.ipmulricehamn.se/podd/avsnitt/{$file}");
	exit;

} else {
	die('Episode not found');
}
