<?php

$json_data = file_get_contents('./data/data.json');
$data = json_decode($json_data, true);

if (json_last_error() !== JSON_ERROR_NONE) {
    echo 'Error decoding JSON: ' . json_last_error_msg();
    exit;
}

$categories = isset($data['categories']) ? $data['categories'] : [];

if (empty($categories)) {
    echo 'No categories found';
    exit;
}

require('index.view.php');
