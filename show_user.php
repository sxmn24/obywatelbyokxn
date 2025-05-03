<?php
require_once 'db.php';

$stmt = $db->query("SELECT * FROM obywatel ORDER BY id DESC LIMIT 1");
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user) {
    echo "<h2>Ostatnio zapisany obywatel:</h2>";
    echo "<p>Imię: {$user['imie']}</p>";
    echo "<p>Nazwisko: {$user['nazwisko']}</p>";
    echo "<p>PESEL: {$user['pesel']}</p>";
    echo "<p>Data urodzenia: {$user['data_urodzenia']}</p>";
    echo "<img src='{$user['zdjecie']}' alt='Zdjęcie' width='150'>";
} else {
    echo "Brak danych w bazie.";
}
?>