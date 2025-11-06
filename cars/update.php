<?php include '../db/connect.php'; ?>

<?php
$id = $_GET['id'] ?? null;

if ($id) {
    $stmt = $conn->prepare("SELECT * FROM cars WHERE car_id = ?");
    $stmt->execute([$id]);
    $car = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $model = $_POST['model'];
    $year = $_POST['year'];
    $price = $_POST['price'];
    $status = $_POST['status'];

    $stmt = $conn->prepare("UPDATE cars SET model=?, year=?, price=?, status=? WHERE car_id=?");
    $stmt->execute([$model, $year, $price, $status, $id]);
    echo "<p>Car updated successfully!</p>";
}
?>

<form method="post">
    <label>Model:</label>
    <input type="text" name="model" value="<?= $car['model'] ?>" required><br>

    <label>Year:</label>
    <input type="number" name="year" value="<?= $car['year'] ?>" required><br>

    <label>Price:</label>
    <input type="number" name="price" value="<?= $car['price'] ?>" step="0.01" required><br>

    <label>Status:</label>
    <select name="status">
        <option value="available" <?= $car['status'] == 'available' ? 'selected' : '' ?>>Available</option>
        <option value="sold" <?= $car['status'] == 'sold' ? 'selected' : '' ?>>Sold</option>
    </select><br>

    <button type="submit">Update</button>
</form>
