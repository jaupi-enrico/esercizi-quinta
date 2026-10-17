<?php
$cognome = trim($_POST['cognome'] ?? '');
$nome = trim($_POST['nome'] ?? '');
$email = trim($_POST['email'] ?? '');
$lingua = trim($_POST['lingua'] ?? '');
$livello = trim($_POST['livello'] ?? '');
$orari = $_POST['orario'] ?? [];
$richieste = trim($_POST['richieste'] ?? '');

$errori = [];
if ($cognome === '') $errori[] = 'Il cognome è obbligatorio.';
if ($nome === '') $errori[] = 'Il nome è obbligatorio.';
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errori[] = 'L\'email non è valida.';
if ($lingua === '') $errori[] = 'La lingua è obbligatoria.';
if ($livello === '') $errori[] = 'Il livello è obbligatorio.';
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= !empty($errori) ? 'Richiesta non valida' : 'Riepilogo richiesta' ?></title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="page">
    <?php if (!empty($errori)): ?>
        <h1>🌍 Richiesta corsi di lingua</h1>
        <div class="alert alert-error">
            <h2>⚠️ Richiesta non valida</h2>
            <p>Inserisci tutti i dati obbligatori:</p>
            <ul>
                <?php foreach ($errori as $errore): ?>
                    <li><?= htmlspecialchars($errore) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <a href="form.html" class="btn btn-primary" style="display: block;">Torna al modulo</a>
    <?php else: ?>
        <h1>✅ Richiesta inviata</h1>
        <div class="alert alert-success" style="text-align: left;">
            <div class="summary-item">
                <span class="summary-label">Nome:</span>
                <span class="summary-value"><?= htmlspecialchars($cognome) ?> <?= htmlspecialchars($nome) ?></span>
            </div>
            <div class="summary-item">
                <span class="summary-label">Corso:</span>
                <span class="summary-value"><?= htmlspecialchars($lingua) ?> - livello <?= htmlspecialchars($livello) ?></span>
            </div>
            <div class="summary-item">
                <span class="summary-label">Orari preferiti:</span>
                <span class="summary-value"><?= $orari ? htmlspecialchars(implode(', ', $orari)) : 'nessuna preferenza' ?></span>
            </div>
            <div class="summary-item">
                <span class="summary-label">Altre richieste:</span>
                <span class="summary-value"><?= $richieste !== '' ? htmlspecialchars($richieste) : 'nessuna' ?></span>
            </div>
        </div>
        <p style="text-align: center;">Stiamo verificando tutti i dati, le invieremo la risposta a <strong><?= htmlspecialchars($email) ?></strong></p>
    <?php endif; ?>
</div>
</body>
</html>
