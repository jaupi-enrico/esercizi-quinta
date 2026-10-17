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
    <link rel="stylesheet" href="assets/style.css">
    <style>
        body {
            display: block;
            padding: 48px 20px;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
        }
        h1 {
            font-size: 30px;
            margin-bottom: 6px;
        }
        .subtitle {
            color: var(--text-muted);
            text-align: center;
            margin-bottom: 44px;
            font-size: 15px;
        }
        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }
        .project-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04);
            transition: border-color 0.15s, box-shadow 0.15s;
        }
        .project-card:hover {
            border-color: var(--accent);
            box-shadow: 0 4px 16px rgba(17, 24, 39, 0.08);
        }
        .project-header {
            padding: 18px 20px;
            display: flex;
            align-items: center;
            border-bottom: 1px solid var(--border);
        }
        .project-icon {
            font-size: 20px;
            margin-right: 10px;
        }
        .project-title {
            font-size: 16px;
            font-weight: 600;
            color: var(--text);
        }
        .project-body {
            padding: 20px;
        }
        .project-description {
            color: var(--text-muted);
            margin-bottom: 16px;
            font-size: 13px;
            line-height: 1.5;
        }
        .project-link {
            display: inline-block;
            background-color: var(--accent);
            color: white;
            padding: 8px 16px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 500;
            font-size: 13px;
            transition: background-color 0.15s;
        }
        .project-link:hover {
            background-color: var(--accent-hover);
        }
        .project-type {
            display: inline-block;
            background-color: var(--accent-soft);
            color: var(--accent);
            padding: 3px 8px;
            border-radius: 4px;
            font-size: 11px;
            font-weight: 500;
            margin-left: 10px;
        }
        .footer {
            text-align: center;
            color: var(--text-muted);
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid var(--border);
            font-size: 13px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>📚 Progetto Didattico</h1>
        <p class="subtitle">Elenco di tutti i progetti e esercizi</p>

        <div class="projects-grid">
            <div class="project-card">
                <div class="project-header">
                    <span class="project-icon">🎓</span>
                    <span class="project-title">Hello World</span>
                    <span class="project-type">HTML/PHP</span>
                </div>
                <div class="project-body">
                    <p class="project-description">Primo progetto di prova con Hello World in HTML e PHP.</p>
                    <a href="hello-world.html" class="project-link">Visualizza HTML</a>
                    <a href="hello-world.php" class="project-link">Visualizza PHP</a>
                </div>
            </div>

            <div class="project-card">
                <div class="project-header">
                    <span class="project-icon">📋</span>
                    <span class="project-title">Form di Lingua</span>
                    <span class="project-type">Form/PHP</span>
                </div>
                <div class="project-body">
                    <p class="project-description">Modulo di richiesta per corsi di lingua con validazione server-side.</p>
                    <a href="form.html" class="project-link">Apri Form</a>
                </div>
            </div>

            <div class="project-card">
                <div class="project-header">
                    <span class="project-icon">🔢</span>
                    <span class="project-title">Tavola Pitagorica</span>
                    <span class="project-type">PHP</span>
                </div>
                <div class="project-body">
                    <p class="project-description">Generazione dinamica della tavola pitagorica con PHP.</p>
                    <a href="tavola-pitagorica.php" class="project-link">Visualizza</a>
                </div>
            </div>

            <div class="project-card">
                <div class="project-header">
                    <span class="project-icon">🔐</span>
                    <span class="project-title">Login System</span>
                    <span class="project-type">PHP/Session</span>
                </div>
                <div class="project-body">
                    <p class="project-description">Sistema di login con validazione password e gestione sessioni.</p>
                    <a href="login.php" class="project-link">Accedi</a>
                </div>
            </div>

            <div class="project-card">
                <div class="project-header">
                    <span class="project-icon">🍕</span>
                    <span class="project-title">Prenotazione Pizzeria</span>
                    <span class="project-type">Form/PHP</span>
                </div>
                <div class="project-body">
                    <p class="project-description">Sistema di prenotazione per pizzeria con validazione form e riepilogo ordine.</p>
                    <a href="pizzeria.php" class="project-link">Apri Form</a>
                </div>
            </div>

            <div class="project-card">
                <div class="project-header">
                    <span class="project-icon">👤</span>
                    <span class="project-title">Area Riservata</span>
                    <span class="project-type">PHP/Session</span>
                </div>
                <div class="project-body">
                    <p class="project-description">Area protetta accessibile solo dopo autenticazione.</p>
                    <a href="area_riservata.php" class="project-link">Accedi</a>
                </div>
            </div>
        </div>

        <div class="footer">
            <p>&copy; 2024 Progetto Didattico - Esercizi Quinta</p>
        </div>
    </div>
</body>
</html>
HTML;

    $response->getBody()->write($html);
    return $response;
});

$app->run();
