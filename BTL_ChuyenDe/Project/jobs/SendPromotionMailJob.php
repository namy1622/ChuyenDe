<?php
require_once 'services/ProductService.php';

sleep(100);

return;

if ($argc < 2) {
    echo "php background_task.php <product_id>\n";
    exit(1);
}

$productId = $argv[1];

$productService = new ProductService();

$productService->sendPromotionMail($productId);

echo "Background task completed.\n";