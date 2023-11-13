<?php

// Get all files in the current directory
$files = scandir(__DIR__);
foreach ($files as $file) {
    if ($file != "." && $file != ".." && $file != "includes.php") {
        include_once(__DIR__ . "/" . $file);
    }
}
