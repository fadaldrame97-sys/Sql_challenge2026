<?php

$pdo = new PDO("mysql:host=localhost;dbname=client_fidel","root","");

$sql = "
SELECT 
    orders.id AS order_id,
    products.name AS product_name,
    order_items.quantity
FROM orders
JOIN order_items 
    ON orders.id = order_items.order_id
JOIN products 
    ON products.id = order_items.product_id
";

$stmt = $pdo->query($sql);
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<h2>Produits par commande</h2>

<table border="1">
<tr>
    <th>Order ID</th>
    <th>Produit</th>
    <th>Quantité</th>
</tr>

<?php foreach ($items as $item): ?>
<tr>
    <td><?= $item['order_id'] ?></td>
    <td><?= $item['product_name'] ?></td>
    <td><?= $item['quantity'] ?></td>
</tr>
<?php endforeach; ?>
</table>