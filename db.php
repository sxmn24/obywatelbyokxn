<?php
// Plik: db.php
try {
    $db = new PDO('sqlite:mobydane.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Błąd połączenia z bazą: " . $e->getMessage());
}
?>
