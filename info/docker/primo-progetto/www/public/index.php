<?php

use DI\Container;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../conf/config.php';

$container = new Container();
AppFactory::setContainer($container);
$app = AppFactory::create();

$app->addRoutingMiddleware();
$app->addErrorMiddleware(APP_ENV === 'development', true, true);

// --- Route di esempio ---

$app->get('/', function (Request $request, Response $response) {
    $html = <<<'HTML'
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Progetto Didattico - Indice</title>
</head>
<body>
    <header>
        <h1>Progetto Didattico</h1>
        <h3>Elenco di tutti i progetti e esercizi</h3>
    </header>

    <hr>

    <main>
        <article>
            <h2>Hello World</h2>
            <p><small>HTML/PHP</small></p>
            <p>Primo progetto di prova con Hello World in HTML e PHP.</p>
            <ul>
                <li><a href="esercizi/hello-world/hello-world.html">Visualizza HTML</a></li>
                <li><a href="esercizi/hello-world/hello-world.php">Visualizza PHP</a></li>
            </ul>
        </article>

        <hr>

        <article>
            <h2>Form di Lingua</h2>
            <p><small>Form/PHP</small></p>
            <p>Modulo di richiesta per corsi di lingua con validazione server-side.</p>
            <ul>
                <li><a href="esercizi/form-corsi/form.html">Apri Form</a></li>
            </ul>
        </article>

        <hr>

        <article>
            <h2>Tavola Pitagorica</h2>
            <p><small>PHP</small></p>
            <p>Generazione dinamica della tavola pitagorica con PHP.</p>
            <ul>
                <li><a href="esercizi/tavola-pitagorica/tavola-pitagorica.php">Visualizza</a></li>
            </ul>
        </article>

        <hr>

        <article>
            <h2>Login System</h2>
            <p><small>PHP/Session</small></p>
            <p>Sistema di login con validazione password e gestione sessioni.</p>
            <ul>
                <li><a href="esercizi/login/login.php">Accedi</a></li>
            </ul>
        </article>

        <hr>

        <article>
            <h2>Prenotazione Pizzeria</h2>
            <p><small>Form/PHP</small></p>
            <p>Sistema di prenotazione per pizzeria con validazione form-corsi e riepilogo ordine.</p>
            <ul>
                <li><a href="esercizi/pizzeria/pizzeria.php">Apri Form</a></li>
            </ul>
        </article>

        <hr>

        <article>
            <h2>Parcheggio</h2>
            <p><small>Form/PHP</small></p>
            <p>Sistema di prenotazione parcheggio con calcolo del costo in base al veicolo e alle ore.</p>
            <ul>
                <li><a href="esercizi/parcheggio/home.php">Apri</a></li>
            </ul>
        </article>
    </main>

    <hr>

    <footer>
        <p>&copy; 2024 Progetto Didattico - Esercizi Quinta</p>
    </footer>
</body>
</html>
HTML;

    $response->getBody()->write($html);
    return $response;
});

$app->run();
