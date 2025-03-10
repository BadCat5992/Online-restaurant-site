<?php
$data = json_decode(file_get_contents('php://input'), true);

$table = $data['table'];

$orders = json_decode(file_get_contents('orders.json'), true);
$remainingOrders = array_filter($orders, function($order) use ($table) {
    return $order['table'] != $table;
});

file_put_contents('orders.json', json_encode(array_values($remainingOrders), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));

echo "Bestellungen für Tisch $table gelöscht!";
?>
