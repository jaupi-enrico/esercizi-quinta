<?php

require '../../vendor/autoload.php';

use League\Plates\Engine;

$template = new Engine('../../templates', 'tpl');

$id = $_GET['id'] ?? 1;

$persona = PeopleRepository::getPeopleByID($id);

echo $template->render('scheda',
    [
        'titolo' => 'Informatici famosi',
        'persona' => $persona,
    ]
);
