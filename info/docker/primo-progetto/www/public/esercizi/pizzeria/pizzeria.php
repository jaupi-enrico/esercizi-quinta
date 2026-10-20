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
    <link rel="stylesheet" href="../../assets/style.css">
</head>
<body>
<div class="page">
    <h1>🍕 Prenotazione Pizzeria</h1>

    <?php if (!empty($errori)): ?>
        <div class="alert alert-error">
            <h2>⚠️ Attenzione!</h2>
            <p>Inserisci tutti i dati obbligatori:</p>
            <ul>
                <?php foreach ($errori as $errore): ?>
                    <li><?= htmlspecialchars($errore) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php if ($ordine_confermato): ?>
        <div class="alert alert-success">
            <h2>✓ Ordine effettuato correttamente!</h2>
            <div class="summary-item">
                <span class="summary-label">Nome:</span>
                <span class="summary-value"><?= htmlspecialchars($nome) ?></span>
            </div>
            <div class="summary-item">
                <span class="summary-label">Email:</span>
                <span class="summary-value"><?= htmlspecialchars($email) ?></span>
            </div>
            <div class="summary-item">
                <span class="summary-label">Telefono:</span>
                <span class="summary-value"><?= htmlspecialchars($telefono) ?></span>
            </div>
            <div class="summary-item">
                <span class="summary-label">Sistemazione:</span>
                <span class="summary-value"><?= htmlspecialchars($sistemazione) ?></span>
            </div>
            <div class="summary-item">
                <span class="summary-label">Pizza:</span>
                <span class="summary-value"><?= htmlspecialchars($pizza) ?></span>
            </div>
            <div class="summary-item">
                <span class="summary-label">Impasto:</span>
                <span class="summary-value"><?= htmlspecialchars($impasto) ?></span>
            </div>
            <?php if (!empty($aggiunte)): ?>
                <div class="summary-item">
                    <span class="summary-label">Aggiunte:</span>
                    <span class="summary-value"><?= htmlspecialchars(implode(', ', $aggiunte)) ?></span>
                </div>
            <?php endif; ?>
            <?php if ($note !== ''): ?>
                <div class="summary-item">
                    <span class="summary-label">Note:</span>
                    <span class="summary-value"><?= htmlspecialchars($note) ?></span>
                </div>
            <?php endif; ?>
        </div>
        <a href="pizzeria.php" class="btn btn-primary" style="display: block; text-align: center;">← Nuova Prenotazione</a>
    <?php else: ?>
        <form method="POST" action="">
            <div class="form-group">
                <label for="nome" class="required">Nome e Cognome</label>
                <input type="text" id="nome" name="nome" placeholder="Es. Mario Rossi" value="<?= htmlspecialchars($nome) ?>">
            </div>

            <div class="form-group">
                <label for="email" class="required">Email</label>
                <input type="email" id="email" name="email" placeholder="Es. mario@example.com" value="<?= htmlspecialchars($email) ?>">
            </div>

            <div class="form-group">
                <label for="telefono" class="required">Telefono</label>
                <input type="text" id="telefono" name="telefono" placeholder="Es. 333 123 4567" value="<?= htmlspecialchars($telefono) ?>">
            </div>

            <fieldset>
                <legend class="required">Tipo di sistemazione</legend>
                <div class="radio-group">
                    <div class="radio-item">
                        <input type="radio" id="tavolo" name="sistemazione" value="Tavolo" <?= $sistemazione === 'Tavolo' ? 'checked' : '' ?>>
                        <label for="tavolo">Tavolo</label>
                    </div>
                    <div class="radio-item">
                        <input type="radio" id="bancone" name="sistemazione" value="Bancone" <?= $sistemazione === 'Bancone' ? 'checked' : '' ?>>
                        <label for="bancone">Bancone</label>
                    </div>
                    <div class="radio-item">
                        <input type="radio" id="terrazza" name="sistemazione" value="Terrazza" <?= $sistemazione === 'Terrazza' ? 'checked' : '' ?>>
                        <label for="terrazza">Terrazza</label>
                    </div>
                </div>
            </fieldset>

            <div class="form-group">
                <label for="pizza" class="required">Tipo di pizza</label>
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
            </div>

            <fieldset>
                <legend class="required">Tipo di impasto</legend>
                <div class="radio-group">
                    <div class="radio-item">
                        <input type="radio" id="classico" name="impasto" value="Classico" <?= $impasto === 'Classico' ? 'checked' : '' ?>>
                        <label for="classico">Classico</label>
                    </div>
                    <div class="radio-item">
                        <input type="radio" id="integrale" name="impasto" value="Integrale" <?= $impasto === 'Integrale' ? 'checked' : '' ?>>
                        <label for="integrale">Integrale</label>
                    </div>
                    <div class="radio-item">
                        <input type="radio" id="senzaglutine" name="impasto" value="Senza Glutine" <?= $impasto === 'Senza Glutine' ? 'checked' : '' ?>>
                        <label for="senzaglutine">Senza Glutine</label>
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <legend>Aggiunte (opzionali)</legend>
                <div class="checkbox-group">
                    <div class="checkbox-item">
                        <input type="checkbox" id="formaggio" name="aggiunte[]" value="Formaggio Extra" <?= in_array('Formaggio Extra', $aggiunte) ? 'checked' : '' ?>>
                        <label for="formaggio">Formaggio Extra</label>
                    </div>
                    <div class="checkbox-item">
                        <input type="checkbox" id="bacon" name="aggiunte[]" value="Bacon" <?= in_array('Bacon', $aggiunte) ? 'checked' : '' ?>>
                        <label for="bacon">Bacon</label>
                    </div>
                    <div class="checkbox-item">
                        <input type="checkbox" id="verdure" name="aggiunte[]" value="Verdure Grigliate" <?= in_array('Verdure Grigliate', $aggiunte) ? 'checked' : '' ?>>
                        <label for="verdure">Verdure Grigliate</label>
                    </div>
                    <div class="checkbox-item">
                        <input type="checkbox" id="peperoni" name="aggiunte[]" value="Peperoni" <?= in_array('Peperoni', $aggiunte) ? 'checked' : '' ?>>
                        <label for="peperoni">Peperoni</label>
                    </div>
                    <div class="checkbox-item">
                        <input type="checkbox" id="cipolla" name="aggiunte[]" value="Cipolla Caramellata" <?= in_array('Cipolla Caramellata', $aggiunte) ? 'checked' : '' ?>>
                        <label for="cipolla">Cipolla Caramellata</label>
                    </div>
                </div>
            </fieldset>

            <div class="form-group">
                <label for="note">Note aggiuntive</label>
                <textarea id="note" name="note" placeholder="Es. Niente cipolla, allergico ai crostacei..."><?= htmlspecialchars($note) ?></textarea>
            </div>

            <div class="buttons">
                <button type="reset" class="btn-secondary">Reset</button>
                <button type="submit" class="btn-primary">Invia Prenotazione</button>
            </div>
        </form>
    <?php endif; ?>
</div>
</body>
</html>
