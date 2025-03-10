<?php
$data = json_decode(file_get_contents('php://input'), true);

$table = $data['table'];

$orders = json_decode(file_get_contents('orders.json'), true);
$tableOrders = array_filter($orders, function($order) use ($table) {
    return $order['table'] == $table;
});

echo json_encode(array_values($tableOrders));
?>
