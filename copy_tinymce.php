<?php

$source = __DIR__ . '/vendor/tinymce/tinymce';
$destination = __DIR__ . '/public/js/tinymce';

function copyDirectory($source, $destination)
{
    $dir = opendir($source);
    @mkdir($destination, 0777, true);

    while (($file = readdir($dir)) !== false) {
        if ($file != '.' && $file != '..') {
            if (is_dir($source . '/' . $file)) {
                copyDirectory($source . '/' . $file, $destination . '/' . $file);
            } else {
                copy($source . '/' . $file, $destination . '/' . $file);
            }
        }
    }
    closedir($dir);
}

if (file_exists($source)) {
    copyDirectory($source, $destination);
    echo "TinyMCE files have been copied successfully.\n";
} else {
    echo "Source directory does not exist.\n";
}
