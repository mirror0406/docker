<?php

$files = scandir(__DIR__ . '/forms');
if (is_dir(__DIR__ . '/forms')) {
    $dirs = scandir('forms');

    $result = [];
    foreach ($dirs as $key => $dir) {
        if ($dir === '.' || $dir === '..') {
            unset($dirs[$key]);
        }
    }
    $rand_dir = $dirs[array_rand($dirs)];
    $files = scandir(__DIR__ . '/forms/' . $rand_dir);
    foreach ($files as $key => $file) {
        if ($file === '.' || $file === '..') {
            continue;
        }
        $file_res = __DIR__ . '/forms/' . $rand_dir . '/' . $file;
        $result[pathinfo($file, PATHINFO_FILENAME)] = file_get_contents($file_res) ?? '';
    }

    echo json_encode($result, true);
}