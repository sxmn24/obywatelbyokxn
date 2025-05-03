<?php
// Plik: connect_and_insert.php

// Połączenie z bazą danych SQLite i utworzenie bazy, jeśli nie istnieje
$db = new PDO('sqlite:mobydane.db');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Tworzenie tabeli, jeśli nie istnieje
$db->exec("CREATE TABLE IF NOT EXISTS obywatel (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    imie TEXT,
    nazwisko TEXT,
    plec TEXT,
    data_urodzenia TEXT,
    pesel TEXT,
    obywatelstwo TEXT,
    nazwisko_rodowe TEXT,
    nazwisko_ojca TEXT,
    nazwisko_matki TEXT,
    miejsce_urodzenia TEXT,
    kraj_urodzenia TEXT,
    adres TEXT,
    kod_pocztowy TEXT,
    miasto TEXT,
    zdjecie TEXT
)");

// Formularz HTML + zapis danych
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $db->prepare("INSERT INTO obywatel 
        (imie, nazwisko, plec, data_urodzenia, pesel, obywatelstwo, nazwisko_rodowe, nazwisko_ojca, nazwisko_matki, miejsce_urodzenia, kraj_urodzenia, adres, kod_pocztowy, miasto, zdjecie) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->execute([
        $_POST["imie"] ?? '',
        $_POST["nazwisko"] ?? '',
        $_POST["plec"] ?? '',
        $_POST["data_urodzenia"] ?? '',
        $_POST["pesel"] ?? '',
        $_POST["obywatelstwo"] ?? '',
        $_POST["nazwisko_rodowe"] ?? '',
        $_POST["nazwisko_ojca"] ?? '',
        $_POST["nazwisko_matki"] ?? '',
        $_POST["miejsce_urodzenia"] ?? '',
        $_POST["kraj_urodzenia"] ?? '',
        $_POST["adres"] ?? '',
        $_POST["kod_pocztowy"] ?? '',
        $_POST["miasto"] ?? '',
        $_POST["zdjecie"] ?? ''
    ]);

    echo "<p>Dane zostały zapisane.</p>";
} else {
    echo '<form method="POST" action="">
        <input name="imie" placeholder="Imię"><br>
        <input name="nazwisko" placeholder="Nazwisko"><br>
        <select name="plec">
            <option value="Mężczyzna">Mężczyzna</option>
            <option value="Kobieta">Kobieta</option>
        </select><br>
        <input name="data_urodzenia" placeholder="Data urodzenia (RRRR-MM-DD)"><br>
        <input name="pesel" placeholder="PESEL"><br>
        <input name="obywatelstwo" placeholder="Obywatelstwo"><br>
        <input name="nazwisko_rodowe" placeholder="Nazwisko rodowe"><br>
        <input name="nazwisko_ojca" placeholder="Nazwisko ojca"><br>
        <input name="nazwisko_matki" placeholder="Nazwisko matki"><br>
        <input name="miejsce_urodzenia" placeholder="Miejsce urodzenia"><br>
        <input name="kraj_urodzenia" placeholder="Kraj urodzenia"><br>
        <input name="adres" placeholder="Adres zameldowania"><br>
        <input name="kod_pocztowy" placeholder="Kod pocztowy"><br>
        <input name="miasto" placeholder="Miasto"><br>
        <input name="zdjecie" placeholder="Link do zdjęcia"><br>
        <button type="submit">Zapisz dane</button>
    </form>';
}
?>
