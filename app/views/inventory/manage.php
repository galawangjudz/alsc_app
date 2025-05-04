<h2><?= isset($lot) ? "Edit Inventory #{$lot->id}" : "Create New Lot Inventory" ?></h2>

<form method="POST" action="<?= url('inventory/save_lot') ?>">
    <input type="hidden" name="id" value="<?= $lot->id ?? '' ?>">

    <label>Phase:</label>
    <select name="site_id" required>
        <option value="">-- Select Project --</option>
        <?php foreach ($projects as $project): ?>
            <option value="<?= $project->c_code ?>" 
                <?= ($lot->site_id ?? '') == $project->c_code ? 'selected' : '' ?>>
                <?= $project->c_acronym ?>
            </option>
        <?php endforeach; ?>
    </select>
    <br>
    <label>Block:</label>
    <input type="text" name="block" value="<?= $lot->block ?? '' ?>" required><br>

    <label>Lot:</label>
    <input type="text" name="lot" value="<?= $lot->lot ?? '' ?>" required><br>

    <label>Area (sqm):</label>
    <input type="text" name="lot_area" value="<?= $lot->lot_area ?? '' ?>" required><br>

    <label>Status:</label>
    <select name="status" required>
        <?php
        $statuses = ['Available', 'On Hold', 'Sold', 'Reservation'];
        foreach ($statuses as $status):
        ?>
            <option value="<?= $status ?>" <?= ($lot->status ?? '') == $status ? 'selected' : '' ?>>
                <?= $status ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <label>Title Status:</label>
    <select name="title">
        <option value="">-- Select Title Status --</option>
        <option value="With Title" <?= ($lot->title ?? '') == 'With Title' ? 'selected' : '' ?>>With Title</option>
        <option value="Without Title" <?= ($lot->title?? '') == 'Without Title' ? 'selected' : '' ?>>Without Title</option>
    </select><br>

    <label>Title Owner:</label>
    <input type="text" name="title_owner" value="<?= $lot->title_owner ?? '' ?>"><br>

    <label>Remarks:</label>
    <textarea name="remarks"><?= $lot->remarks ?? '' ?></textarea><br>

    <button type="submit"><?= isset($lot) ? 'Update Lot' : 'Create Lot' ?></button>
</form>


<hr>

<?php if (isset($lot)): ?>
<h3>House Info</h3>
<form method="POST" action="<?= url('inventory/save_house') ?>">
    <input type="hidden" name="lot_id" value="<?= $lot->id ?>">
    <label>Model:</label>
    <input type="text" name="model" value="<?= $house->model ?? '' ?>"><br>

    <label>Floor Area:</label>
    <input type="text" name="floor_area" value="<?= $house->floor_area ?? '' ?>"><br>

    <label>Price per Sqm:</label>
    <input type="text" name="price_per_sqm" value="<?= $house->price_per_sqm ?? '' ?>"><br>

    <label>Status:</label>
    <input type="text" name="status" value="<?= $house->status ?? '' ?>"><br>

    <label>Unit Status:</label>
    <input type="text" name="unit_status" value="<?= $house->unit_status ?? '' ?>"><br>

    <button type="submit"><?= isset($house) ? 'Update House' : 'Add House' ?></button>
</form>

<hr>

<h3>Fences</h3>
<form method="POST" action="<?= url('inventory/add_fence') ?>">
    <input type="hidden" name="lot_id" value="<?= $lot->id ?>">
    <label>Type:</label>
    <input type="text" name="fence_type" required>
    <label>Material:</label>
    <input type="text" name="material" required>
    <label>Length (m):</label>
    <input type="text" name="length" required>
    <label>Cost:</label>
    <input type="text" name="cost" required>
    <button type="submit">Add Fence</button>
</form>

<ul>
<?php foreach ($fences as $f): ?>
    <li><?= $f->fence_type ?> (<?= $f->length ?>m) - <?= $f->cost ?> 
        <a href="<?= url('inventory/delete_fence/' . $f->id) ?>">Delete</a>
    </li>
<?php endforeach; ?>
</ul>

<hr>

<h3>Additional Costs</h3>
<form method="POST" action="<?= url('inventory/add_cost') ?>">
    <input type="hidden" name="lot_id" value="<?= $lot->id ?>">
    <label>Description:</label>
    <input type="text" name="description" required>
    <label>Cost:</label>
    <input type="text" name="cost" required>
    <button type="submit">Add Cost</button>
</form>

<ul>
<?php foreach ($costs as $c): ?>
    <li><?= $c->description ?> - <?= $c->cost ?> 
        <a href="<?= url('inventory/delete_cost/' . $c->id) ?>">Delete</a>
    </li>
<?php endforeach; ?>
</ul>
<?php endif; ?>
