<?php
$base = __DIR__ . '/../app/';

$folders = [
    'json',
    'routes',
];

foreach($folders as $f)
{
    foreach (glob($base . "$f/*.php") as $k => $filename)
    {
        require $filename;
    }
}

