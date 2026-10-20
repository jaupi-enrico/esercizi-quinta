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
</head>
<body>
<main>
    <?php if (!empty($errori)): ?>
        <h1>Richiesta corsi di lingua</h1>
        <h2>Richiesta non valida</h2>
        <p>Inserisci tutti i dati obbligatori:</p>
        <ul>
            <?php foreach ($errori as $errore): ?>
                <li><?= htmlspecialchars($errore) ?></li>
            <?php endforeach; ?>
        </ul>
        <p><a href="form.html">Torna al modulo</a></p>
    <?php else: ?>
        <h1>Richiesta inviata</h1>
        <table border="1">
            <tr>
                <td>Nome:</td>
                <td><?= htmlspecialchars($cognome) ?> <?= htmlspecialchars($nome) ?></td>
            </tr>
            <tr>
                <td>Corso:</td>
                <td><?= htmlspecialchars($lingua) ?> - livello <?= htmlspecialchars($livello) ?></td>
            </tr>
            <tr>
                <td>Orari preferiti:</td>
                <td><?= $orari ? htmlspecialchars(implode(', ', $orari)) : 'nessuna preferenza' ?></td>
            </tr>
            <tr>
                <td>Altre richieste:</td>
                <td><?= $richieste !== '' ? htmlspecialchars($richieste) : 'nessuna' ?></td>
            </tr>
        </table>
        <p>Stiamo verificando tutti i dati, le invieremo la risposta a <strong><?= htmlspecialchars($email) ?></strong></p>
    <?php endif; ?>
</main>
</body>
</html>
