<h2>Edit Lot: <?= htmlspecialchars($lot->lot) ?> (ID: <?= $lot->id ?>)</h2>

<!-- Form to Edit Lot -->
<form method="POST" action="<?= url('inventory/edit_lot/' . $lot->id) ?>" class="mb-3">
    <div>
        <label for="site_id">Site ID:</label>
        <input type="text" name="site_id" id="site_id" value="<?= htmlspecialchars($lot->site_id) ?>" required>
    </div>
    <div>
        <label for="block">Block:</label>
        <input type="text" name="block" id="block" value="<?= htmlspecialchars($lot->block) ?>" required>
    </div>
    <div>
        <label for="lot">Lot Number:</label>
        <input type="text" name="lot" id="lot" value="<?= htmlspecialchars($lot->lot) ?>" required>
    </div>
    <div>
        <label for="lot_area">Lot Area (sqm):</label>
        <input type="number" step="0.01" name="lot_area" id="lot_area" value="<?= htmlspecialchars($lot->lot_area) ?>" required>
    </div>
    <div>
        <label for="price_per_sqm">Price per sqm:</label>
        <input type="number" step="0.01" name="price_per_sqm" id="price_per_sqm" value="<?= htmlspecialchars($lot->price_per_sqm) ?>" required>
    </div>
    <div>
        <label for="status">Status:</label>
        <input type="text" name="status" id="status" value="<?= htmlspecialchars($lot->status) ?>" required>
    </div>
    <div>
        <label for="remarks">Remarks:</label>
        <textarea name="remarks" id="remarks"><?= htmlspecialchars($lot->remarks) ?></textarea>
    </div>
    <div>
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="<?= htmlspecialchars($lot->title) ?>">
    </div>
    <div>
        <label for="title_owner">Title Owner:</label>
        <input type="text" name="title_owner" id="title_owner" value="<?= htmlspecialchars($lot->title_owner) ?>">
    </div>
    <div>
        <label for="previous_owner">Previous Owner:</label>
        <input type="text" name="previous_owner" id="previous_owner" value="<?= htmlspecialchars($lot->previous_owner) ?>">
    </div>
    <button type="submit">Update Lot</button>
</form>

<a href="<?= url('inventory/index') ?>">Back to Lot List</a>
