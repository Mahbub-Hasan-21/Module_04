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
    if (isset($_POST['name'], $_POST['type'], $_POST['price'], $_POST['image'])) {
        $data = [
            'name'  => $_POST['name'],
            'type'  => $_POST['type'],
            'price' => $_POST['price'],
            'image' => $_POST['image']
        ];
        $vehicle->editVehicle($id, $data);
        header('Location: ../index.php');
    }
}

include './header.php';
?>


<div class="container my-4">
    <h1>Edit Vehicle</h1>
    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Vehicle Name</label>
            <input type="text" name="name" class="form-control" value="<?= $vehicles[$id]['name']; ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Vehicle Type</label>
            <input type="text" name="type" class="form-control" value="<?= $vehicles[$id]['type']; ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="number" name="price" class="form-control" value="<?= $vehicles[$id]['price']; ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Image URL</label>
            <input type="text" name="image" class="form-control" value="<?= $vehicles[$id]['image']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Vehicle</button>
        <a href="../index.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

</body>
</html>