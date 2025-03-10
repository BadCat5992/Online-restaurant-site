<?php
$data = json_decode(file_get_contents('php://input'), true);

$orders = [];
if (file_exists('orders.json')) {
    $orders = json_decode(file_get_contents('orders.json'), true);
}

$commissions = [];
if (file_exists('commissions.json')) {
    $commissions = json_decode(file_get_contents('commissions.json'), true);
}

foreach ($data as $order) {
    $orders[] = $order;

    // Berechne 2% des Preises und speichere es in einer separaten Datei
    $commission = $order['price'] * $order['quantity'] * 0.02;
    $commissions[] = [
        'table' => $order['table'],
        'product' => $order['product'],
        'commission' => $commission
    ];
}

file_put_contents('orders.json', json_encode($orders, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
file_put_contents('commissions.json', json_encode($commissions, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));

echo "Bestellungen gespeichert!";
?>
