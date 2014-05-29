<?php
function show($response, $delay)
{
    function_exists('apache_setenv') ? @apache_setenv('no-gzip', 1) : false;
    @ini_set('zlib.output_compression', 0);
    @ini_set('implicit_flush', 1);
    for ($i = 0; $i < ob_get_level(); $i++) { ob_end_flush(); }
    ob_implicit_flush(1);

    $sec = 1;
    $pos = 0;
    $chunk = filesize($response) * floatval($sec) / $delay;
    $fh = fopen($response, 'rb');
    $len = 0;
    for ($time = 0; $time < $delay; $time += $sec) {
        if ($len >= 1) {
            echo fread($fh, (int)$len);
            flush();
            $pos += (int)$len;
            $len -= (int)$len;
        }
        $len += $chunk;
        sleep($sec);
    }
    echo fread($fh, $chunk+1);
    flush();
    fclose($fh);
}
