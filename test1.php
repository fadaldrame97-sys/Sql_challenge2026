<?php 

$pdo= new PDO("mysql:host=localhost;dbname=client_fidèl","root","" );


$sql=" 
Select user_id, COUNT(*) as Total_commandes
From orders
GROUP BY user_id
";

$stmt= $pdo->query($sql);
$clients=$stmt->fetchAll(PDO::FETCH_ASSOC);




?>

<h2>Clients fidèles</h2>

<table border="1">
<tr>
    <th>User ID</th>
    <th>Nombre de commandes</th>
</tr>

<?php foreach ($clients as $client): ?>
<tr>
    <td><?= $client['user_id'] ?></td>
    <td><?= $client['Total_commandes'] ?></td>
</tr>
<?php endforeach; ?>
</table>