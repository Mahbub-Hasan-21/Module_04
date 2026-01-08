<?php
require_once "../app/classes/VehicleManager.php";

$vehicle = new VehicleManager('','','','');
$vehicles = $vehicle->getVehicles();


include './views/header.php';
?>


<div class="container my-4">
    <h1>Vehicle Listing</h1>
    <a href="./../public/views/add.php" class="btn btn-success mb-4">Add Vehicle</a>
    <div class="row">
        <!-- Loop Go here -->

        <?php if(empty($vehicles)): ?>

            <div class="container text-center">
                    <div class="row">
                            <div class="col-md-3" style="margin: 0 auto;">
                                <div class="alert alert-danger " role="alert">
                                No Vehicles Exists!
                                </div>
                            </div>
                    </div>
                </div>

            <?php else: ?>
                <?php foreach ($vehicles as $id => $vehicle): ?>
            <div class="col-md-4">
                <div class="card mt-3 mb-3">
                    <img src="<?=  $vehicle['image']; ?>" class="card-img-top" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title"><?=  $vehicle['name']; ?></h5> 
                         <p class="card-text">Type: <?=  $vehicle['type']; ?></p>
                        <p class="card-text">Price: $<?=  $vehicle['price']; ?></p>
                        <a href="./views/edit.php?id=<?=  $id; ?>" class="btn btn-primary">Edit</a>
                        <a href="./views/delete.php?id=<?=  $id; ?>" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        <?php endif; ?>
        <!-- Loop ends here -->
    </div>
</div>

</body>
</html>
