<?php 

$pdo= new PDO("mysql:host=localhost;dbname=client_fidèl","root","" );

// Affiche pour chaque commande : order_id, user_name, amount. Dans une page PHP
$sql=" 
Select orders.id, users.name ,orders.amount
From orders
join users
On users.id=orders.user_id
";

$stmt= $pdo->query($sql);
$oders=$stmt->fetchAll(PDO::FETCH_ASSOC);




?>

<h2>Les commandes</h2>

<table border="1">
<tr>
    <th>Commande ID</th>
    <th>Nom du client</th>
     <th>Le prix</th>
</tr>

<?php foreach ($oders as $oder): ?>
<tr>
   <td><?= $oder['id'] ?></td>
<td><?= $oder['name'] ?></td>
<td><?= $oder['amount'] ?></td>
</tr>
<?php endforeach; ?>
</table>