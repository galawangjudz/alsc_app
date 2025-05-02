<h2>Lot #<?= $lot->id ?> Details</h2>

<ul>
    <li><strong>Site:</strong> <?= $lot->site_id ?></li>
    <li><strong>Block:</strong> <?= $lot->block ?></li>
    <li><strong>Lot:</strong> <?= $lot->lot ?></li>
    <li><strong>Area:</strong> <?= $lot->lot_area ?> sqm</li>
    <li><strong>Price/sqm:</strong> <?= $lot->price_per_sqm ?></li>
    <li><strong>Status:</strong> <?= $lot->status ?></li>
    <li><strong>Remarks:</strong> <?= $lot->remarks ?></li>
    <li><strong>Title Owner:</strong> <?= $lot->title_owner ?></li>
</ul>

<hr>

<h3>Houses</h3>
<?php if (!empty($houses)): ?>
    <ul>
        <?php foreach ($houses as $house): ?>
            <li><?= $house->model ?> – <?= $house->floor_area ?> sqm – Status: <?= $house->status ?></li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>No houses yet. <a href="<?= url('inventory/create_house/' . $lot->id) ?>">Add one</a></p>
<?php endif; ?>

<hr>

<h3>Fences</h3>
<?php if (!empty($fences)): ?>
    <ul>
        <?php foreach ($fences as $fence): ?>
            <li><?= $fence->fence_type ?> – <?= $fence->material ?> – <?= $fence->length ?>m</li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>No fences recorded.</p>
<?php endif; ?>

<hr>

<h3>Additional Costs</h3>
<?php if (!empty($costs)): ?>
    <ul>
        <?php foreach ($costs as $cost): ?>
            <li><?= $cost->description ?> – ₱<?= $cost->cost ?></li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>No additional costs.</p>
<?php endif; ?>
