<?php
$lot = Lot::find($_GET['lot_id']);
$houses = House::getByLot($lot->id);
?>
<h3>Lot & House Details</h3>

<div class="card mb-3">
    <div class="card-body">
        <h5>Block <?= $lot->block_number ?> - Lot <?= $lot->lot_number ?></h5>
        <p>Area: <?= $lot->area ?> sqm</p>
        <p>Status: <?= ucfirst($lot->status) ?></p>
    </div>
</div>

<h4>House Details</h4>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Model</th>
            <th>Floor Area</th>
            <th>Price</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($houses as $house): ?>
            <tr>
                <td><?= $house->model ?></td>
                <td><?= $house->floor_area ?> sqm</td>
                <td>₱<?= number_format($house->price) ?></td>
                <td><?= ucfirst($house->status) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
