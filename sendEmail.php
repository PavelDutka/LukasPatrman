<?php
// Zpracování POST dat
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Validace dat
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Neplatný e-mail.");
    }

    // Nastavení příjemce a předmětu
    $to = "lukas@patrman.cz"; // Tvůj e-mail
    $subject = "Nová zpráva od $name";

    // Vytvoření zprávy
    $body = "Nová zpráva z kontaktního formuláře:\n\n";
    $body .= "Jméno: $name\n";
    $body .= "E-mail: $email\n";
    $body .= "Zpráva:\n$message\n";

    // Hlavičky
    $headers = "From: lukas@patrman.cz\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Odeslání e-mailu
    if (mail($to, $subject, $body, $headers)) {
        header("Location: dekujeme.html");
        exit;
    } else {
        echo "Došlo k chybě při odesílání e-mailu.";
    }
    
} else {
    echo "Formulář nebyl správně odeslán.";
}
?>
