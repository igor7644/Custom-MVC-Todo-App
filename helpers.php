<?php

function view($name, $data = [])
{
    return require ("views/$name.view.php");
}