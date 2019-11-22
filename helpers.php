<?php

function dd($data)
{
    echo '<pre>';
    die(var_dump($data));
    echo '</pre>';
}

function redirect(string $path)
{
    header("Location: /$path");
}