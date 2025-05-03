<?php
// Plik: card_data.php
require_once 'db.php';

header('Content-Type: application/json');

// Pobierz ostatnie dane użytkownika
$stmt = $db->query("SELECT * FROM obywatel ORDER BY id DESC LIMIT 1");
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user) {
    echo json_encode($user);
} else {
    echo json_encode(["error" => "Brak danych"]);
}
?>