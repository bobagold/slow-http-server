<?php
$delay = (isset($_REQUEST['delay']) && (int)$_REQUEST['delay']) ? (int)$_REQUEST['delay'] : 39;
header('Content-Type: text/html');
require_once(__DIR__ . '/show.php');
show(__DIR__ . '/text.html', $delay);
