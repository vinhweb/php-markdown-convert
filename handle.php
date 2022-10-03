<?php

require 'vendor/autoload.php';
use Michelf\Markdown;

$obj = json_decode(file_get_contents('php://input'));
$markdown = $obj->markdown;
$my_html = Markdown::defaultTransform($markdown);

echo $my_html;
