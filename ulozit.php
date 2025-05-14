<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jmena = $_POST['jmeno'];
    $soubor = fopen("ucast.txt", "a");

    // Oddělovač mezi přihláškami
    fwrite($soubor, "______________________________\n");

    foreach ($jmena as $jmeno) {
        $jmeno = trim($jmeno);
        if (!empty($jmeno)) {
            fwrite($soubor, $jmeno . "\n");
        }
    }

    fwrite($soubor, "\n"); // prázdný řádek navíc pro přehlednost

    fclose($soubor);

    // Přesměrování na děkovací stránku
    header("Location: dekujeme.html");
    exit();
}
?>