<?php include '../db/connect.php'; ?>

<?php
$id = $_GET['id'] ?? null;
if ($id) {
    $stmt = $conn->prepare("DELETE FROM cars WHERE car_id = ?");
    $stmt->execute([$id]);
    echo "<p>Car deleted successfully.</p>";
}
?>
<a href="read.php">Back to list</a>
