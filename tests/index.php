<?php

include_once __DIR__ . "/../src/includes.php";
echo "<h1>Running tests</h1>";

$tests_count = 0;
$tests_passed = 0;

function run_test(string $path)
{
    try {
        ob_start();
        include($path);
        $var = ob_get_contents();
        ob_end_clean();
        return $var;
    } catch (Throwable $e) {
        return $e->getMessage();
    }
}

// Get all files in the current directory
$files = scandir(__DIR__);
foreach ($files as $file) {
    if ($file != "." && $file != ".." && $file != "index.php") {
        $tests_count++;

        echo "Running test <b>$file</b> - ";

        $res = run_test($file);
        if ($res == "success") {
            echo "<span style='color: green'>Passed</span>";
            $tests_passed++;
        } else {
            echo "<span style='color: red'>Failed</span> ($res)";
        }

        echo "<br />";
    }
}

echo "<br />Passed <b>$tests_passed</b> out of <b>$tests_count</b> tests.";
