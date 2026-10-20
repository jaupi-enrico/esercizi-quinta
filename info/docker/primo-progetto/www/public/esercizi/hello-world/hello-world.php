<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello World</title>
</head>
<body>
    <main>
        <h1><?php echo "Hello " . htmlspecialchars($_GET['nome'] ?? 'mondo') . "!"; ?></h1>
        <p>Questo è il primo programma vero</p>
    </main>
</body>
</html>
