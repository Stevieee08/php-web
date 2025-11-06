<?php include '../db/connect.php'; ?>

<h2>Car Inventory</h2>
<table border="1" cellpadding="8">
<tr>
    <th>ID</th>
    <th>Brand</th>
    <th>Model</th>
    <th>Year</th>
    <th>Price</th>
    <th>Status</th>
    <th>Actions</th>
</tr>

<?php
$sql = "SELECT cars.*, brands.brand_name FROM cars
        JOIN brands ON cars.brand_id = brands.brand_id";
$stmt = $conn->query($sql);

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    echo "<td>{$row['car_id']}</td>";
    echo "<td>{$row['brand_name']}</td>";
    echo "<td>{$row['model']}</td>";
    echo "<td>{$row['year']}</td>";
    echo "<td>{$row['price']}</td>";
    echo "<td>{$row['status']}</td>";
    echo "<td>
            <a href='update.php?id={$row['car_id']}'>Edit</a> |
            <a href='delete.php?id={$row['car_id']}' onclick='return confirm(\"Delete this car?\")'>Delete</a>
          </td>";
    echo "</tr>";
}
?>
</table>
