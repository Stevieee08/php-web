<?php include '../db/connect.php'; ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $brand_id = $_POST['brand_id'];
    $model = $_POST['model'];
    $year = $_POST['year'];
    $price = $_POST['price'];

    if (!empty($brand_id) && !empty($model) && !empty($year) && !empty($price)) {
        $sql = "INSERT INTO cars (brand_id, model, year, price) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$brand_id, $model, $year, $price]);
        echo "<p>Car added successfully!</p>";
    } else {
        echo "<p>Please fill all fields.</p>";
    }
}
?>

<form method="post">
    <label>Brand ID:</label>
    <input type="number" name="brand_id" required><br>

    <label>Model:</label>
    <input type="text" name="model" required><br>

    <label>Year:</label>
    <input type="number" name="year" min="1990" max="2025" required><br>

    <label>Price:</label>
    <input type="number" name="price" step="0.01" required><br>

    <button type="submit">Add Car</button>
</form>
