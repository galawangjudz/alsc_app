<h2><?= isset($lot) ? "Edit Inventory #{$lot->id}" : "Create New Lot Inventory" ?></h2>

<form method="POST" action="<?= url('inventory/save_lot') ?>" class="mb-4">
    <input type="hidden" name="id" value="<?= $lot->id ?? '' ?>">

    <div class="mb-3">
        <label class="form-label">Phase</label>
        <select name="site_id" class="form-select" required>
            <option value="">-- Select Project --</option>
            <?php foreach ($projects as $project): ?>
                <option value="<?= $project->c_code ?>" <?= ($lot->site_id ?? '') == $project->c_code ? 'selected' : '' ?>>
                    <?= $project->c_acronym ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Block</label>
        <input type="text" name="block" class="form-control" value="<?= $lot->block ?? '' ?>" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Lot</label>
        <input type="text" name="lot" class="form-control" value="<?= $lot->lot ?? '' ?>" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Area (sqm)</label>
        <input type="text" name="lot_area" class="form-control" value="<?= $lot->lot_area ?? '' ?>" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Price per sqm</label>
        <input type="text" name="price_per_sqm" class="form-control" value="<?= $lot->price_per_sqm ?? '' ?>" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Status</label>
        <select name="status" class="form-select" required>
            <?php foreach (['Available', 'On Hold', 'Sold', 'Reservation'] as $status): ?>
                <option value="<?= $status ?>" <?= ($lot->status ?? '') == $status ? 'selected' : '' ?>>
                    <?= $status ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Title Status</label>
        <select name="title" class="form-select">
            <option value="">-- Select Title Status --</option>
            <option value="With Title" <?= ($lot->title ?? '') == 'With Title' ? 'selected' : '' ?>>With Title</option>
            <option value="Without Title" <?= ($lot->title ?? '') == 'Without Title' ? 'selected' : '' ?>>Without Title</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Title Owner</label>
        <input type="text" name="title_owner" class="form-control" value="<?= $lot->title_owner ?? '' ?>">
    </div>

    <div class="mb-3">
        <label class="form-label">Remarks</label>
        <textarea name="remarks" class="form-control"><?= $lot->remarks ?? '' ?></textarea>
    </div>

    <?= Csrf::getTokenInputField(); ?>
    <button class="btn btn-primary"><?= isset($lot) ? 'Update Lot' : 'Create Lot' ?></button>
</form>

<?php if (isset($lot)): ?>
<hr>
<h3>House Info</h3>
<form method="POST" action="<?= url('inventory/save_house') ?>" class="mb-4">
    <input type="hidden" name="lot_id" value="<?= $lot->id ?>">

    <div class="mb-3">
        <label class="form-label">Model</label>
        <input type="text" name="model" class="form-control" value="<?= $house->model ?? '' ?>">
    </div>

    <div class="mb-3">
        <label class="form-label">Floor Area</label>
        <input type="text" name="floor_area" class="form-control" value="<?= $house->floor_area ?? '' ?>">
    </div>

    <div class="mb-3">
        <label class="form-label">House Price per Sqm</label>
        <input type="text" name="price_per_sqm" class="form-control" value="<?= $house->price_per_sqm ?? '' ?>">
    </div>

    <div class="mb-3">
        <label class="form-label">Status</label>
        <input type="text" name="status" class="form-control" value="<?= $house->status ?? '' ?>">
    </div>

    <div class="mb-3">
        <label class="form-label">Unit Status</label>
        <input type="text" name="unit_status" class="form-control" value="<?= $house->unit_status ?? '' ?>">
    </div>

    <button type="submit" class="btn btn-primary"><?= isset($house) ? 'Update House' : 'Add House' ?></button>
</form>

<hr>
<h3>Fences</h3>
<form method="POST" action="<?= url('inventory/add_fence') ?>" class="mb-4">
    <input type="hidden" name="lot_id" value="<?= $lot->id ?>">

    <div class="row g-3 mb-3">
        <div class="col-md-3">
            <input type="text" name="fence_type" class="form-control" placeholder="Type" required>
        </div>
        <div class="col-md-3">
            <input type="text" name="material" class="form-control" placeholder="Material" required>
        </div>
        <div class="col-md-3">
            <input type="text" name="length" class="form-control" placeholder="Length (m)" required>
        </div>
        <div class="col-md-3">
            <input type="text" name="cost" class="form-control" placeholder="Cost" required>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Add Fence</button>
</form>

<ul class="list-group mb-4">
    <?php foreach ($fences as $f): ?>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <?= $f->fence_type ?> (<?= $f->length ?>m) - <?= $f->cost ?>
            <a href="<?= url('inventory/delete_fence/' . $f->id) ?>" class="btn btn-sm btn-danger">Delete</a>
        </li>
    <?php endforeach; ?>
</ul>

<hr>
<h3>Additional Costs</h3>
<form method="POST" action="<?= url('inventory/add_cost') ?>" class="mb-4">
    <input type="hidden" name="lot_id" value="<?= $lot->id ?>">

    <div class="row g-3 mb-3">
        <div class="col-md-6">
            <input type="text" name="description" class="form-control" placeholder="Description" required>
        </div>
        <div class="col-md-4">
            <input type="text" name="cost" class="form-control" placeholder="Cost" required>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100">Add Cost</button>
        </div>
    </div>
</form>

<ul class="list-group">
    <?php foreach ($costs as $c): ?>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <?= $c->description ?> - <?= $c->cost ?>
            <a href="<?= url('inventory/delete_cost/' . $c->id) ?>" class="btn btn-sm btn-danger">Delete</a>
        </li>
    <?php endforeach; ?>
</ul>
<?php endif; ?>
