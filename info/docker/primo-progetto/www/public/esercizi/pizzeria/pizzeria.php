<?php
session_start();

$nome = trim($_POST['nome'] ?? '');
$email = trim($_POST['email'] ?? '');
$telefono = trim($_POST['telefono'] ?? '');
$sistemazione = trim($_POST['sistemazione'] ?? '');
$pizza = trim($_POST['pizza'] ?? '');
$impasto = trim($_POST['impasto'] ?? '');
$aggiunte = $_POST['aggiunte'] ?? [];
$note = trim($_POST['note'] ?? '');

$errori = [];
$ordine_confermato = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($nome === '') $errori[] = 'Il nome e cognome sono obbligatori.';
    if ($email === '') $errori[] = 'L\'email è obbligatoria.';
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errori[] = 'L\'email non è valida.';
    if ($telefono === '') $errori[] = 'Il telefono è obbligatorio.';
    if ($sistemazione === '') $errori[] = 'Seleziona un tipo di sistemazione.';
    if ($pizza === '') $errori[] = 'Seleziona un tipo di pizza.';
    if ($impasto === '') $errori[] = 'Seleziona un tipo di impasto.';

    if (empty($errori)) {
        $ordine_confermato = true;
    }
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prenotazione Pizzeria</title>
</head>
<body>
<main>
    <h1>Prenotazione Pizzeria</h1>

    <?php if (!empty($errori)): ?>
        <h2>Attenzione!</h2>
        <p>Inserisci tutti i dati obbligatori:</p>
        <ul>
            <?php foreach ($errori as $errore): ?>
                <li><?= htmlspecialchars($errore) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <?php if ($ordine_confermato): ?>
        <h2>Ordine effettuato correttamente!</h2>
        <table border="1">
            <tr>
                <td>Nome:</td>
                <td><?= htmlspecialchars($nome) ?></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><?= htmlspecialchars($email) ?></td>
            </tr>
            <tr>
                <td>Telefono:</td>
                <td><?= htmlspecialchars($telefono) ?></td>
            </tr>
            <tr>
                <td>Sistemazione:</td>
                <td><?= htmlspecialchars($sistemazione) ?></td>
            </tr>
            <tr>
                <td>Pizza:</td>
                <td><?= htmlspecialchars($pizza) ?></td>
            </tr>
            <tr>
                <td>Impasto:</td>
                <td><?= htmlspecialchars($impasto) ?></td>
            </tr>
            <?php if (!empty($aggiunte)): ?>
                <tr>
                    <td>Aggiunte:</td>
                    <td><?= htmlspecialchars(implode(', ', $aggiunte)) ?></td>
                </tr>
            <?php endif; ?>
            <?php if ($note !== ''): ?>
                <tr>
                    <td>Note:</td>
                    <td><?= htmlspecialchars($note) ?></td>
                </tr>
            <?php endif; ?>
        </table>
        <p><a href="pizzeria.php">Nuova Prenotazione</a></p>
    <?php else: ?>
        <form method="POST" action="">
            <p>
                <label for="nome">Nome e Cognome (*)</label><br>
                <input type="text" id="nome" name="nome" placeholder="Es. Mario Rossi" value="<?= htmlspecialchars($nome) ?>">
            </p>

            <p>
                <label for="email">Email (*)</label><br>
                <input type="email" id="email" name="email" placeholder="Es. mario@example.com" value="<?= htmlspecialchars($email) ?>">
            </p>

            <p>
                <label for="telefono">Telefono (*)</label><br>
                <input type="text" id="telefono" name="telefono" placeholder="Es. 333 123 4567" value="<?= htmlspecialchars($telefono) ?>">
            </p>

            <fieldset>
                <legend>Tipo di sistemazione (*)</legend>
                <input type="radio" id="tavolo" name="sistemazione" value="Tavolo" <?= $sistemazione === 'Tavolo' ? 'checked' : '' ?>>
                <label for="tavolo">Tavolo</label><br>
                <input type="radio" id="bancone" name="sistemazione" value="Bancone" <?= $sistemazione === 'Bancone' ? 'checked' : '' ?>>
                <label for="bancone">Bancone</label><br>
                <input type="radio" id="terrazza" name="sistemazione" value="Terrazza" <?= $sistemazione === 'Terrazza' ? 'checked' : '' ?>>
                <label for="terrazza">Terrazza</label>
            </fieldset>

            <p>
                <label for="pizza">Tipo di pizza (*)</label><br>
                <select id="pizza" name="pizza">
                    <option value="">-- Seleziona --</option>
                    <option value="Margherita" <?= $pizza === 'Margherita' ? 'selected' : '' ?>>Margherita</option>
                    <option value="Marinara" <?= $pizza === 'Marinara' ? 'selected' : '' ?>>Marinara</option>
                    <option value="Quattro Formaggi" <?= $pizza === 'Quattro Formaggi' ? 'selected' : '' ?>>Quattro Formaggi</option>
                    <option value="Diavola" <?= $pizza === 'Diavola' ? 'selected' : '' ?>>Diavola</option>
                    <option value="Capricciosa" <?= $pizza === 'Capricciosa' ? 'selected' : '' ?>>Capricciosa</option>
                    <option value="Prosciutto e Funghi" <?= $pizza === 'Prosciutto e Funghi' ? 'selected' : '' ?>>Prosciutto e Funghi</option>
                    <option value="Carnivora" <?= $pizza === 'Carnivora' ? 'selected' : '' ?>>Carnivora</option>
                    <option value="Vegetariana" <?= $pizza === 'Vegetariana' ? 'selected' : '' ?>>Vegetariana</option>
                </select>
            </p>

            <fieldset>
                <legend>Tipo di impasto (*)</legend>
                <input type="radio" id="classico" name="impasto" value="Classico" <?= $impasto === 'Classico' ? 'checked' : '' ?>>
                <label for="classico">Classico</label><br>
                <input type="radio" id="integrale" name="impasto" value="Integrale" <?= $impasto === 'Integrale' ? 'checked' : '' ?>>
                <label for="integrale">Integrale</label><br>
                <input type="radio" id="senzaglutine" name="impasto" value="Senza Glutine" <?= $impasto === 'Senza Glutine' ? 'checked' : '' ?>>
                <label for="senzaglutine">Senza Glutine</label>
            </fieldset>

            <fieldset>
                <legend>Aggiunte (opzionali)</legend>
                <input type="checkbox" id="formaggio" name="aggiunte[]" value="Formaggio Extra" <?= in_array('Formaggio Extra', $aggiunte) ? 'checked' : '' ?>>
                <label for="formaggio">Formaggio Extra</label><br>
                <input type="checkbox" id="bacon" name="aggiunte[]" value="Bacon" <?= in_array('Bacon', $aggiunte) ? 'checked' : '' ?>>
                <label for="bacon">Bacon</label><br>
                <input type="checkbox" id="verdure" name="aggiunte[]" value="Verdure Grigliate" <?= in_array('Verdure Grigliate', $aggiunte) ? 'checked' : '' ?>>
                <label for="verdure">Verdure Grigliate</label><br>
                <input type="checkbox" id="peperoni" name="aggiunte[]" value="Peperoni" <?= in_array('Peperoni', $aggiunte) ? 'checked' : '' ?>>
                <label for="peperoni">Peperoni</label><br>
                <input type="checkbox" id="cipolla" name="aggiunte[]" value="Cipolla Caramellata" <?= in_array('Cipolla Caramellata', $aggiunte) ? 'checked' : '' ?>>
                <label for="cipolla">Cipolla Caramellata</label>
            </fieldset>

            <p>
                <label for="note">Note aggiuntive</label><br>
                <textarea id="note" name="note" placeholder="Es. Niente cipolla, allergico ai crostacei..."><?= htmlspecialchars($note) ?></textarea>
            </p>

            <p>
                <button type="reset">Reset</button>
                <button type="submit">Invia Prenotazione</button>
            </p>
        </form>
    <?php endif; ?>
</main>
</body>
</html>
