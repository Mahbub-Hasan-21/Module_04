<?php
$id = $_GET['id'];

require_once "../../app/classes/VehicleManager.php";

$vehicle = new VehicleManager('','','','');
$vehicles = $vehicle->getVehicles();

$isPresent = $vehicles[$id] ?? null;
if ($id == null || !$isPresent) {
    header('Location: ../index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['confirm']) && $_POST['confirm'] === 'yes') {
        $vehicle->deleteVehicle($id);
        header('Location: ../index.php');
    }
}


include './header.php';
?>

<div class="container my-4">
    <h1>Delete Vehicle</h1>
    <p>Are you sure you want to delete <strong><?= $vehicles[$id]['name']; ?> </strong>?</p>
    <form method="POST">
        <button type="submit" name="confirm" value="yes" class="btn btn-danger">Yes, Delete</button>
        <a href="../index.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

</body>
</html>