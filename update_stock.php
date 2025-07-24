<?php
header('Content-Type: application/json');

$input = json_decode(file_get_contents("php://input"), true);
if (!$input || !isset($input['id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid input']);
    exit;
}

$stockFile = 'stock.json';

if (!file_exists($stockFile)) {
    echo json_encode(['status' => 'error', 'message' => 'stock.json not found']);
    exit;
}

$products = json_decode(file_get_contents($stockFile), true);

foreach ($products as &$product) {
    if ($product['id'] == $input['id']) {
        $product['stock'] = $input['stock'];
        break;
    }
}

file_put_contents($stockFile, json_encode($products, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

echo json_encode(['status' => 'success', 'message' => 'Stock updated']);
?>
