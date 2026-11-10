<?php
/** @var $titolo*/
?>

<?php $this->layout('layout', [
    'titolo' => $titolo
]); ?>

<main
    <h1>Pagina personale di <?= $persona['nome'] . ' ' . $persona['cognome']?></h1>
    <div>
        <img src="img/<? $persona['immagine'] ?>" alt="">
    </div>
</main>