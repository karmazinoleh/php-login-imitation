<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $filePath = 'data.json';
    $username = $_POST['username'];
    $data = $_POST['data'];

    $dataToSave = [
        'username' => $username,
        'data' => $data
    ];

    if (file_exists($filePath)) {
        $existingData = json_decode(file_get_contents($filePath), true);
    } else {
        $existingData = [];
    }

    $existingData[] = $dataToSave;

    file_put_contents($filePath, json_encode($existingData, JSON_PRETTY_PRINT));

    echo "Dane zostały zapisane!";
} else {
    echo "Niepoprawna metoda żądania.";
}
?>
