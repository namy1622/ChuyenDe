<?php

$id = $_POST['product_id'];

if (!$id) {
    echo "id not found\n";
    die();
}

echo "Prepare send promotion mail job for product id $id \n";

if (strtoupper(PHP_OS) === 'LINUX') {
    $command = "php jobs/SendPromotionMailJob.php $id > /dev/null &";
} else {
    $command = "start php jobs/SendPromotionMailJob.php $id";
}

exec($command);

echo "Job dispatched\n";
