<?php

require '../vendor/autoload.php';
use League\Plates\Engine;

$templates = new Engine('../templates', 'tpl');

echo $templates->render('esempio',
    ['nome' => 'Enrico']
);