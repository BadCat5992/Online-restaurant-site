<?php
$data = json_decode(file_get_contents('php://input'), true);

$index = $data['index'];
$status = $data['status'];

$orders = json_decode(file_get_contents('orders.json'), true);

$orders[$index]['status'] = $status;

file_put_contents('orders.json', json_encode($orders, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));

echo "Bestellung aktualisiert!";
?>
