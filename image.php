<?php
$delay = (isset($_REQUEST['delay']) && (int)$_REQUEST['delay']) ? (int)$_REQUEST['delay'] : 39;
header('Content-Type: image/jpeg');
require_once(__DIR__ . '/show.php');
show(__DIR__ . '/image.jpg', $delay);
