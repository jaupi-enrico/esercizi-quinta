<?php $this->layout('layout', ['titolo' => 'Elenco tabelline']) ?>
<main>
    <ul>
        <?php
        for($i = 0; $i < 10; $i++) {
            echo "<li>$i</li>";
        }
        ?>
    </ul>
</main>