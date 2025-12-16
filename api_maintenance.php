<?php
header('Content-Type: application/json');
$file = 'maintenance.txt';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    $mode = isset($input['maintenance']) && $input['maintenance'] ? '1' : '0';
    file_put_contents($file, $mode);
    echo json_encode(['maintenance' => $mode === '1']);
} else {
    $mode = file_exists($file) ? trim(file_get_contents($file)) : '0';
    echo json_encode(['maintenance' => $mode === '1']);
}
?>
