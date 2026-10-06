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

if (!empty($errori)) {
    ?>
    <!DOCTYPE html>
    <html lang="it">
    <head>
        <meta charset="UTF-8">
        <title>Errore</title>
    </head>
    <body>
    <h1>Richiesta non valida</h1>
    <ul>
        <?php foreach ($errori as $errore): ?>
            <li><?= htmlspecialchars($errore) ?></li>
        <?php endforeach; ?>
    </ul>
    <p><a href="form.html">Torna al modulo</a></p>
    </body>
    </html>
    <?php
    exit;
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Riepilogo richiesta</title>
</head>
<body>
<p>Gentile <?= htmlspecialchars($cognome) ?> <?= htmlspecialchars($nome) ?></p>
<p>Lei ha richiesto l'iscrizione al corso <?= htmlspecialchars($lingua) ?> livello <?= htmlspecialchars($livello) ?> con orari:</p>
<p><?= $orari ? htmlspecialchars(implode(', ', $orari)) : 'nessuna preferenza' ?></p>
<p>Altre richieste:</p>
<p><?= $richieste !== '' ? htmlspecialchars($richieste) : 'nessuna' ?></p>
<p>Stiamo verificando tutti i dati, le invieremo la risposta a <?= htmlspecialchars($email) ?></p>
</body>
</html>
