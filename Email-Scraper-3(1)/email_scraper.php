<?php

$url = $_POST['url'];
$emails = [];

if (!empty($url)) {
    $html = file_get_contents($url);
    preg_match_all('/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}/', $html, $matches);
    $emails = $matches[0];
}

echo json_encode($emails);
